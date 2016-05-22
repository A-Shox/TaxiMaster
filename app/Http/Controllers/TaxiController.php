<?php

namespace App\Http\Controllers;

use App\Taxi;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\TaxiTypes;
use Illuminate\Support\MessageBag;

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
}
