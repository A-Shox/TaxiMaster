<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxiDriver extends Model
{
    public $timestamps = false;

    public function taxi(){
        return $this->belongsTo(Taxi::class, 'taxiId', 'id');
    }
}
