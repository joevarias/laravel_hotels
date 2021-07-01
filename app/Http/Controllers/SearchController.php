<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\Room;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use DateTime;
use DateInterval;
use DatePeriod;

class SearchController extends Controller
{

	public function showIndex(){
		$city = City::all();
		return view('hotel/index');
	}


    public function searchCity(Request $request){
    	if($request->ajax()){

    		$output = '';
		    $query = $request->get('query');

		    if($query != ''){
		    	$city = City::where('city_name', 'like', '%'.$query.'%')
		    		->orderBy('city_name', 'asc')->get();
		    }
		    else{
		    	$city = City::all();
		    }

	    	foreach($city as $row) {
		    	$output .= '<option>'.$row->city_name.'</option>';
       		}

        	$data = array(
       			'list_data' => $output
       			);

		    echo json_encode($data);
		}
    }

    public function searchHotel(Request $request){

        $validator = Validator::make($request->all(), [
            'city' => 'required|string|max:255',
            'dates_frominput' => [
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

                    if (!(validateDate($datein,'Y-m-d')) or !(validateDate($dateout,'Y-m-d')) or ($datein < date("Y-m-d")) or ($dateout < date("Y-m-d"))) {

                        $fail('The '.$attribute.' are invalid.');
                    }
                },
            ],
        ])->validate();


    	$city_name = ucwords($request->city); //convert to uppercase
    	$dates_frominput = $request->dates_frominput; //date range from input
        //save dates fron input to session
    	
    	$city_querydetails = City::where('city_name', $city_name)->first(); 
    	//query by city name then store result to $citydetails

    	$hotels_details_by_city = Hotel::where('city_id', $city_querydetails->id)->get();
    	//query hotels available in the city - store details for later use

    	$city_id = $city_querydetails->id;
        $city_name = $city_querydetails->city_name;
        Session::put("city_selected", $city_querydetails->city_name);
    	Session::put("city_id", $city_id);
    	// remember selected city in event of error


	//==== collection of hotel room with room rate ====//

		$hotels_details_with_rate = collect([]);

		foreach($hotels_details_by_city as $hotels_id){

            //separate date range and convert into an array
            $daterange = explode(" - ", $dates_frominput); 
            $datein = $daterange[0];
            $dateout = $daterange[1];

            $newdatein = new DateTime($datein);
            $newdateout = new DateTime($dateout);

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
                ->where('hotel_id',$hotels_id->id)
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

            //query if there are available rooms
            $rooms_available_with_rate = DB::table('rooms')
                    ->where('hotel_id', $hotels_id->id)
                    ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                    ->join('room_types','rooms.room_type_id','=','room_types.id')
                    ->join('hotels','rooms.hotel_id','=','hotels.id')
                    ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id','hotels.*')
                    ->orderBy('rate', 'asc')
                    ->first();

            
            // if there's room available, push into collection with room rate
            // else, query hotel details without rate
            if($rooms_available_with_rate){
                $hotels_details_with_rate->push($rooms_available_with_rate);
            }
            else{
                $hotel_details = DB::table('hotels')
                    ->where('id', $hotels_id->id)
                    ->first();
                $hotels_details_with_rate->push($hotel_details);
            }

		}


        return view('hotel/searchresult', compact('hotels_details_with_rate','dates_frominput','city_name'));


    }


}
