<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    use HasFactory;

    public function booking(){
    	return $this->hasMany('App\Models\Booking');
    }

    public function room(){
    	return $this->hasMany('App\Models\Room');
    }
}
