@extends('layouts.app')

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js   "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

    <link href="/css/jquery.datetimepicker.css" rel="stylesheet">
    <script src="/js/jquery.datetimepicker.full.min.js"></script>

    <style>

        html, body {
            min-height: 100%;
        }

        #page-wrapper {
            min-height: 100%;
        }

    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    New Order
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3 col-lg-offset-0" style="background-color: 	#e2ca25">
                    <img src="/img/background_transparent.png" class="img-rounded" alt="Cinque Terre" width="240" height="240">
                </div>
                <div class="col-lg-3 col-lg-offset-1" style="background-color: #19BF14">
                    <img src="/img/background_transparent.png" class="img-rounded" alt="Cinque Terre" width="240" height="240">
                </div>
                <div class="col-lg-3 col-lg-offset-2" style="background-color: #3189d5">
                    <img src="/img/background_transparent.png" class="img-rounded" alt="Cinque Terre" width="240" height="240">
                </div>

            </div>
        </div>

    </div>

@stop