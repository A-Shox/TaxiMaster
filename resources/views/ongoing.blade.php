@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    On Going Orders
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>At</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Contact</th>
                            <th>Note</th>
                            <th>Taxi Driver</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderList as $order)
                            <tr>
                                <td>{{$order->time}}</td>
                                <td>{{$order->origin}}</td>
                                <td>{{$order->destinaton}}</td>
                                <td>{{$order->contact}}</td>
                                <td>{{$order->note}}</td>
                                <td>{{$order->user->firstName . $order->user->lastName}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@stop