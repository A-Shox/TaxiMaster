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
            $updates = DriverUpdate::with('user')->where('stateId', 1)->get();
            foreach ($updates as $update){
                unset($update['updated_at']);
                unset($update['stateId']);
                unset($update['id']);
                unset($update['user']['username']);
                unset($update['user']['password']);
                unset($update['user']['phone']);
                unset($update['user']['userType']);
            }
            $response['notInService'] = $updates;
        }

        if($request->available == 1){
            $updates = DriverUpdate::with('user')->where('stateId', 2)->get();
            foreach ($updates as $update){
                unset($update['updated_at']);
                unset($update['stateId']);
                unset($update['id']);
                unset($update['user']['username']);
                unset($update['user']['password']);
                unset($update['user']['phone']);
                unset($update['user']['userType']);
            }
            $response['available'] = $updates;
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
