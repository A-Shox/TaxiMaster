<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewOrder extends Model
{
    public $timestamps = false;

    public function user(){
       return $this->belongsTo(User::class, 'taxiDriverId', 'id');
    }
}
