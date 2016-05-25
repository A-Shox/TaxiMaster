<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DriverUpdate;
use App\TaxiDriver;
use App\Http\Requests;

class CustomerController extends Controller
{
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

    public function placeOrder(Request $request){
        $title = "New Hire Received";
        $message = "From: " . $request->origin . "\nTo: " . $request->destination . "\nAt: " . $request->time;
        $data = array(
            'origin' => $request->origin,
            'originLatitude' => $request->originLatitude,
            'originLongitude' => $request->originLongitude,
            'destination' => $request->destination,
            'destinationLongitude' => $request->destinationLongitude,
            'destinationLongitude' => $request->destinationLongitude,
            'time' => $request->time,
            'note' => $request->note,
        );

        $oneSignalUserId = TaxiDriver::find($request->driverId)->oneSignalUserId;

        $response = $this->oneSignalSendMessage($title, $message, $data, $oneSignalUserId);

        if(!isset($response['errors'])){
            return array('success' => true);
        }
        else{
            return array('success' => false);
        }
    }

    private function oneSignalSendMessage($title, $message, $data, $receiverId){
        $fields = array(
            'app_id' => "ba174870-887c-4f28-bd92-f50cec6692f4",
            'include_player_ids' => array($receiverId),
        );

        if(!is_null($title))
            $fields['headings'] = array("en" => $title);

        if(!is_null($message))
            $fields['contents'] = array("en" => $message);

        if(!is_null($data))
            $fields['data'] = $data;

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Authorization: Basic Y2VhOTRlNDctNDIxYy00YWI4LTljYWEtM2M3NTUxODk0NzFk'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
