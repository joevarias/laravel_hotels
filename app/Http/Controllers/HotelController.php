<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\Room;
use File;
use SplFileInfo;
use Session;
use DateTime;
use DatePeriod;
use DateInterval;
use DB;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function showHotelAndRoomAvailability($id, $dates_frominput){

        $validator = Validator::make(array($dates_frominput), [
            'dates_frominput' => [

                function ($attribute, $value, $fail) {

                    $daterange = explode(" - ", $value); 
                    $datein = $daterange[0];
                    $dateout = $daterange[1];

                    // date format, datein and dateout !< today
                    function validateDate($date, $format = 'Y-m-d')
                    {
                        $d = DateTime::createFromFormat($format, $date);
                        return $d && $d->format($format) == $date;
                    }

                    if (!(validateDate($datein,'Y-m-d')) or !(validateDate($dateout,'Y-m-d')) or ($datein < date("Y-m-d")) or ($dateout < date("Y-m-d")) or ($datein > $dateout)) {

                        $fail('The dates are invalid.');
                    }
                },
            ],
        ])->validate();


    	$hotel = Hotel::find($id);
        if(!$hotel){
            return abort(401, 'Unauthorized');
        }

    	$renamed_hotelname = str_replace(' ', '_', $hotel->hotel_name);
    	//replace spaces in $hotel->hotel_name with undercore

        $hotel_images = File::allFiles('images/hotels/'.$renamed_hotelname);
        $collection_hotel_images = collect();

        foreach($hotel_images as $hotel_images){
            $collection_hotel_images->push($hotel_images->getPathname());
        }

        $city_id = $hotel->city_id;


//==========add to searchcontroller from here,


        //separate date range and convert into an array
        $daterange = explode(" - ", $dates_frominput); 
        $datein = $daterange[0];
        $dateout = $daterange[1];

        $newdatein = new DateTime($datein);
        $newdateout = new DateTime($dateout);

        // Session::put("hotel_id", $hotel->id);
        // Session::put("datein", $datein);
        // Session::put("dateout", $dateout);

        $no_of_nights = $newdatein->diff($newdateout)->format('%a');

        // Session::put("no_of_nights", $no_of_nights);


        $interval = new DateInterval('P1D');
        $queryperiod = new DatePeriod($newdatein,$interval,$newdateout); 
        //get all dates between checkin and checkout

        $collection_rooms_already_booked = collect();
        $collection_room_ids_already_booked = collect();
        //initialize collection of data


        foreach($queryperiod as $querydate){
            $querydate = $querydate->format('Y-m-d'); //format to date only
            //iterate query dates  

            $booked_rooms_record = Booking::select('room_id','hotel_id')
            ->where('city_id',$city_id)
            ->where('booking_status_id','=',1)
            ->where('date_in', '<=', $querydate)
            ->where('date_out', '>', $querydate)
            ->get();
            //search for room_id with dates already reserved
            //then save as $booked_rooms_record
            
            foreach ($booked_rooms_record as $booked_room) {
                if(!$collection_rooms_already_booked->contains($booked_room))
                {
                    $collection_rooms_already_booked->push($booked_room); //whole row
                    $collection_room_ids_already_booked->push($booked_room->room_id); //only contain ids
                    //collect id of rooms to exempt from search - 1 id per iteration
                    //skip if already contains room id being iterated
                }
            }
        }


    //==== Start collection of rooms available ====//


        //==================== standard ====================//

        $rooms_available_standard = DB::table('rooms')
                            ->where('hotel_id', $hotel->id)
                            ->where('room_type_name', 'Standard Room')
                            ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                            ->join('room_types','rooms.room_type_id','=','room_types.id')
                            ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id')
                            ->get();

        $count_rooms_standard = $rooms_available_standard->count();
        //no of rooms available standard

        
        //==================== deluxe ====================//

        $rooms_available_deluxe = DB::table('rooms')
                            ->where('hotel_id', $hotel->id)
                            ->where('room_type_name', 'Deluxe Room')
                            ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                            ->join('room_types','rooms.room_type_id','=','room_types.id')
                            ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id')
                            ->get();

        $count_rooms_deluxe = $rooms_available_deluxe->count();
        //no of rooms available deluxe


        //==================== queen ====================//

        $rooms_available_queen = DB::table('rooms')
                            ->where('hotel_id', $hotel->id)
                            ->where('room_type_name', 'Queen Room')
                            ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                            ->join('room_types','rooms.room_type_id','=','room_types.id')
                            ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id')
                            ->get();

        $count_rooms_queen = $rooms_available_queen->count();
        //no of rooms available queen



    //==== End collection of rooms available ====//


    //==== Selected Room Images ====//

        //==== collect images from folder =====//
        //standard
        $room_images_standard = File::files('images/hotels/'.$renamed_hotelname.'/rooms/standard');

        $collection_room_images_standard = collect();
        foreach($room_images_standard as $room_images){
            $collection_room_images_standard->push($room_images->getPathname());
        }

        //deluxe
        $room_images_deluxe = File::files('images/hotels/'.$renamed_hotelname.'/rooms/deluxe');

        $collection_room_images_deluxe = collect();
        foreach($room_images_deluxe as $room_images){
            $collection_room_images_deluxe->push($room_images->getPathname());
        }

        //queen
        $room_images_queen = File::files('images/hotels/'.$renamed_hotelname.'/rooms/queen');

        $collection_room_images_queen = collect();
        foreach($room_images_queen as $room_images){
            $collection_room_images_queen->push($room_images->getPathname());
        }

        // for viewing room image
        $image_path_standard = '/images/hotels/'.$renamed_hotelname.'/rooms/standard/standard.jpg';
        $image_path_deluxe = '/images/hotels/'.$renamed_hotelname.'/rooms/deluxe/deluxe.jpg';
        $image_path_queen = '/images/hotels/'.$renamed_hotelname.'/rooms/queen/queen.jpg';

    //==== Selected Room Images end ====//


        return view('hotel.hotel', compact('hotel', 'collection_hotel_images', 'image_path_standard', 'image_path_deluxe', 'image_path_queen', 'rooms_available_standard', 'count_rooms_standard', 'rooms_available_deluxe', 'count_rooms_deluxe', 'rooms_available_queen', 'count_rooms_queen', 'collection_room_images_standard', 'collection_room_images_deluxe', 'collection_room_images_queen','no_of_nights','datein','dateout','dates_frominput'));

    }


    public function changeRoomDateSearch(Request $request){

        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required|numeric',
            'change_dates' => [
                'required',

                function ($attribute, $value, $fail) {

                    $daterange = explode(" - ", $value); 
                    $datein = $daterange[0];
                    $dateout = $daterange[1];

                    // date format, datein and dateout !< today
                    function validateDate($date, $format = 'Y-m-d')
                    {
                        $d = DateTime::createFromFormat($format, $date);
                        return $d && $d->format($format) == $date;
                    }

                    if (!(validateDate($datein,'Y-m-d')) or !(validateDate($dateout,'Y-m-d')) or ($datein < date("Y-m-d")) or ($dateout < date("Y-m-d")) or ($datein > $dateout)) {

                        $fail('The dates are invalid.');
                    }
                },
            ],
        ])->validate();


        $hotel_id = $request->hotel_id;
        $hotel = Hotel::find($hotel_id);

        if(!$hotel){
            return abort(401, 'Unauthorized');
        }

        $renamed_hotelname = str_replace(' ', '_', $hotel->hotel_name);
        //replace spaces in $hotel->hotel_name with undercore

        $hotel_images = File::allFiles('images/hotels/'.$renamed_hotelname);
        $collection_hotel_images = collect();

        foreach($hotel_images as $hotel_images){
            $collection_hotel_images->push($hotel_images->getPathname());
        }


        $dates_frominput = $request->change_dates; //date range from input
        $daterange = explode(" - ", $dates_frominput); 
        $datein = $daterange[0];
        $dateout = $daterange[1];

        $newdatein = new DateTime($datein);
        $newdateout = new DateTime($dateout);

        // Session::put("dates_frominput", $dates_frominput);
        // Session::put("datein", $datein);
        // Session::put("dateout", $dateout);

        $no_of_nights = $newdatein->diff($newdateout)->format('%a');
        // Session::put("no_of_nights", $no_of_nights);

        $interval = new DateInterval('P1D');
        $queryperiod = new DatePeriod($newdatein,$interval,$newdateout);
        //get all dates between checkin and checkout

        $collection_rooms_already_booked = collect();
        $collection_room_ids_already_booked = collect();
        //initialize collection of data


        foreach($queryperiod as $querydate){
            $querydate = $querydate->format('Y-m-d'); //format to date only
            //iterate query dates  

            $booked_rooms_record = Booking::select('room_id','hotel_id')
            ->where('hotel_id',$hotel->id)
            ->where('booking_status_id','=',1)
            ->where('date_in', '<=', $querydate)
            ->where('date_out', '>', $querydate)
            ->get();
            //search for room_id with dates already reserved
            //then save as $booked_rooms_record
            
            foreach ($booked_rooms_record as $booked_room) {
                if(!$collection_rooms_already_booked->contains($booked_room))
                {
                    $collection_rooms_already_booked->push($booked_room); //whole row
                    $collection_room_ids_already_booked->push($booked_room->room_id); //only contain ids
                    //collect id of rooms to exempt from search - 1 id per iteration
                    //skip if already contains room id being iterated
                }
            }
        }


