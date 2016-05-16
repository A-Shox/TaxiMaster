@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Accounts
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-fw fa-user"></i> Create new user account
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <form class="form-horizontal">
            <fieldset>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="selectbasic">User type</label>
                    <div class="col-md-4">
                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="0">-- Select one --</option>
                            <option value="1">Admin</option>
                            <option value="2">Taxi Driver</option>
                            <option value="3">Taxi Operator</option>
                        </select>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Username</label>
                    <div class="col-md-4">
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="firstname">First name</label>
                    <div class="col-md-4">
                        <input id="firstname" name="firstname" type="text" placeholder="First name" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="lastname">Last name</label>
                    <div class="col-md-4">
                        <input id="lastname" name="lastname" type="text" placeholder="Last name" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="phone">Mobile phone</label>
                    <div class="col-md-4">
                        <input id="phone" name="phone" type="text" placeholder="Enter a mobile phone number" class="form-control input-md">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">Password</label>
                    <div class="col-md-4">
                        <input id="password" name="password" type="password" placeholder="Enter password" class="form-control input-md">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="repassword">Confirm Password</label>
                    <div class="col-md-4">
                        <input id="repassword" name="repassword" type="password" placeholder="Re enter password" class="form-control input-md">

                    </div>
                </div>


                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for=""></label>
                    <div class="col-md-4">
                        <button id="" name="" class="btn btn-primary">Register</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>

@stop