<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\TaxiDriver;
use App\Taxi;
use App\DriverUpdate;
use Hash;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function showViewPage(User $user)
    {
        return view('viewaccount', compact('user'));
    }

    public function showEditPage(User $user)
    {
        return view('editaccount', compact('user'));
    }

    public function showNewUserPage()
    {
        $taxis = Taxi::whereNotIn('id', TaxiDriver::whereNotNull('taxiId')->get(['taxiId']))->get();
        return view('newAccount', compact('taxis'));
    }

    public function deleteUser(Request $request)
    {
        return json_encode(User::where('id', $request->id)->update(['isActive' => false]));
    }

    public function updateUser(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->phone = $request->phone;
        $result = $user->save();

        if ($result) {
            return redirect('/accounts/view');
        } else {
            $errors = new MessageBag(['msg' => 'Username or password is incorrect']);
            return back()->withErrors($errors);
        }
    }

    public function createNewUser(Request $request)
    {
        if (count(User::where('username', $request->username)->get()) > 0) {
            $errors = new MessageBag(['msg' => 'Username already exists!']);
            return back()->withErrors($errors)->withInput();
        }
        if (count(User::where('firstName', $request->firstName)->where('lastName', $request->lastName)->get()) > 0) {
            $errors = new MessageBag(['msg' => 'User with the same full name already existstransac!']);
            return back()->withErrors($errors)->withInput();
        }
        if (count(User::where('phone', $request->phone)->get()) > 0) {
            $errors = new MessageBag(['msg' => 'Mobile phone already exists!']);
            return back()->withErrors($errors)->withInput();
        }
        if ($request->userType == 2) {
            if (count(TaxiDriver::where('licenceNo', $request->licenceNo)->get()) > 0) {
                $errors = new MessageBag(['msg' => 'Licence Number already exists!']);
                return back()->withErrors($errors)->withInput();
            }
        }

        try {
            $user = new User;
            $user->userLevelId = $request->userType;
            $user->username = $request->username;
            $user->firstName = $request->firstName;
            $user->lastName = $request->lastName;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->isActive = 1;
            $user->save();

            if ($request->userType == 2) {
                $user = User::where(['username' => $request->username])->first();
                $taxiDriver = new TaxiDriver;
                $taxiDriver->licenceNo = $request->licenceNo;
                if ($request->taxiId === null || $request->taxiId === '') {
                    $taxiDriver->taxiId = null;
                } else {
                    $taxiDriver->taxiId = $request->taxiId;
                }
                $user->taxiDriver()->save($taxiDriver);

                $taxiDriver = TaxiDriver::find($user->id);
                $driverUpdate = new DriverUpdate;
                $driverUpdate->latitude = 0.0;
                $driverUpdate->longitude = 0.0;
                $driverUpdate->stateId = 1;
                $taxiDriver->driverUpdate()->save($driverUpdate);
            }
        } catch (\Exception $e) {
            $errors = new MessageBag(['msg' => 'Something went wrong. Please try again!']);
            return back()->withErrors($errors);
        }
        return redirect('/accounts/view');
    }
}