// dd($collection_room_ids_already_booked);

    //==== Start collection of rooms available ====//

        //==================== standard ====================//
        $rooms_available_standard = DB::table('rooms')
                            ->where('hotel_id', $hotel->id)
                            ->where('room_type_name', 'Standard Room')
                            ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                            ->join('room_types','rooms.room_type_id','=','room_types.id')
                            ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id')
                            ->get();

        $count_rooms_standard = $rooms_available_standard->count();
        // $count_rooms_standard = 0;
        //no of rooms available standard


        //==================== deluxe ====================//
        $rooms_available_deluxe = DB::table('rooms')
                            ->where('hotel_id', $hotel->id)
                            ->where('room_type_name', 'Deluxe Room')
                            ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                            ->join('room_types','rooms.room_type_id','=','room_types.id')
                            ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id')
                            ->get();

        $count_rooms_deluxe = $rooms_available_deluxe->count();
        // $count_rooms_deluxe = 0;
        //no of rooms available deluxe


        //==================== queen ====================//
        $rooms_available_queen = DB::table('rooms')
                            ->where('hotel_id', $hotel->id)
                            ->where('room_type_name', 'Queen Room')
                            ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                            ->join('room_types','rooms.room_type_id','=','room_types.id')
                            ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id')
                            ->get();

        $count_rooms_queen = $rooms_available_queen->count();
        // $count_rooms_queen = 0;
        //no of rooms available queen


    //==== End collection of rooms available ====//


    //==== Selected Room Images ====//

        //==== collect images from folder =====//
        //standard
        $room_images_standard = File::files('images/hotels/'.$renamed_hotelname.'/rooms/standard');

        $collection_room_images_standard = collect();
        foreach($room_images_standard as $room_images){
            $collection_room_images_standard->push($room_images->getPathname());
        }

        //deluxe
        $room_images_deluxe = File::files('images/hotels/'.$renamed_hotelname.'/rooms/deluxe');

        $collection_room_images_deluxe = collect();
        foreach($room_images_deluxe as $room_images){
            $collection_room_images_deluxe->push($room_images->getPathname());
        }

        //queen
        $room_images_queen = File::files('images/hotels/'.$renamed_hotelname.'/rooms/queen');

        $collection_room_images_queen = collect();
        foreach($room_images_queen as $room_images){
            $collection_room_images_queen->push($room_images->getPathname());
        }

        // for viewing room image
        $image_path_standard = '/images/hotels/'.$renamed_hotelname.'/rooms/standard/standard.jpg';
        $image_path_deluxe = '/images/hotels/'.$renamed_hotelname.'/rooms/deluxe/deluxe.jpg';
        $image_path_queen = '/images/hotels/'.$renamed_hotelname.'/rooms/queen/queen.jpg';

    //==== Selected Room Images end ====//

        return view('hotel.hotel', compact('hotel', 'collection_hotel_images', 'image_path_standard', 'image_path_deluxe', 'image_path_queen', 'rooms_available_standard', 'count_rooms_standard', 'rooms_available_deluxe', 'count_rooms_deluxe', 'rooms_available_queen', 'count_rooms_queen', 'collection_room_images_standard', 'collection_room_images_deluxe', 'collection_room_images_queen','no_of_nights','datein','dateout','dates_frominput'));

    }


}
