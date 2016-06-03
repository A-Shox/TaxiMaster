<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    public $timestamps = false;

    public function taxiType(){
        return $this->belongsTo(TaxiTypes::class, 'taxiTypeId', 'id');
    }
    
    public function driver(){
        return $this->hasOne(TaxiDriver::class, 'id', 'id');
    }
}
