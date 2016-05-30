<?php

namespace App\Http\Controllers;
use App\NewOrder;
use App\FinishedOrder;
use App\DriverUpdate;
use App\TaxiDriver;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function updateState(Request $request)
    {
        $stateId = $request->stateId;
        $update = DriverUpdate::find($request->id);
        $update->stateId = $stateId;
        $update->updated_at = Carbon::now()->toDateTimeString();
        $update->save();

        if($stateId==3){
            $orderId = $request->orderId;
            $receiverId = NewOrder::find($orderId)->oneSignalUserId;
            $response = OneSignalController::sendMessage("Hire update", "Driver started to come", array('notificationType' => 'now', 'id' => $orderId), $receiverId, 'CUSTOMER');
        }
        else{
            return array('success' => true);
        }

        if (!isset($response['errors'])) {
            return array('success' => true);
        } else {
            return array('success' => false);
        }

    }

    public function updateLocation(Request $request)
    {
        $update = DriverUpdate::find($request->id);
        $update->latitude = $request->latitude;
        $update->longitude = $request->longitude;
        $update->updated_at = Carbon::now()->toDateTimeString();
        $update->save();
        return array('success' => true);
    }

    public function respondToNewOrder(Request $request){
        $orderId = $request->orderId;
        $isAccepted = $request->isAccepted;

        $newOrder = NewOrder::find($orderId);
        $receiverId = $newOrder->oneSignalUserId;

        $title = "Driver responded";
        $data = array('notificationType' => 'driverResponse', 'id' => $orderId);

        if($isAccepted === "true"){
            $newOrder->state = "ACCEPTED";
            $message = "Hire accepted.";
            $data['response'] = true;
        }
        else{
            $newOrder->state = "REJECTED";
            $message = "Hire rejected.";
            $data['response'] = false;
        }
        $newOrder->save();

        $response = OneSignalController::sendMessage($title, $message, $data, $receiverId, 'CUSTOMER');

        if (!isset($response['errors'])) {
            return array('success' => true);
        } else {
            return array('success' => false);
        }

    }

    public function getOrderList(Request $request){
        $driverId = $request->taxiDriverId;
        $type = $request->type;

        if($type==0){
            return NewOrder::where('taxiDriverId', $driverId)->get();
        }
        else if($type==1){
            return FinishedOrder::where('taxiDriverId', $driverId)->get();
        }
    }

    public function finishOrder(Request $request){
        $finishedOrder = new FinishedOrder;
        $finishedOrder->startTime = $request->startTime;
        $finishedOrder->endTime = $request->endTime;
        $finishedOrder->origin = $request->origin;
        $finishedOrder->destination = $request->destination;
        $finishedOrder->distance = $request->distance;
        $finishedOrder->contact = $request->contact;
        $finishedOrder->fare = $request->fare;
        $finishedOrder->taxiDriverId = $request->taxiDriverId;
        $finishedOrder->taxiId = TaxiDriver::find($request->taxiDriverId)->taxi->id;
        $result = $finishedOrder->save();

        if ($result) {
            return array('success' => true);
        } else {
            return array('success' => false);
        }
    }

}
