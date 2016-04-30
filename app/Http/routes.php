<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::get('/test', 'TestController@doStuff');
//Route::post('/test', 'TestController@doStuff');

Route::group(['middleware' => ['web']], function () {

    Route::get('/dashboard', function()
    {
        return View::make('dashboard');
    });

    Route::get('/login', function()
    {
        return View::make('login');
    });

});

Route::group(['middleware' => ['api']], function () {

    Route::post('/driver/update/state', 'DriverController@updateState');
    Route::post('/driver/update/location', 'DriverController@updateLocation');
    Route::post('/driver/login', 'DriverController@login');

    Route::get('/customer/taxis', 'CustomerController@getAvailableTaxis');

});

