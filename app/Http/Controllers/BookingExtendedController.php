<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;
use Session;
use Auth;

class BookingExtendedController extends Controller
{
    public function deleteBookingFromShowAll($transaction_no){


    	$cust_id = Auth::id();

    	$collection = Booking::where('transaction_no',$transaction_no)
	    		->whereIn('booking_status_id', ([2,3,4]))
	    		->where('customer_id',$cust_id)
	    		->select('id')
	    		->get();

        $payment_id = Booking::where('transaction_no',$transaction_no)
                ->whereIn('booking_status_id', ([2,3,4]))
                ->where('customer_id',$cust_id)
                ->select('payment_id')
                ->first();


	    if(!$collection->count()){
            return abort(401, 'Unauthorized');
	    }


    	$collection_id = collect();

    	foreach($collection as $id){
    		$collection_id->push($id->id);
    	}

    	foreach($collection_id as $id){
    		$booking = Booking::find($id);
    		$booking->delete();
    	}

        $payment = Payment::find($payment_id->payment_id);
        $payment->delete();


    	Session::flash('successfully_deleted','Booking transaction '.$transaction_no.' successfully deleted!');

    	return redirect()->back();
    }


    public function deleteBookingFromShowOne($transaction_no){

    	$cust_id = Auth::id();

    	$collection = Booking::where('transaction_no',$transaction_no)
	    		->whereIn('booking_status_id', ([2,3,4]))
	    		->where('customer_id',$cust_id)
	    		->select('id')
	    		->get();

        $payment_id = Booking::where('transaction_no',$transaction_no)
                ->whereIn('booking_status_id', ([2,3,4]))
                ->where('customer_id',$cust_id)
                ->select('payment_id')
                ->first();


	    if(!$collection->count()){
            return abort(401, 'Unauthorized');
	    }

    	$collection_id = collect();

    	foreach($collection as $id){
    		$collection_id->push($id->id);
    	}

    	foreach($collection_id as $id){
    		$booking = Booking::find($id);
    		$booking->delete();
    	}

        $payment = Payment::find($payment_id->payment_id);
        $payment->delete();

    	Session::flash('successfully_deleted','Booking transaction '.$transaction_no.' successfully deleted!');
    	
    	return redirect()->route('customer.profile.bookings');
    }



    public function cancelBooking($transaction_no){
    	$cust_id = Auth::id();

    	$collection = Booking::where('transaction_no',$transaction_no)
	    		->where('booking_status_id', 1)
	    		->where('customer_id',$cust_id)
	    		->select('id')
	    		->get();

	    if(!$collection->count()){
            return abort(401, 'Unauthorized');
	    }

	    $collection_id = collect();

    	foreach($collection as $id){
    		$collection_id->push($id->id);
    	}

    	foreach($collection_id as $id){
    		$booking = Booking::find($id);
    		$booking->booking_status_id = 3;
    		$booking->save();
    	}

    	Session::flash('successfully_cancelled','Booking successfully cancelled.');

    	return redirect()->back();
    }
}
