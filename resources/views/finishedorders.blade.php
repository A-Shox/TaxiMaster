@extends('layouts.app')

@section('content')

    <link href="/css/jquery.datetimepicker.css" rel="stylesheet">
    <script src="/js/jquery.datetimepicker.full.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Finished Orders
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="btn-group inline">
                    <div class="col-lg-3">
                        <button id="nano" type="button" class="btn btn-warning filter-orders-btn" value="1" name="nano">
                            NANO
                        </button>
                    </div>
                    <div class="col-lg-3">
                        <button id="car" type="button" class="btn btn-success filter-orders-btn" value="1"
                                name="car">
                            CAR
                        </button>
                    </div>
                    <div class="col-lg-3">
                        <button id="van" type="button" class="btn btn-info filter-orders-btn" value="1"
                                name="van">VAN
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form class="form-inline filter" role="form" style="margin-left: 35px;  margin-bottom: 20px;">
                    <div class="form-group" style="margin-right: 75px;">
                        <label for="from">From</label>
                        <input id="datetimepickerFrom" type="text" class="form-control" name="from">
                    </div>
                    <div class="form-group">
                        <label for="to">To</label>
                        <input id="datetimepickerTo" type="text" class="form-control" name="to">
                    </div>
                </form>

                <script>
                    jQuery('#datetimepickerFrom').datetimepicker({
                        todayButton:true,
                        defaultDate:new Date(),
                        onClose:function () {
                            filterData();
                        }
                    });
                    jQuery('#datetimepickerTo').datetimepicker({
                        todayButton:true,
                        defaultDate:new Date(),
                        onClose:function () {
                            filterData();
                        }
                    });
                </script>
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
                            <th>Taxi Driver</th>
                            <th>Taxi Model</th>
                            <th>Hire Fare</th>
                        </tr>
                        </thead>
                        <tbody id="tableBody">
                        @foreach($orderList as $order)
                            @if($order->taxiType==='nano')
                                <tr class="success">
                            @elseif($order->taxiType==='car')
                                <tr class="info">
                            @elseif($order->taxiType==='van')
                                <tr class="warning">
                            @else
                                <tr>
                                    @endif
                                    <td>{{$order->startTime}}</td>
                                    <td>{{$order->origin}}</td>
                                    <td>{{$order->destination}}</td>
                                    <td>{{$order->driverName}}</td>
                                    <td>{{$order->taxiModel}}</td>
                                    <td>{{$order->fare}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Filter panel button clicks -->
    <!-- Driver state filter panel button clicks -->
    <script>
        $('.filter-orders-btn').click(function () {
            if (this.id === 'nano') {
                $('#nano').toggleClass('btn-warning');
            }
            else if (this.id === 'car') {
                $('#car').toggleClass('btn-success');
            }
            else if (this.id === 'van') {
                $('#van').toggleClass('btn-info');
            }

            if (this.value == 0) {
                this.value = 1;
            }
            else {
                this.value = 0;
            }

            filterData();

        });

    </script>

    <script>

        function filterData(){
            var nano = $("[name='now']").val();
            var car = $("[name='car']").val();
            var van = $("[name='van']").val();
            var from = $("[name='from']").val();
            var to = $("[name='to']").val();

            var url = "/finished-orders";

            if(from.length==0 && to.length==0){
                window.location.href = url + "?nano=" + nano + "&car=" + car + "&van=" + van;
            }
            else if(to.length==0){
                window.location.href = url + "?nano=" + nano + "&car=" + car + "&van=" + van + "&from=" + from;
            }
            else if(from.length==0){
                window.location.href = url + "?nano=" + nano + "&car=" + car + "&van=" + van + "&to=" + to;
            }
            else {
                window.location.href = url + "?nano=" + nano + "&car=" + car + "&van=" + van + "&from=" + from + "&to=" + to;
            }

        }

        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        $(document).ready(function () {
            var nano = getParameterByName('nano');
            var car = getParameterByName('car');
            var van = getParameterByName('van')
            var from = getParameterByName('from');
            var to = getParameterByName('to');

            $('#datetimepickerFrom').val(from);
            $('#datetimepickerTo').val(to);

            if(nano==0){
                $('#nano').toggleClass('btn-warning');
                $('#nano').val(now);
            }
            if(pending==0){
                $('#car').toggleClass('btn-success');
                $('#car').val(pending);
            }
            if(accepted==0){
                $('#van').toggleClass('btn-info');
                $('#van').val(accepted);
            }

        });

    </script>

@stop