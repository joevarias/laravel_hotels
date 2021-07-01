<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\City;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Payment;
use App\Models\PaymentMethod;
use DB;
use DateTime;
use DateInterval;
use DatePeriod;
use Validator;
use Auth;
use Session;

class UserExtendedController extends Controller
{


    public function bookingTransacntionSubmitChanges(Request $request){
        $request->validate([
            'payment_method' => 'required|integer|between:1,4',
        ]);
        // dd($request->payment_method);
        $payment_method_id = $request->payment_method;


    // ===== FIRST, VALIDATE IF ROOMS REQUESTED ARE STIL AVAILABLE ===== //

    	$transaction_number_changebooking = Session::get("transaction_number_changebooking");
        $hotel_id = Session::get('hotel_id_changebooking');
        $hotel_details = Hotel::find($hotel_id);
        $city_id = $hotel_details->city_id;
        $city_details = City::find($city_id);
        $no_of_nights = Session::get('no_of_nights_changebooking');
        $datein = Session::get("datein_changebooking");
        $dateout = Session::get("dateout_changebooking");

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
            ->where('hotel_id',$hotel_id)
            ->where('booking_status_id','=',1)
            ->where('date_in', '<=', $querydate)
            ->where('date_out', '>', $querydate)
            ->whereNotIn('transaction_no',[$transaction_number_changebooking])
            ->get();
            //search for room_id already reserved on date interval except rooms in requested transaction_no
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


        //==================== STANDARD ====================//

        $reserve_countrooms_standard = Session::get('reserve_countrooms_standard_changebooking');

        //check again if number of available rooms is still sufficient for request in case other customer already booked ahead
        //if not, redirect to redo selection
        if ($reserve_countrooms_standard) 
        {
            $rooms_available_standard = DB::table('rooms')
                                ->where('hotel_id', $hotel_id)
                                ->where('room_type_name', 'Standard Room')
                                ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                                ->join('room_types','rooms.room_type_id','=','room_types.id')
                                ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id')
                                ->get();

            //====== collect and count IDs of room available ======//

            $collection_standard_ids_available = collect();
            //initialize collection of id

            foreach ($rooms_available_standard as $iterate_standard) {
                    $collection_standard_ids_available->push($iterate_standard->id);
            }


            $count_rooms_standard = $rooms_available_standard->count();
            //no of rooms available standard


            //reroute if room availability is not sufficent
            if($count_rooms_standard < $reserve_countrooms_standard){
            	Session::flash('error_standard_room_availability_changed', 'Standard room availability for the hotel has changed, please check your selection');
                return redirect('customer/profile/booking/update/'.$transaction_number_changebooking);
            }

            $get_one_available_standard = $rooms_available_standard->first();
            // GET FIRST AVAILABLE STANDARD ROOM
        }



        //==================== DELUXE ====================//


        $reserve_countrooms_deluxe = Session::get('reserve_countrooms_deluxe_changebooking');

        //check again if number of available rooms is still sufficient for request in case other customer already booked ahead
        //if not, redirect to redo selection
        if ($reserve_countrooms_deluxe) 
        {
            $rooms_available_deluxe = DB::table('rooms')
                                ->where('hotel_id', $hotel_id)
                                ->where('room_type_name', 'Deluxe Room')
                                ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                                ->join('room_types','rooms.room_type_id','=','room_types.id')
                                ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id')
                                ->get();

            //====== collect IDs of room available ======//

            $collection_deluxe_ids_available = collect();
            //initialize collection of id

            foreach ($rooms_available_deluxe as $iterate_deluxe) {
                    $collection_deluxe_ids_available->push($iterate_deluxe->id);
            }


            $count_rooms_deluxe = $rooms_available_deluxe->count();
            //no of rooms available deluxe

            //reroute if room availability is not sufficent
            if($count_rooms_deluxe < $reserve_countrooms_deluxe)
            {
            	Session::flash('error_deluxe_room_availability_changed', 'Deluxe room availability for the hotel has changed, please check your selection');
                return redirect('customer/profile/booking/update/'.$transaction_number_changebooking);

            }

            $get_one_available_deluxe = $rooms_available_deluxe->first();
            // GET FIRST AVAILABLE DELUXE ROOM

        }


        //==================== QUEEN ====================//

        $reserve_countrooms_queen = Session::get('reserve_countrooms_queen_changebooking');

        //check again if number of available rooms is still sufficient for request in case other customer already booked ahead
        //if not, redirect to redo selection
        if ($reserve_countrooms_queen) 
        {
            $rooms_available_queen = DB::table('rooms')
                                ->where('hotel_id', $hotel_id)
                                ->where('room_type_name', 'Queen Room')
                                ->whereNotIn('rooms.id',$collection_room_ids_already_booked)
                                ->join('room_types','rooms.room_type_id','=','room_types.id')
                                ->select('rooms.*', 'rooms.rate', 'room_type_name','rooms.hotel_id')
                                ->get();

            $collection_queen_ids_available = collect();
            //initialize collection of id

            foreach ($rooms_available_queen as $iterate_queen) {
                    $collection_queen_ids_available->push($iterate_queen->id);
            }


            $count_rooms_queen = $rooms_available_queen->count();
            //no of rooms available queen

            //reroute if room availability is not sufficent
            if($count_rooms_queen < $reserve_countrooms_queen)
            {
            	Session::flash('error_queen_room_availability_changed', 'Queen room availability for the hotel has changed, please check your selection');
                return redirect('customer/profile/booking/update/'.$transaction_number_changebooking);
            }

            $get_one_available_queen = $rooms_available_queen->first();
            // GET FIRST AVAILABLE QUEEN ROOM

        }

    // ===== END VALIDATION ===== //


    //=================== FOR TOTAL PRICE ===================//
        $room_standard_rate = 0;
        $room_deluxe_rate = 0;
        $room_queen_rate = 0;

        $room_standard_rate_total = 0;
        $room_deluxe_rate_total = 0;
        $room_queen_rate_total = 0;


        if ($reserve_countrooms_standard) {
            $room_details_standard = Room::select('rate')
                    ->where('room_type_id',1)
                    ->where('hotel_id',$hotel_id)
                    ->first();
            $room_standard_rate = $room_details_standard->rate;
            $room_standard_rate_total = $room_details_standard->rate * $reserve_countrooms_standard;
        }

        if ($reserve_countrooms_deluxe) {
            $room_details_deluxe = Room::select('rate')
                    ->where('room_type_id',2)
                    ->where('hotel_id',$hotel_id)
                    ->first();
            $room_deluxe_rate = $room_details_deluxe->rate;
            $room_deluxe_rate_total = $room_details_deluxe->rate * $reserve_countrooms_deluxe;
        }

        if ($reserve_countrooms_queen) {
            $room_details_queen = Room::select('rate')
                    ->where('room_type_id',3)
                    ->where('hotel_id',$hotel_id)
                    ->first();
            $room_queen_rate = $room_details_queen->rate;
            $room_queen_rate_total = $room_details_queen->rate * $reserve_countrooms_queen;
        }

        $reserve_countrooms_total = $reserve_countrooms_standard + $reserve_countrooms_deluxe + $reserve_countrooms_queen;

        $company_discount = .08;

        $rooms_total_price = $room_standard_rate_total + $room_deluxe_rate_total + $room_queen_rate_total;

        $company_discount_price = $rooms_total_price * $company_discount;

        $price = $rooms_total_price - $company_discount_price;

   //=================== END TOTAL PRICE ===================//



    //========================= START TRANSACTION HERE  =========================//

        function generate_trans_number(){
          $ref_number = '';
          $source = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');

          for($i = 0; $i < 16; $i++){
              $index = mt_rand(0,15);
              $ref_number = $ref_number.$source[$index];
            }

           $today = getdate();
          return $ref_number. "-".$today[0];
        }


        $transno = generate_trans_number();
        $payment = new Payment;
        $payment->customer_id = Auth::user()->id;
        $payment->payment_method_id = $payment_method_id;
        $payment->save();

        $payment_id = DB::table('payments')->orderBy('created_at', 'desc')->first();



    //============= Update Status of previous transaction =============//

        $update_booking_status = Booking::where('transaction_no', $transaction_number_changebooking)->get();


		foreach($update_booking_status as $change_booking_status){
			$change_booking_status->booking_status_id = 4;
			$change_booking_status->save();
		}

	// =========== end Update Status of previous transaction ============//



        //book if we have request for standard room
        if ($reserve_countrooms_standard) {

            $array_for_room_id = 0; //count for collection of room id
            $count = $reserve_countrooms_standard;
            while($count){
                $booking = new Booking;
                $booking->customer_id = Auth::user()->id;
                $booking->hotel_id = $hotel_id;
                $booking->room_id = $collection_standard_ids_available[$array_for_room_id];
                $booking->city_id = $city_id;
                $booking->payment_id = $payment_id->id;
                $booking->date_in = $datein;
                $booking->date_out = $dateout;
                $booking->no_of_nights = $no_of_nights;
                $booking->transaction_no = $transno;
                $booking->total = $price;
                $booking->save();
                $count--;

                $array_for_room_id++;
            }
        }

        //book if we have request for deluxe room
        if ($reserve_countrooms_deluxe) {

            $array_for_room_id = 0; //count for collection of room id
            $count = $reserve_countrooms_deluxe;
            while($count){
                $booking = new Booking;
                $booking->customer_id = Auth::user()->id;
                $booking->hotel_id = $hotel_id;
                $booking->room_id = $collection_deluxe_ids_available[$array_for_room_id];
                $booking->city_id = $city_id;
                $booking->payment_id = $payment_id->id;
                $booking->date_in = $datein;
                $booking->date_out = $dateout;
                $booking->no_of_nights = $no_of_nights;
                $booking->transaction_no = $transno;
                $booking->total = $price;
                $booking->save();
                $count--;

                $array_for_room_id++;
            }
        }

        //book if we have request for queen room
        if ($reserve_countrooms_queen) {

            $array_for_room_id = 0; //count for collection of room id
            $count = $reserve_countrooms_queen;
            while($count){
                $booking = new Booking;
                $booking->customer_id = Auth::user()->id;
                $booking->hotel_id = $hotel_id;
                $booking->room_id = $collection_queen_ids_available[$array_for_room_id];
                $booking->city_id = $city_id;
                $booking->payment_id = $payment_id->id;
                $booking->date_in = $datein;
                $booking->date_out = $dateout;
                $booking->no_of_nights = $no_of_nights;
                $booking->transaction_no = $transno;
                $booking->total = $price;
                $booking->save();
                $count--;

                $array_for_room_id++;
            }
        }

        $payment_method_details = PaymentMethod::find($payment_method_id);
        $payment_method_name = $payment_method_details->payment_method;

        $dates_frominput = implode(" - ", array($datein, $dateout));


    return view('customer.cust-booking-transaction-success', compact('hotel_details', 'city_details', 'datein', 'dateout', 'reserve_countrooms_standard', 'reserve_countrooms_deluxe', 'reserve_countrooms_queen', 'reserve_countrooms_total', 'no_of_nights', 'room_standard_rate', 'room_deluxe_rate', 'room_queen_rate', 'company_discount_price','price', 'transno', 'payment_method_name', 'dates_frominput'));

    }





}
