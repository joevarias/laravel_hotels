<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function superadmin(){
    	return $this->hasMany('\App\Models\SuperAdmin');
    }

    public function customer(){
    	return $this->hasMany('\App\Models\Customer');
    }

    public function employee(){
    	return $this->hasMany('\App\Models\Employee');
    }

}
