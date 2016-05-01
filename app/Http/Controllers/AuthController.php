<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return success = [0 - success, 1 - incorrect password, 2 - username not exists, -1  = error]
     */
    public function loginDriver(Request $request){
        $response = array();

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userType' => 'DRIVER'])) {
            $user = Auth::user();
            unset($user->password);
            unset($user->userType);

            $response['success'] = 0;
            $response['driver'] = $user;
        }
        else{
            $response['success'] = 1;
        }
        return $response;
    }

    /*
    public function loginDriver(Request $request)
    {
        $response = array();
        $user = User::where('username', [$request->username, 'userType' => 'DRIVER'])->first();
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
    */

    /**
     * @param Request $request
     * @return success = [0 - success, 1 - incorrect password, 2 - username not exists, -1  = error]
     */
    public function loginWeb(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userType' => 'ADMIN']) || Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userType' => 'TAXI_OPERATOR'])) {
            return redirect()->intended('dashboard');
        }
        else{
            $errors = new MessageBag(['msg' => 'Username or password is incorrect']);
            return back()->withErrors($errors);
        }
    }
}
