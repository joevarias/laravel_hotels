<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use Auth;
use Session;
use Hash;
use DB;
use DateTime;
use DateInterval;
use DatePeriod;
use File;
use Validator;


class UserController extends Controller
{
    public function showProfileForm(){
    	$id = Auth::user()->id;
    	$cust_details = Customer::find($id);

    	return view('customer.profile', compact('cust_details'));
    }

	public function updateProfile(Request $request){
    	$id = Auth::user()->id;
	    $request->validate([
	        'profile_firstname' => 'required|string|max:255',
	        'profile_lastname' => 'required|string|max:255',
	        'email' => 'required|string|email|max:255|unique:customers,email,'. $id
	    ]);

    	$cust_details = Customer::find($id);
	    $cust_details->first_name = $request->profile_firstname;
	    $cust_details->last_name = $request->profile_lastname;
	    $cust_details->email = $request->email;
	    $cust_details->save();

	    Session::flash('successfully_updated', 'Changes saved successfully!');


		return redirect('/customer/profile');
	}

    public function showPasswordForm(){
    	return view('customer.password');
    }

    public function updatePassword(Request $request){
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords not match
            return redirect()->back()->withErrors(['error_password' => ['Current password is incorrect.']]);
        }

        $request->validate([
        	'old_password' => 'required',
            'password' => ['required', 'different:old_password', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Customer::find(Auth::id());

		$user->password = Hash::make($request->password);
		$user->save();

	    Session::flash('successfully_updated', 'Your password was successfully changed!');
    	return view('customer.password');
    }

    public function showBookings(){
    	$id = Auth::id();
    	$bookings = Booking::where('customer_id',$id)
    			->select('transaction_no','hotel_name','image_path','city_name','bookings.city_id as city','date_in','date_out','booking_status','booking_status_id','total','bookings.created_at as created')
    			->join('hotels','bookings.hotel_id','=','hotels.id')
    			->join('cities','bookings.city_id','=','cities.id')
    			->join('booking_statuses', 'bookings.booking_status_id','=','booking_statuses.id')
    			->groupBy('transaction_no','hotel_name','image_path','city_name','city','date_in','date_out','booking_status','booking_status_id','total','created')
    			->orderBy('created', 'desc')
    			->get();


    	return view('customer.bookings', compact('bookings'));
    }

    public function showBookingsTransactionDetails($trans_no){

    	$id = Auth::id();

    	// $trans_no = $request->trans_no;

    	$booking = Booking::where('transaction_no',$trans_no)
	    			->select('no_of_nights','transaction_no','hotel_name','hotel_address','phone_number','image_path','city_name','bookings.city_id as city','date_in','date_out','booking_status','total','payment_method','bookings.created_at as created')
	    			->join('hotels','bookings.hotel_id','=','hotels.id')
	    			->join('cities','bookings.city_id','=','cities.id')
	    			->join('booking_statuses', 'bookings.booking_status_id','=','booking_statuses.id')
	    			->join('payments', 'bookings.payment_id','=','payments.id')
	    			->join('payment_methods', 'payments.payment_method_id','=','payment_methods.id')
	    			->groupBy('transaction_no','no_of_nights','hotel_name','hotel_address','phone_number','image_path','city_name','city','date_in','date_out','booking_status','total','payment_method','created')
	    			->get();

		if(!$booking->count()){
			return abort(401, 'Unauthorized');
		}


    	$standard_room_details = Booking::where('transaction_no',$trans_no)
    				->where('room_type_id',1)
    				->select('room_id','room_type_id','rate')
    				->join('rooms','bookings.room_id','=','rooms.id')
    				->get();
    	$count_standard_room = $standard_room_details->count();

    	$deluxe_room_details = Booking::where('transaction_no',$trans_no)
    				->where('room_type_id',2)
    				->select('room_id','room_type_id','rate')
    				->join('rooms','bookings.room_id','=','rooms.id')
    				->get();
    	$count_deluxe_room = $deluxe_room_details->count();

    	$queen_room_details = Booking::where('transaction_no',$trans_no)
    				->where('room_type_id',3)
    				->select('room_id','room_type_id','rate')
    				->join('rooms','bookings.room_id','=','rooms.id')
    				->get();
		$count_queen_room = $queen_room_details->count();

		$count_rooms_total = $count_standard_room + $count_deluxe_room + $count_queen_room;

		$booking_first = $booking->first();
		$total_price = $booking_first->total;

		$company_discount = .08;
		$company_discount_price = $total_price * $company_discount;

        $dates_frominput = implode(" - ", array($booking_first->date_in, $booking_first->date_out));


    	return view('customer.cust-booking-transaction', compact('booking', 'standard_room_details', 'count_standard_room', 'deluxe_room_details', 'count_deluxe_room', 'queen_room_details', 'count_queen_room', 'count_rooms_total','company_discount_price', 'dates_frominput'));
    }

    public function showBookingsTransactionForm(Request $request){

        $validator = Validator::make($request->all(), [
        	'trans_no' => 'required',
            'dates_frominput' => [ 'required',

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

        $trans_no = $request->trans_no;

        $daterange = explode(" - ", $request->dates_frominput); 
        $datein = $daterange[0];
        $dateout = $daterange[1];
        $dates_frominput = $request->dates_frominput;

    	$id = Auth::id();

		$booking_details = Booking::where('transaction_no',$trans_no)
					->where('customer_id',$id)
					->where('booking_status_id',1)
					->select('hotel_id', 'date_in', 'date_out')
					->first();

		if(!$booking_details){
			return abort(401, 'Unauthorized');
		}

	//=========== Count My current booked rooms ===========//

    	$my_standard_room_details = Booking::where('transaction_no',$trans_no)
    				->where('room_type_id',1)
    				->select('room_id','room_type_id','rate')
    				->join('rooms','bookings.room_id','=','rooms.id')
    				->get();
    	$my_count_standard_room = $my_standard_room_details->count();

    	$my_deluxe_room_details = Booking::where('transaction_no',$trans_no)
    				->where('room_type_id',2)
    				->select('room_id','room_type_id','rate')
    				->join('rooms','bookings.room_id','=','rooms.id')
    				->get();
    	$my_count_deluxe_room = $my_deluxe_room_details->count();

    	$my_queen_room_details = Booking::where('transaction_no',$trans_no)
    				->where('room_type_id',3)
    				->select('room_id','room_type_id','rate')
    				->join('rooms','bookings.room_id','=','rooms.id')
    				->get();
		$my_count_queen_room = $my_queen_room_details->count();


	//============ end - Count My current booked rooms ===========//

		$hotel_id = $booking_details->hotel_id;


		$hotel = Hotel::find($hotel_id);


        $newdatein = new DateTime($datein);
        $newdateout = new DateTime($dateout);
        // $date_range_imploded = implode(" - ", array($datein, $dateout));


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
            ->where('hotel_id',$hotel_id)
            ->where('booking_status_id','=',1)
            ->where('date_in', '<=', $querydate)
            ->where('date_out', '>', $querydate)
            ->whereNotIn('transaction_no',[$trans_no])
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


    	$renamed_hotelname = str_replace(' ', '_', $hotel->hotel_name);
    	//replace spaces in $hotel->hotel_name with undercore

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

        return view('customer/cust-booking-transaction-edit', compact('hotel','booking_details','dates_frominput', 'rooms_available_standard', 'count_rooms_standard', 'rooms_available_deluxe', 'count_rooms_deluxe', 'rooms_available_queen', 'count_rooms_queen', 'image_path_standard', 'image_path_deluxe', 'image_path_queen', 'collection_room_images_standard', 'collection_room_images_deluxe', 'collection_room_images_queen', 'trans_no', 'my_count_standard_room', 'my_count_deluxe_room', 'my_count_queen_room', 'datein', 'dateout', 'no_of_nights'));
    }

    public function bookingsTransactionUpdateDetails(Request $request){

        $request->validate([
            'quantity1' => 'required|integer|between:0,5',
            'quantity2' => 'required|integer|between:0,5',
            'quantity3' => 'required|integer|between:0,5',
            'hotel_id' => 'required|integer',
            'datein' => 'required|date|date_format:Y-m-d|after:yesterday',
            'dateout' => 'required|date|date_format:Y-m-d|after:datein',
            'trans_no' => 'required',
        ]);
    	// dd($request->all());
        $id = Auth::id();

        $trans_no = $request->trans_no;
        $hotel_id = $request->hotel_id;
        $datein = $request->datein;
        $dateout = $request->dateout;

        $newdatein = new DateTime($datein);
        $newdateout = new DateTime($dateout);

        $no_of_nights = $newdatein->diff($newdateout)->format('%a');


        $check_transaction = Booking::where('transaction_no',$trans_no)
        			->where('customer_id',$id)
        			->where('hotel_id',$hotel_id)
        			->where('booking_status_id',1)
					->select('transaction_no')
					->first();


		if(!$check_transaction){
			return abort(401, 'Unauthorized');
		}


        if (!($request->quantity1 + $request->quantity2 + $request->quantity3)) {

            return redirect()->back()->with('selectroom', 'Select one or more rooms you want to book');
        }

        $reserve_countrooms_standard = $request->quantity1;
        $reserve_countrooms_deluxe = $request->quantity2;
        $reserve_countrooms_queen = $request->quantity3;


        $reserve_countrooms_total = $reserve_countrooms_standard + $reserve_countrooms_deluxe + $reserve_countrooms_queen;
       

        Session::put('hotel_id_changebooking', $hotel_id);
        Session::put('datein_changebooking', $datein);
        Session::put('dateout_changebooking', $dateout);
        Session::put('no_of_nights_changebooking', $no_of_nights);


        Session::put('reserve_countrooms_standard_changebooking', $reserve_countrooms_standard);
        Session::put('reserve_countrooms_deluxe_changebooking', $reserve_countrooms_deluxe);
        Session::put('reserve_countrooms_queen_changebooking', $reserve_countrooms_queen);
        Session::put('reserve_countrooms_total_changebooking', $reserve_countrooms_total);

        Session::put('transaction_number_changebooking', $trans_no);

        $hotel = Hotel::find($hotel_id);

        $room_standard_rate_total = 0;
        $room_deluxe_rate_total = 0;
        $room_queen_rate_total = 0;

        if ($reserve_countrooms_standard) {
            $room_details_standard = Room::select('rate')
                    ->where('room_type_id',1)
                    ->where('hotel_id',$hotel_id)
                    ->first();
            $room_standard_rate_total = $room_details_standard->rate * $reserve_countrooms_standard;
        }

        if ($reserve_countrooms_deluxe) {
            $room_details_deluxe = Room::select('rate')
                    ->where('room_type_id',2)
                    ->where('hotel_id',$hotel_id)
                    ->first();
            $room_deluxe_rate_total = $room_details_deluxe->rate * $reserve_countrooms_deluxe;
        }

        if ($reserve_countrooms_queen) {
            $room_details_queen = Room::select('rate')
                    ->where('room_type_id',3)
                    ->where('hotel_id',$hotel_id)
                    ->first();
            $room_queen_rate_total = $room_details_queen->rate * $reserve_countrooms_queen;
        }

        $company_discount = .08;

        $rooms_total_price = $room_standard_rate_total + $room_deluxe_rate_total + $room_queen_rate_total;

        $company_discount_price = $rooms_total_price * $company_discount;

        $price = $rooms_total_price - $company_discount_price;

        $dates_frominput = implode(" - ", array($datein, $dateout));

        return view('customer/cust-booking-transaction-confirmchanges', compact('hotel','rooms_total_price', 'company_discount_price', 'price', 'trans_no', 'no_of_nights', 'reserve_countrooms_standard', 'reserve_countrooms_deluxe', 'reserve_countrooms_queen', 'reserve_countrooms_total', 'datein', 'dateout', 'dates_frominput'));
    }

}
