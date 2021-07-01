<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function booking(){
    	return $this->hasMany('App\Models\Booking');
    }

    public function hotel(){
    	return $this->belongsTo('App\Models\Hotel');
    }

    public function roomtype(){
    	return $this->belongsTo('App\Models\RoomType');
    }

    public function booking_status(){
        return $this->belongsTo('App\Models\BookingStatus');
    }

}
