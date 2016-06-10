<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    
    public function taxiDriver(){
      return $this->hasOne(TaxiDriver::class, 'id', 'id');
    }

    public function newOrder(){
        return $this->hasMany(TaxiDriver::class, 'id', 'taxiDriverId');
    }

    public function fullName(){
        return $this->firstName . ' ' . $this->lastName;
    }
    
    public function userLevel(){
        return $this->belongsTo(UserLevel::class, 'userLevelId', 'id');
    }
}
