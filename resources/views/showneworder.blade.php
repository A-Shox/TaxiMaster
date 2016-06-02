@extends('layouts.app')

@section('content')

    <style>

        html,body { height: 100%; }
        #page-wrapper { height: 100% }

    </style>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Accounts
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-fw fa-pencil-square-o"></i> View user account
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <form class="form-horizontal">
            <fieldset>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Username</label>
                    <div class="col-md-4">
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" disabled value="{{$user->username}}">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="firstname">First name</label>
                    <div class="col-md-4">
                        <input id="firstname" name="firstname" type="text" placeholder="First name" class="form-control input-md" disabled value="{{$user->firstName}}">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="lastname">Last name</label>
                    <div class="col-md-4">
                        <input id="lastname" name="lastname" type="text" placeholder="Last name" class="form-control input-md" disabled value="{{$user->lastName}}">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="phone">Mobile phone</label>
                    <div class="col-md-4">
                        <input id="phone" name="phone" type="text" placeholder="Enter a mobile phone number" class="form-control input-md" disabled value="{{$user->phone}}">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-8">
                        <a href="/accounts/edit/{{$user->id}}" class="btn btn-info" role="button">Edit</a>
                    </div>
                </div>


            </fieldset>
        </form>
    </div>

@stop