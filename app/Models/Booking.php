<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function booking_status(){
    	return $this->belongsTo('App\Models\BookingStatus');
    }

    public function room(){
    	return $this->belongsTo('App\Models\Room');
    }

    public function payment(){
    	return $this->belongsTo('App\Models\Payment');
    }

    public function customer(){
    	return $this->belongsTo('App\Models\Customer');
    }

    public function hotel(){
        return $this->belongsTo('App\Models\Hotel');
    }

    public function city(){
        return $this->belongsTo('App\Models\City');
    }

}
