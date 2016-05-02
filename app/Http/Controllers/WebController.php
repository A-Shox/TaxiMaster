<?php

namespace App\Http\Controllers;

use App\DriverUpdate;
use Illuminate\Http\Request;

use App\Http\Requests;

class WebController extends Controller
{
    public function getDriverUpdates(Request $request){
        $response = array();

        if($request->notInService == 1){
            $updates = DriverUpdate::with('taxiDriver.user', 'taxiDriver.taxi.taxiType')->where('stateId', 1)->get();
            foreach ($updates as $update){
                unset($update['updated_at']);
                unset($update['stateId']);
                unset($update['id']);
                unset($update['taxiDriver']['licenceNo']);
                unset($update['taxiDriver']['taxiId']);
                unset($update['taxiDriver']['user']['id']);
                unset($update['taxiDriver']['user']['username']);
                unset($update['taxiDriver']['user']['password']);
                unset($update['taxiDriver']['user']['phone']);
                unset($update['taxiDriver']['user']['userType']);
                unset($update['taxiDriver']['taxi']['id']);
                unset($update['taxiDriver']['taxi']['registeredNo']);
                unset($update['taxiDriver']['taxi']['noOfSeats']);
                unset($update['taxiDriver']['taxi']['taxiTypeId']);
                unset($update['taxiDriver']['taxi']['taxiType']['id']);
            }
            $response['notInService'] = $updates;
        }

        if($request->available == 1){
            $updates = DriverUpdate::with('taxiDriver.user', 'taxiDriver.taxi.taxiType')->where('stateId', 2)->get();
            $items = array();
            foreach ($updates as $update){
                $item = ['driver_id'=>$update['taxiDriver']['id'], 'name'=>$update['taxiDriver']['user']['firstName'] . ' ' . $update['taxiDriver']['user']['lastName'], 'latitude'=>$update['latitude'], 'longitude'=>$update['longitude'], 'taxi_type'=>$update['taxiDriver']['taxi']['taxiType']['name'], 'taxi_model'=>$update['taxiDriver']['taxi']['model']];
                array_push($items, $item);
            }
            $response['available'] = $items;
        }

        if($request->goingForHire == 1){
            $updates = DriverUpdate::with('user')->where('stateId', 3)->get();
            foreach ($updates as $update){
                unset($update['updated_at']);
                unset($update['stateId']);
                unset($update['id']);
                unset($update['user']['username']);
                unset($update['user']['password']);
                unset($update['user']['phone']);
                unset($update['user']['userType']);
            }
            $response['goingForHire'] = $updates;
        }

        if($request->inHire == 1){
            $updates = DriverUpdate::with('user')->where('stateId', 4)->get();
            foreach ($updates as $update){
                unset($update['updated_at']);
                unset($update['stateId']);
                unset($update['id']);
                unset($update['user']['username']);
                unset($update['user']['password']);
                unset($update['user']['phone']);
                unset($update['user']['userType']);
            }
            $response['inHire'] = $updates;
        }

        return $response;
    }
}
