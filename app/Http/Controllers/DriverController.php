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

}
