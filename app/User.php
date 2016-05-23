<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    
    public function taxiDriver(){
      return $this->hasOne(TaxiDriver::class, 'id', 'id');
    }
}
