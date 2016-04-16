<?php

namespace App\Http\Controllers;

use App\DriverUpdate;
use App\User;
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
        $update->save();
        return array('success' => true);
    }

    public function updateLocation(Request $request)
    {
        $update = DriverUpdate::find($request->id);
        $update->latitude = $request->latitude;
        $update->longitude = $request->longitude;
        $update->save();
        return array('success' => true);
    }

    /**
     * @param Request $request
     * @return success = [0 - success, 1 - incorrect password, 2 - username not exists, -1  = error]
     */
    public function login(Request $request)
    {
        $response = array();
        $user = User::where('username', $request->username)->first();
        if ($user != null) {
            if(Hash::check($request->password, $user->password)){
                $response['success'] = 0;

                unset($user->password);
                unset($user->userType);
                $response['driver'] = $user;
            }
            else{
                $response['success'] = 1;
            }
        } else {
            $response['success'] = 2;
        }
        return $response;
    }

}
