<?php

namespace App\Http\Controllers;

use App\DriverUpdate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function updateState(Request $request)
    {
        $update = DriverUpdate::find($request->id);
        $update->state_id = $request->state_id;
        $update->save();
        return json_encode(array('success' => true));
    }

    public function updateLocation(Request $request)
    {
        $update = DriverUpdate::find($request->id);
        $update->latitude = $request->latitude;
        $update->longitude = $request->longitude;
        $update->save();
        return json_encode(array('success' => true));
    }

    /**
     * @param Request $request
     * @return success = [0 - success, 1 - incorrect password, 2 - username not exists]
     */
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user != null) {
            $response = array();

            if(Hash::check($request->password, $user->password)){
                $response['success'] = 0;

                unset($user->password);
                unset($user->user_type);
                $request['profile'] = $user;
                return json_encode($response);
            }
            else{
                return json_encode(array('success' => 1));
            }
        } else {
            return json_encode(array('success' => 2));
        }
    }

}
