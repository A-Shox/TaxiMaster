@extends('layouts.app')

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js   "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

    <div class="container-fluid">
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
            <div class="col-lg-12">
                <form id="new_account_form" class="form-horizontal" action="/accounts/new" method="POST">
                    <fieldset>
                        {{csrf_field()}}
                                <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">User type</label>
                            <div class="col-md-4">
                                <select id="selectbasic" name="userType" class="form-control" required>
                                    <option value="">-- Select one --</option>
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
                                <input id="username" name="username" type="text" placeholder="Username"
                                       class="form-control input-md" required>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="firstname">First name</label>
                            <div class="col-md-4">
                                <input id="firstname" name="firstName" type="text" placeholder="First name"
                                       class="form-control input-md" required>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="lastname">Last name</label>
                            <div class="col-md-4">
                                <input id="lastname" name="lastName" type="text" placeholder="Last name"
                                       class="form-control input-md" required>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="phone">Mobile phone</label>
                            <div class="col-md-4">
                                <input id="phone" name="phone" type="text" placeholder="Enter a mobile phone number"
                                       class="form-control input-md" required>

                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password">Password</label>
                            <div class="col-md-4">
                                <input id="password" name="password" type="password" placeholder="Enter password"
                                       class="form-control input-md" minlength="6" maxlength="15" type="text">
                            </div>
                        </div>

                        <!-- Re password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="repassword">Confirm Password</label>
                            <div class="col-md-4">
                                <input id="rePassword" name="rePassword" type="password" placeholder="Re enter password"
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div id="password_error" class="form-group" style="display: none;">
                            <label class="col-md-4 control-label" for=""></label>
                            <div id="password_error" class="col-md-4">
                                <p class="text-danger">Password mismuatch.</p>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-4">
                                <button id="submit" name="" class="btn btn-primary">Register</button>
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

        function validatePassword() {
            password = $('#password').val();
            rePassword = $('#rePassword').val();
            
            if (password == rePassword) {
                return true;
            }
            else {
                return false;
            }
        }

        $('#submit').on('click', function (e) {
            if(!validatePassword()){
                $('#password_error').show();
                e.preventDefault();
            }
        });

        $('#new_account_form').validate();

    </script>
@stop