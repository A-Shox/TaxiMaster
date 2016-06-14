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
            $response = OneSignalController::sendMessage("Hire update", "Driver started to come", array('notificationType' => 'now', 'id' => $orderId), $receiverId);

            $newOrder = NewOrder::find($orderId);
            $newOrder->state = "NOW";
            $newOrder->save();
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

        if($receiverId!=null){
            $title = "Driver responded";
            $data['notificationType'] = 'driverResponse';
            $data['id'] = $orderId;

            $response = OneSignalController::sendMessage($title, $message, $data, $receiverId);

            if (!isset($response['errors'])) {
                return array('success' => true);
            } else {
                return array('success' => false);
            }
        }
        else{
            return array('success' => true);
        }

    }

    public function getOrderList(Request $request){
        $driverId = $request->taxiDriverId;
        $type = $request->type;

        if($type==0){
            return NewOrder::where('taxiDriverId', $driverId)->where('state', '!=', 'REJECTED')->get();
        }
        else if($type==1){
            return FinishedOrder::where('taxiDriverId', $driverId)->get();
        }
    }

    public function finishOrder(Request $request){
        $id = $request->id;
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

        if (!$result) {
            return array('success' => false);
        }

        $newOrder = NewOrder::find($id);
        $receiverId = $newOrder->oneSignalUserId;
        $newOrder->delete();

        if($receiverId!=null){
            $title = "Hire finished";
            $message = "Thank you";

            $data = array('notificationType' => 'finishHire', 'id' => $id);

            $response = OneSignalController::sendMessage($title, $message, $data, $receiverId, 'CUSTOMER');

            if (!isset($response['errors'])) {
                return array('success' => true);
            } else {
                return array('success' => false);
            }
        }
        else{
            return array('success' => true);
        }

    }

}
