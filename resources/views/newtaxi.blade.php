@extends('layouts.app')

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js   "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

    <style>

        html,body { min-height: 100%; }
        #page-wrapper { min-height: 100%; }

    </style>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    New Taxis
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form id="new_taxi_form" class="form-horizontal" action="/taxis/new" method="post">
                    <fieldset>
                        {{csrf_field()}}
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="taxitype">Taxi type</label>
                            <div class="col-md-4">
                                <select id="taxiType" name="taxiType" class="form-control" required>
                                    <option value="">-- Select one --</option>
                                    @foreach($taxiTypes as $taxiType)
                                        <option value={{$taxiType->id}}>{{$taxiType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="registeredNo">Registered Number</label>
                            <div class="col-md-4">
                                <input id="registeredNo" name="registeredNo" type="text" placeholder="Registered Number"
                                       class="form-control input-md" required>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="model">Model</label>
                            <div class="col-md-4">
                                <input id="model" name="model" type="text" placeholder="Vehicle model"
                                       class="form-control input-md" required>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="noOfSeats"> Number of seats</label>
                            <div class="col-md-4">
                                <input id="noOfSeats" name="noOfSeats" type="number" placeholder=""
                                       class="form-control input-md" required min="1">

                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-4">
                                <button id="" name="" class="btn btn-primary">Add Taxi</button>
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

        $('#new_taxi_form').validate();

    </script>
@stop