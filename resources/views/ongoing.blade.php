@extends('layouts.app')

@section('content')

    <link href="/css/jquery.datetimepicker.css" rel="stylesheet">
    <script src="/js/jquery.datetimepicker.full.min.js"></script>

    <style>

        html,body { height: 100%; }
        #page-wrapper { height: 100% }

    </style>

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
                <div class="btn-group inline">
                    <div class="col-lg-3">
                        <button id="now" type="button" class="btn btn-success filter-orders-btn" value="1" name="now">
                            NOW
                        </button>
                    </div>
                    <div class="col-lg-3">
                        <button id="pending" type="button" class="btn btn-info filter-orders-btn" value="1"
                                name="pending">
                            PENDING
                        </button>
                    </div>
                    <div class="col-lg-3">
                        <button id="accepted" type="button" class="btn btn-warning filter-orders-btn" value="1"
                                name="accepted">ACCEPTED
                        </button>
                    </div>
                    <div class="col-lg-3">
                        <button id="rejected" type="button" class="btn btn-danger filter-orders-btn" value="1"
                                name="rejected">REJECTED
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
                        todayButton: true,
                        defaultDate: new Date(),
                        onClose: function () {
                            filterData();
                        }
                    });
                    jQuery('#datetimepickerTo').datetimepicker({
                        todayButton: true,
                        defaultDate: new Date(),
                        onClose: function () {
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
                            <th>Contact</th>
                            <th>Taxi Driver</th>
                        </tr>
                        </thead>
                        <tbody id="tableBody">
                        @foreach($orderList as $order)
                            @if($order->state==='NOW')
                                <tr class="success">
                            @elseif($order->state==='PENDING')
                                <tr class="info">
                            @elseif($order->state==='ACCEPTED')
                                <tr class="warning">
                            @elseif($order->state==='REJECTED')
                                <tr class="danger">
                            @else
                                <tr>
                                    @endif
                                    <td>{{$order->time}}</td>
                                    <td>{{$order->origin}}</td>
                                    <td>{{$order->destination}}</td>
                                    <td>{{$order->contact}}</td>
                                    <td>{{$order->driverName}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                {{--<div class="col-lg-6 col-lg-offset-3">--}}
                    {{--<button class="btn btn-link" style="width:100%;" onclick="loadMore()">Load More</button>--}}
                {{--</div>--}}
            </div>
        </div>

    </div>

    <!-- Filter panel button clicks -->
    <!-- Driver state filter panel button clicks -->
    <script>
        $('.filter-orders-btn').click(function () {
            if (this.id === 'now') {
                $('#now').toggleClass('btn-success');
            }
            else if (this.id === 'pending') {
                $('#pending').toggleClass('btn-info');
            }
            else if (this.id === 'accepted') {
                $('#accepted').toggleClass('btn-warning');
            }
            else if (this.id === 'rejected') {
                $('#rejected').toggleClass('btn-danger');
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

        $('td').click(function(){
           var row = $(this).parent().parent().children().index($(this).parent());

        });

    </script>

    <script>

        function filterData() {
            var now = $("[name='now']").val();
            var pending = $("[name='pending']").val();
            var accepted = $("[name='accepted']").val();
            var rejected = $("[name='rejected']").val();
            var from = $("[name='from']").val();
            var to = $("[name='to']").val();

            var url = "/ongoing-orders";

            if (from.length == 0 && to.length == 0) {
                window.location.href = url + "?now=" + now + "&pending=" + pending + "&accepted=" + accepted + "&rejected=" + rejected;
            }
            else if (to.length == 0) {
                window.location.href = url + "?now=" + now + "&pending=" + pending + "&accepted=" + accepted + "&rejected=" + rejected + "&from=" + from;
            }
            else if (from.length == 0) {
                window.location.href = url + "?now=" + now + "&pending=" + pending + "&accepted=" + accepted + "&rejected=" + rejected + "&to=" + to;
            }
            else {
                window.location.href = url + "?now=" + now + "&pending=" + pending + "&accepted=" + accepted + "&rejected=" + rejected + "&from=" + from + "&to=" + to;
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
            var now = getParameterByName('now');
            var pending = getParameterByName('pending');
            var accepted = getParameterByName('accepted');
            var rejected = getParameterByName('rejected');
            var from = getParameterByName('from');
            var to = getParameterByName('to');

            if(from==null){
                $('#datetimepickerFrom').val('1 Week before');
            }
            else{
                $('#datetimepickerFrom').val(from);
            }

            if(to==null){
                $('#datetimepickerTo').val('Today');
            }
            else{
                $('#datetimepickerTo').val(to);
            }

            if (now == 0) {
                $('#now').toggleClass('btn-success');
                $('#now').val(now);
            }
            if (pending == 0) {
                $('#pending').toggleClass('btn-info');
                $('#pending').val(pending);
            }
            if (accepted == 0) {
                $('#accepted').toggleClass('btn-warning');
                $('#accepted').val(accepted);
            }
            if (rejected == 0) {
                $('#rejected').toggleClass('btn-danger');
                $('#rejected').val(rejected);
            }

        });

    </script>

@stop