<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DriverUpdate;

use App\Http\Requests;

class CustomerController extends Controller
{
//https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=40.6655101,-73.89188969999998&destinations=40.6905615,-73.9976592&key=AIzaSyBc2y4jiBAtE3eNPVMOKkyJWA0TP5iy6hQ
    public function getAvailableTaxis(Request $request){
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyBc2y4jiBAtE3eNPVMOKkyJWA0TP5iy6hQ&origins=';
        $destinationLatitude = $request->latitude;
        $destinationLongitude = $request->longitude;
        $taxis = DriverUpdate::all();
        $response = array();

        foreach ($taxis as $taxi){
            if($taxi->stateId===2){
                $url = $taxi->latitude . ',' . $taxi->longitude . '|';
            }
        }
        $url = $url . '&destinations=' . $destinationLatitude . ',' . $destinationLongitude;
        $result = file_get_contents($url);
        $json = json_decode($result, true);
        return $url;
    }
}
