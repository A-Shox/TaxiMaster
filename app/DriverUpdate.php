<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverUpdate extends Model
{
    public $timestamps = false;

    public function taxiDriver(){
        return $this->belongsTo(TaxiDriver::class, 'id', 'id');
    }
}
