<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DriverUpdate;
use App\TaxiDriver;
use App\NewOrder;
use App\Http\Requests;
use App\Http\Controllers\OneSignalController;
use Illuminate\Support\MessageBag;

class CustomerController extends Controller
{
    public function getAvailableTaxis(Request $request)
    {
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyBc2y4jiBAtE3eNPVMOKkyJWA0TP5iy6hQ&origins=';
        $destinationLatitude = $request->latitude;
        $destinationLongitude = $request->longitude;
        $taxiTypeId = $request->taxiTypeId;
        $driverUpdates = DriverUpdate::all();
        $response = array();

        foreach ($driverUpdates as $driverUpdate) {
            if ($driverUpdate->stateId === 2 && $driverUpdate->taxiDriver->taxi->taxiTypeId == intval($taxiTypeId)) {
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
        $url = chop($url, "|");
        $url = $url . '&destinations=' . $destinationLatitude . ',' . $destinationLongitude;
        $result = file_get_contents($url);
        $json = json_decode($result, true);

        for ($i = 0; $i < count($response); $i++) {
            $response[$i]['distance'] = $json['rows'][$i]['elements'][0]['distance']['text'];
            $response[$i]['duration'] = $json['rows'][$i]['elements'][0]['duration']['text'];
        }

        return $response;
    }

    public function placeOrder(Request $request)
    {
        $driverId = $request->driverId;
        $origin = $request->origin;
        $originLatitude = $request->originLatitude;
        $originLongitude = $request->originLongitude;
        $destination = $request->destination;
        $destinationLatitude = $request->destinationLatitude;
        $destinationLongitude = $request->destinationLongitude;
        $time = $request->time;
        $note = $request->note;
        $contact = $request->contact;
        if(isset($request['oneSignalUserId'])){
            $oneSignalUserId = $request->oneSignalUserId;
        }
        else{
            $oneSignalUserId = null;
        }

        $newOrder = new NewOrder;
        $newOrder->origin = $origin;
        $newOrder->originLatitude = $originLatitude;
        $newOrder->originLongitude = $originLongitude;
        $newOrder->destination = $destination;
        $newOrder->destinationLatitude = $destinationLatitude;
        $newOrder->destinationLongitude = $destinationLongitude;
        $newOrder->time = $time;
        $newOrder->note = $note;
        $newOrder->contact = $contact;
        $newOrder->taxiDriverId = $driverId;
        $newOrder->state = "PENDING";
        $newOrder->oneSignalUserId = $oneSignalUserId;
        $newOrder->save();

        $title = "New Hire Received";
        $message = "From: " . $origin . "\nTo: " . $destination . "\nAt: " . $time;
        $data = array(
            'notificationType' => "newOrder",
            'id' => $newOrder->id,
            'origin' => $origin,
            'originLatitude' => $originLatitude,
            'originLongitude' => $originLongitude,
            'destination' => $destination,
            'destinationLatitude' => $destinationLongitude,
            'destinationLongitude' => $destinationLongitude,
            'time' => $time,
            'note' => $note,
            'contact' => $contact
        );

        $oneSignalUserId = TaxiDriver::find($driverId)->oneSignalUserId;

        $response = OneSignalController::sendMessage($title, $message, $data, $oneSignalUserId, 'DRIVER');

        if (!isset($response['errors'])) {
            return array('success' => true, 'id' => $newOrder->id);
        } else {
            return array('success' => false);
        }
    }

    public function getDriverUpdate(Request $request)
    {
        $response = array('success' => false);
        $driverUpdate = DriverUpdate::find($request->driverId);
        
        $destinationLatitude = $request->latitude;
        $destinationLongitude = $request->longitude;
        $originLatitude = $driverUpdate->latitude;
        $originLongitude = $driverUpdate->longitude;

        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyBc2y4jiBAtE3eNPVMOKkyJWA0TP5iy6hQ&origins=' . $originLatitude . ',' . $originLongitude . '&destinations=' . $destinationLatitude . ',' . $destinationLongitude;
        $result = file_get_contents($url);
        $json = json_decode($result, true);

        $response['success'] = true;
        $response['latitude'] = $driverUpdate->latitude;
        $response['longitude'] = $driverUpdate->longitude;
        $response['distance'] = $json['rows'][0]['elements'][0]['distance']['text'];
        $response['duration'] = $json['rows'][0]['elements'][0]['duration']['text'];

        return $response;
    }
    
    public function placeOrderByTaxiOperator(Request $request){
        $result = $this->placeOrder($request);
        if($result['success']){
            $data = array('id'=>$result['id'], 'status'=>'PENDING');
            return $data;
        }
        else{
            $errors = new MessageBag(['msg' => 'Something went wrong']);
            $data = array('id'=>'error');
            return back()->withErrors($errors);
        }
    }
}
