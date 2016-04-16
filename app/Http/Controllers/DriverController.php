<?php

namespace App\Http\Controllers;

use App\DriverUpdate;
use Illuminate\Http\Request;

use App\Http\Requests;

class DriverController extends Controller
{
    public function updateState(Request $request)
    {
        $update = DriverUpdate::find($request->id);
        $update->state_id = $request->state_id;
        $update->save();
        return json_encode(array('success' => true));
    }
    
    public function updateLocation(Request $request){
        $update = DriverUpdate::find($request->id);
        $update->latitude = $request->latitude;
        $update->longitude = $request->longitude;
        $update->save();
        return json_encode(array('success' => true));
    }
}
