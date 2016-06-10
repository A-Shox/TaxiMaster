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

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userLevelId' => 2])) {
            $user = Auth::user();
            unset($user->password);
            unset($user->userType);

            $taxiDriver = $user->taxiDriver;
            $taxiDriver->oneSignalUserId = $request->oneSignalUserId;
            $taxiDriver->save();

            $response['success'] = 0;
            $response['driver'] = $user;
        }
        else{
            $response['success'] = 1;
        }
        return $response;
    }

    /**
     * @param Request $request
     * @return success = [0 - success, 1 - incorrect password, 2 - username not exists, -1  = error]
     */
    public function loginWeb(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userLevelId' => 1]) || Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userLevelId' => 3])) {
            return redirect()->intended('dashboard');
        }
        else{
            $errors = new MessageBag(['msg' => 'Username or password is incorrect']);
            return back()->withErrors($errors);
        }
    }

    public function logoutWeb(Request $request)
    {
        try{
            Auth::logout();
        }
        finally{
            return redirect("/login");
        }
    }
}
