<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxiDriver extends Model
{
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function taxi(){
        return $this->belongsTo(Taxi::class, 'taxiId', 'id');
    }

    public function driverUpdate(){
        return $this->hasOne(DriverUpdate::class, 'id', 'id');
    }

}
