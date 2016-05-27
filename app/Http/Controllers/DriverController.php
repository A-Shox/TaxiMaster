<?php

namespace App\Http\Controllers;
use App\NewOrder;
use App\FinishedOrder;
use App\DriverUpdate;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function updateState(Request $request)
    {
        $update = DriverUpdate::find($request->id);
        $update->stateId = $request->stateId;
        $update->updated_at = Carbon::now()->toDateTimeString();
        $update->save();
        return array('success' => true);
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

        if($isAccepted){
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

}
