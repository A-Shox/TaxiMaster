<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\MessageBag;

use App\Taxi;
use App\TaxiTypes;
use App\TaxiDriver;
use App\User;

use Illuminate\Support\Facades\DB;

class TaxiController extends Controller
{
    public function showNewTaxiPage(){
        $taxiTypes = TaxiTypes::get();
        return view('newtaxi', compact('taxiTypes'));
    }

    public function createNewTaxi(Request $request){

        if(count(Taxi::where('registeredNo', $request->registeredNo)->get())>0){
            $errors = new MessageBag(['msg' => 'Vehicle with same registered number already exists!!']);
            return back()->withErrors($errors);
        }

        $taxi = new Taxi;
        $taxi->taxiTypeId = $request->taxiType;
        $taxi->registeredNo = $request->registeredNo;
        $taxi->model = $request->model;
        $taxi->noOfSeats = $request->noOfSeats;

        try{
            $taxi->save();
        }
        catch (\Exception $e){
            $errors = new MessageBag(['msg' => 'Something went wrong. Please try again!']);
            return back()->withErrors($errors);
        }
        return redirect('/taxis/view');
    }

    public function showViewTaxisPage(){
        $taxiList = Taxi::all();
        foreach ($taxiList as $taxi){
            $userList = User::with(['taxiDriver'=>function($query) use ($taxi) {$query->where('taxiId', $taxi->id);}])->get();
            foreach ($userList as $user){
                if($user->taxiDriver!=null){
                    $taxi['driverName'] = $user->firstName . ' ' . $user->lastName;
                    break;
                }
            }
            unset($taxi['taxiTypeId']);
        }
        return view('viewtaxis', compact('taxiList'));
    }

    public function showEditTaxisPage(Taxi $taxi){
        $taxiDriver = TaxiDriver::where('taxiId', $taxi->id)->first();
        if($taxiDriver==null){
            $taxi['driverId']=0;
        }
        else{
            $taxi['driverId']=$taxiDriver->id;
        }
        unset($taxi['taxiTypeId']);

        $driverIdNameList = array();
        $driverList = TaxiDriver::with('user')->whereNull('taxiId')->get();
        foreach ($driverList as $driver){
            array_push($driverIdNameList, array('driverId'=>$driver->id, 'driverName'=>$driver->user->fullName()));
        }
        $data= array('taxi'=>$taxi, 'driverList'=>$driverIdNameList);
        return view('edittaxi', compact('data'));
    }

//    public function updateTaxi(Request $request){
//
//        $result = DB::transaction(function () use($request) {
//            $driverId = $request->driverId;
//            $taxiId = $request->taxiId;
//
//            $oldDriver = TaxiDriver::where('taxiId', $taxiId)->first();
//            if($oldDriver!=null){
//                $oldDriver->taxiId = null;
//                $result =$oldDriver->save();
//            }
//
//            if($driverId!=0){
//                $newDriver = TaxiDriver::where('id', $driverId)->first();
//                $newDriver->taxiId = $taxiId;
//                $result = $newDriver->save();
//            }
//
//            return $result;
//        });
//
//        if($result){
//            return redirect('/taxis/view');
//        }
//        else{
//            $errors = new MessageBag(['msg' => 'Something went wrong!']);
//            return back()->withErrors($errors);
//        }
//    }
}
