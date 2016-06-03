@extends('layouts.app')

@section('content')

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
                    Taxis
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-fw fa-pencil-square-o"></i> Edit taxi
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" action="/taxis/update/{{$data['taxi']->id}}" method="POST">
                    <fieldset>
                        {{csrf_field()}}

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="taxiId">Registered Number</label>
                            <div class="col-md-4">
                                <input id="taxiId" name="taxiId" type="text"
                                       class="form-control input-md" readonly='true' value="{{$data['taxi']->id}}">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="model">Model</label>
                            <div class="col-md-4">
                                <input id="model" name="model" type="text" placeholder="Model"
                                       class="form-control input-md" value="{{$data['taxi']->model}}" required readonly='true'>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="noOfSetas">Number Of Seats</label>
                            <div class="col-md-4">
                                <input id="noOfSetas" name="noOfSetas" type="text" placeholder="Number Of Seats"
                                       class="form-control input-md" value="{{$data['taxi']['noOfSeats']}}" required
                                       readonly='true'>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="driverName">Taxi Driver</label>
                            <div class="col-md-4">
                                <select id="driverId" name="driverId" class="form-control" required>
                                    <option value="0">-- Not Assigned --</option>
                                    @foreach($data['driverList'] as $driver)
                                        <option value="{{$driver['driverId']}}">{{$driver['driverName']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-4">
                                <button id="submit" name="" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                        <!-- Error -->
                        <div class="form-group">
                            @if(count($errors))
                                <label class="col-md-4 control-label" for=""></label>
                                <div class="col-md-4 alert alert-danger alert-dismissable">
                                    <p>{{$errors->first()}}</p>
                                </div>
                            @endif
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script>

        back = function () {
            parent.history.back();
            return false;
        }

    </script>

@stop