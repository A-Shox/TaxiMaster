<?php

namespace App\Http\Controllers;

use App\FinishedOrder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\NewOrder;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    public function showOnGoingOrdersPage(Request $request)
    {

        if (Auth::check()) {
            $request['offset'] = 0;
            $orderList = $this->getOngoingOrders($request);
            return view('ongoing', compact('orderList'));
        } else {
            return view('login');
        }
    }

    public function getOngoingOrders(Request $request)
    {
        if(isset($request->now)){
            $now = $request->now;
        }
        else{
            $now = 1;
        }
        if(isset($request->pending)){
            $pending = $request->pending;
        }
        else{
            $pending = 1;
        }
        if(isset($request->accepted)){
            $accepted = $request->accepted;
        }
        else{
            $accepted = 1;
        }
        if(isset($request->rejected)){
            $rejected = $request->rejected;
        }
        else{
            $rejected = 1;
        }
        if(isset($request->from)){
            $from = $request->from;
        }
        else{
            $from = Carbon::now()->subWeek()->toDateTimeString();
        }
        if(isset($request->to)){
            $to = $request->to;
        }
        else{
            $to = Carbon::now()->toDateTimeString();
        }

        $nowList = array();
        $pendingList = array();
        $acceptedList = array();
        $rejectedList = array();

        $orderList = array();

        if ($now == 1) {
            $nowList = NewOrder::where('state', 'NOW')->where('time', '>', $from)->where('time', '<', $to)->limit(15)->offset(0)->with('user')->get();

            foreach ($nowList as $order) {
                $order['driverName'] = $order['user']['firstName'] . ' ' . $order['user']['lastName'];
                unset($order['originLatitude']);
                unset($order['originLongitude']);
                unset($order['destinationLatitude']);
                unset($order['destinationLongitude']);
                unset($order['taxiDriverId']);
                unset($order['taxiOperatorUserId']);
                unset($order['oneSignalUserId']);
                unset($order['note']);
                unset($order['user']);
            }

            $nowList = json_decode($nowList);
            $orderList = array_merge($orderList, $nowList);
        }

        if ($pending == 1) {
            $pendingList = NewOrder::where('state', 'PENDING')->where('time', '>', $from)->where('time', '<', $to)->limit(15)->offset(0)->with('user')->get();

            foreach ($pendingList as $order) {
                $order['driverName'] = $order['user']['firstName'] . ' ' . $order['user']['lastName'];
                unset($order['originLatitude']);
                unset($order['originLongitude']);
                unset($order['destinationLatitude']);
                unset($order['destinationLongitude']);
                unset($order['taxiDriverId']);
                unset($order['taxiOperatorUserId']);
                unset($order['oneSignalUserId']);
                unset($order['note']);
                unset($order['user']);
            }

            $pendingList = json_decode($pendingList);
            $orderList = array_merge($orderList, $pendingList);
        }
        if ($accepted == 1) {
            $acceptedList = NewOrder::where('state', 'ACCEPTED')->where('time', '>', $from)->where('time', '<', $to)->limit(15)->offset(0)->with('user')->get();

            foreach ($acceptedList as $order) {
                $order['driverName'] = $order['user']['firstName'] . ' ' . $order['user']['lastName'];
                unset($order['originLatitude']);
                unset($order['originLongitude']);
                unset($order['destinationLatitude']);
                unset($order['destinationLongitude']);
                unset($order['taxiDriverId']);
                unset($order['taxiOperatorUserId']);
                unset($order['oneSignalUserId']);
                unset($order['note']);
                unset($order['user']);
            }

            $acceptedList = json_decode($acceptedList);
            $orderList = array_merge($orderList, $acceptedList);
        }
        if ($rejected == 1) {
            $rejectedList = NewOrder::where('state', 'REJECTED')->where('time', '>', $from)->where('time', '<', $to)->limit(15)->offset(0)->with('user')->get();

            foreach ($rejectedList as $order) {
                $order['driverName'] = $order['user']['firstName'] . ' ' . $order['user']['lastName'];
                unset($order['originLatitude']);
                unset($order['originLongitude']);
                unset($order['destinationLatitude']);
                unset($order['destinationLongitude']);
                unset($order['taxiDriverId']);
                unset($order['taxiOperatorUserId']);
                unset($order['oneSignalUserId']);
                unset($order['note']);
                unset($order['user']);
            }

            $rejectedList = json_decode($rejectedList);
            $orderList = array_merge($orderList, $rejectedList);
        }

        $orderList = collect($orderList)->sortByDesc('time');
        return $orderList;
    }

    public function getFinishedOrders(Request $request)
    {
        if(isset($request->nano)){
            $nano = $request->nano;
        }
        else{
            $nano = 1;
        }
        if(isset($request->car)){
            $car = $request->car;
        }
        else{
            $car = 1;
        }
        if(isset($request->van)){
            $van = $request->van;
        }
        else{
            $cvan = 1;
        }
        if(isset($request->from)){
            $from = $request->from;
        }
        else{
            $from = Carbon::now()->subWeek()->toDateTimeString();
        }
        if(isset($request->to)){
            $to = $request->to;
        }
        else{
            $to = Carbon::now()->toDateTimeString();
        }

        $nanoList = array();
        $carList = array();
        $vanList = array();

        $orderList = array();

        if ($nano == 1) {
            $nanoList = FinishedOrder::with('taxi.taxiType', 'user')->where('taxiType', 'NOW')->where('time', '>', $from)->where('time', '<', $to)->limit(15)->offset(0)->with('user')->get();

            foreach ($nowList as $order) {
                $order['driverName'] = $order['user']['firstName'] . ' ' . $order['user']['lastName'];
                unset($order['originLatitude']);
                unset($order['originLongitude']);
                unset($order['destinationLatitude']);
                unset($order['destinationLongitude']);
                unset($order['taxiDriverId']);
                unset($order['taxiOperatorUserId']);
                unset($order['oneSignalUserId']);
                unset($order['note']);
                unset($order['user']);
            }

            $nowList = json_decode($nowList);
            $orderList = array_merge($orderList, $nowList);
        }

        if ($pending == 1) {
            $pendingList = NewOrder::where('state', 'PENDING')->where('time', '>', $from)->where('time', '<', $to)->limit(15)->offset(0)->with('user')->get();

            foreach ($pendingList as $order) {
                $order['driverName'] = $order['user']['firstName'] . ' ' . $order['user']['lastName'];
                unset($order['originLatitude']);
                unset($order['originLongitude']);
                unset($order['destinationLatitude']);
                unset($order['destinationLongitude']);
                unset($order['taxiDriverId']);
                unset($order['taxiOperatorUserId']);
                unset($order['oneSignalUserId']);
                unset($order['note']);
                unset($order['user']);
            }

            $pendingList = json_decode($pendingList);
            $orderList = array_merge($orderList, $pendingList);
        }
        if ($accepted == 1) {
            $acceptedList = NewOrder::where('state', 'ACCEPTED')->where('time', '>', $from)->where('time', '<', $to)->limit(15)->offset(0)->with('user')->get();

            foreach ($acceptedList as $order) {
                $order['driverName'] = $order['user']['firstName'] . ' ' . $order['user']['lastName'];
                unset($order['originLatitude']);
                unset($order['originLongitude']);
                unset($order['destinationLatitude']);
                unset($order['destinationLongitude']);
                unset($order['taxiDriverId']);
                unset($order['taxiOperatorUserId']);
                unset($order['oneSignalUserId']);
                unset($order['note']);
                unset($order['user']);
            }

            $acceptedList = json_decode($acceptedList);
            $orderList = array_merge($orderList, $acceptedList);
        }
        if ($rejected == 1) {
            $rejectedList = NewOrder::where('state', 'REJECTED')->where('time', '>', $from)->where('time', '<', $to)->limit(15)->offset(0)->with('user')->get();

            foreach ($rejectedList as $order) {
                $order['driverName'] = $order['user']['firstName'] . ' ' . $order['user']['lastName'];
                unset($order['originLatitude']);
                unset($order['originLongitude']);
                unset($order['destinationLatitude']);
                unset($order['destinationLongitude']);
                unset($order['taxiDriverId']);
                unset($order['taxiOperatorUserId']);
                unset($order['oneSignalUserId']);
                unset($order['note']);
                unset($order['user']);
            }

            $rejectedList = json_decode($rejectedList);
            $orderList = array_merge($orderList, $rejectedList);
        }

        $orderList = collect($orderList)->sortByDesc('time');
        return $orderList;
    }
}

