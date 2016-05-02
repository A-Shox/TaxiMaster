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
    
    Route::get("/test", "TestController@test");

    Route::get('/dashboard', function()
    {
        if(Auth::check()){
            return View::make('dashboard');
        }
        else{
            return redirect("/login");
        }
    });

    Route::get('/login', function()
    {
        if(Auth::check()){
            return redirect("/dashboard");
        }
        else{
            return View::make('login');
        }
    });

    Route::post('/login', 'AuthController@loginWeb');
    Route::get('/logout', 'AuthController@logoutWeb');
//    Route::get('/updates', 'WebController@getDriverUpdates');

    Route::get('/updates', 'WebController@getDriverUpdates');

});

Route::group(['middleware' => ['api']], function () {

    Route::post('/driver/update/state', 'DriverController@updateState');
    Route::post('/driver/update/location', 'DriverController@updateLocation');
    Route::post('/driver/login', 'AuthController@loginDriver'); 

    Route::get('/customer/taxis', 'CustomerController@getAvailableTaxis');

});

