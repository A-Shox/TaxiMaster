@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Accounts
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-fw fa-pencil-square-o"></i> Edit user account
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <form class="form-horizontal" action="/accounts/update/{{$user->username}}" method="POST">
            <fieldset>
                {{csrf_field()}}

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Username</label>
                    <div class="col-md-4">
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" readonly='true' value="{{$user->username}}">
                        </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="firstname">First name</label>
                    <div class="col-md-4">
                        <input id="firstname" name="firstName" type="text" placeholder="First name" class="form-control input-md" value="{{$user->firstName}}" required>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="lastname">Last name</label>
                    <div class="col-md-4">
                        <input id="lastname" name="lastName" type="text" placeholder="Last name" class="form-control input-md" value="{{$user->lastName}}" required>

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="phone">Mobile phone</label>
                    <div class="col-md-4">
                        <input id="phone" name="phone" type="text" placeholder="Enter a mobile phone number" class="form-control input-md" value="{{$user->phone}}" required>

                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-8">
                        <button id="button1id" name="button1id" class="btn btn-default" onclick="back()">Cancel</button>
                        <button id="" class="btn btn-info" type="submit">Save</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>

    <script>

        back = function () {
            parent.history.back();
            return false;
        }

    </script>

@stop