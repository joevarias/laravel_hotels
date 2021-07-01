<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public function city(){
    	return $this->belongsTo('\App\Models\City');
    }

    public function room(){
    	return $this->hasMany('App\Models\Room');
    }

    public function employee(){
    	return $this->hasMany('App\Models\Employee');
    }

}
