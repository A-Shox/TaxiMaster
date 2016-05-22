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
        $taxiTypeId = $request->taxiTypeId;
        $driverUpdates = DriverUpdate::all();
        $response = array();

        foreach ($driverUpdates as $driverUpdate){
            if($driverUpdate->stateId===2 && $driverUpdate->taxiDriver->taxi->taxiTypeId==intval($taxiTypeId)){
                $url = $url . $driverUpdate->latitude . ',' . $driverUpdate->longitude . '|';
                
                $item = array();
                $driver = array();
                
                $taxiDriver = $driverUpdate->taxiDriver->user;
                $driver['id'] = $taxiDriver->id;
                $driver['firstName'] = $taxiDriver->firstName;
                $driver['lastName'] = $taxiDriver->lastName;
                $driver['phone'] = $taxiDriver->phone;
                $item['driver'] = $driver;

                $taxi = $driverUpdate->taxiDriver->taxi;
                $item['model'] = $taxi->model;
                $item['noOfSeats'] = $taxi->noOfSeats;

                array_push($response, $item);
            }
        }
        $url = chop($url,"|");
        $url = $url . '&destinations=' . $destinationLatitude . ',' . $destinationLongitude;
        $result = file_get_contents($url);
        $json = json_decode($result, true);

        for($i = 0; $i<count($response); $i++){
            $response[$i]['distance'] = $json['rows'][$i]['elements'][0]['distance']['text'];
            $response[$i]['duration'] = $json['rows'][$i]['elements'][0]['duration']['text'];
        }

        return $response;
    }
}
