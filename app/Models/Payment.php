<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function booking(){
    	return $this->hasMany('\App\Models\Booking');
    }

    public function payment_method(){
    	return $this->belongsTo('\App\Models\PaymentMethod');
    }

    public function payment_status(){
    	return $this->belongsTo('\App\Models\PaymentStatus');
    }

    public function customer(){
    	return $this->belongsTo('\App\Models\Customer');
    }

}
