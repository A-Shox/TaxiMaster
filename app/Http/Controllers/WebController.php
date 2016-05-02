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
            $items = array();
            foreach ($updates as $update){
                $item = ['driver_id'=>$update['taxiDriver']['id'], 'name'=>$update['taxiDriver']['user']['firstName'] . ' ' . $update['taxiDriver']['user']['lastName'], 'latitude'=>$update['latitude'], 'longitude'=>$update['longitude'], 'taxi_type'=>$update['taxiDriver']['taxi']['taxiType']['name'], 'taxi_model'=>$update['taxiDriver']['taxi']['model']];
                array_push($items, $item);
            }
            $response['notInService'] = $items;
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
            $updates = DriverUpdate::with('taxiDriver.user', 'taxiDriver.taxi.taxiType')->where('stateId', 3)->get();
            $items = array();
            foreach ($updates as $update){
                $item = ['driver_id'=>$update['taxiDriver']['id'], 'name'=>$update['taxiDriver']['user']['firstName'] . ' ' . $update['taxiDriver']['user']['lastName'], 'latitude'=>$update['latitude'], 'longitude'=>$update['longitude'], 'taxi_type'=>$update['taxiDriver']['taxi']['taxiType']['name'], 'taxi_model'=>$update['taxiDriver']['taxi']['model']];
                array_push($items, $item);
            }
            $response['goingForHire'] = $items;
        }

        if($request->inHire == 1){
            $updates = DriverUpdate::with('taxiDriver.user', 'taxiDriver.taxi.taxiType')->where('stateId', 4)->get();
            $items = array();
            foreach ($updates as $update){
                $item = ['driver_id'=>$update['taxiDriver']['id'], 'name'=>$update['taxiDriver']['user']['firstName'] . ' ' . $update['taxiDriver']['user']['lastName'], 'latitude'=>$update['latitude'], 'longitude'=>$update['longitude'], 'taxi_type'=>$update['taxiDriver']['taxi']['taxiType']['name'], 'taxi_model'=>$update['taxiDriver']['taxi']['model']];
                array_push($items, $item);
            }
            $response['inHire'] = $items;
        }

        return $response;
    }
}
