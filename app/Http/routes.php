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


Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect("/dashboard");
        } else {
            return View::make('login');
        }
    });

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect("/dashboard");
        } else {
            return View::make('login');
        }
    });

    Route::get('/dashboard', function () {
        if (Auth::check()) {
            return View::make('dashboard');
        } else {
            return redirect("/login");
        }
    });

    Route::get('/newhire', function () {
        if (Auth::check()) {
            return View::make('newhire');
        } else {
            return redirect("/login");
        }
    });

    Route::get('/ongoingorders', function () {
        if (Auth::check()) {
            return View::make('ongoing-orders');
        } else {
            return redirect("/login");
        }
    });

    Route::get('/orderhistory', function () {
        if (Auth::check()) {
            return View::make('orderhistory');
        } else {
            return redirect("/login");
        }
    });

    Route::get('/accounts/view', function () {
        if (Auth::check()) {
            return View::make('viewaccounts');
        } else {
            return redirect("/login");
        }
    });

    Route::get('/taxis/new', function () {
        if (Auth::check()) {
            return View::make('newtaxi');
        } else {
            return redirect("/login");
        }
    });

    Route::get('/taxis/edit/{taxi}', function () {
        if (Auth::check()) {
            return View::make('edittaxi');
        } else {
            return redirect("/login");
        }
    });

    Route::post('/login', 'AuthController@loginWeb');
    Route::get('/logout', 'AuthController@logoutWeb');

    Route::get('/updates', 'WebController@getDriverUpdates');

    Route::get('/neworder', 'OrderController@showNewOrderPage');
    Route::get('/taxioperator/order/new', 'CustomerController@placeOrderByTaxiOperator');
    Route::get('/taxioperator/order/state', 'OrderController@getOrderState');

    Route::get('/accounts/delete/{id}', 'UserController@deleteUser');
    Route::get('/accounts/view/{user}', 'UserController@showViewPage');
    Route::get('/accounts/edit/{user}', 'UserController@showEditPage');
    Route::post('/accounts/update/{user}', 'UserController@updateUser');
    Route::get('/accounts/new', 'UserController@showNewUserPage');
    Route::post('/accounts/new', 'UserController@createNewUser');

    Route::get('/taxis/view', 'TaxiController@showViewTaxisPage');
    Route::get('/taxis/edit/{taxi}', 'TaxiController@showEditTaxisPage');
    Route::post('/taxis/update/{taxi}', 'TaxiController@updateTaxi');
    Route::post('/taxis/new', 'TaxiController@createNewTaxi');

    Route::get('/ongoing-orders', 'OrderController@showOnGoingOrdersPage');
    Route::get('/ongoing-orders/get', 'OrderController@getOngoingOrders');
    Route::get('/finished-orders', 'OrderController@showFinishedOrdersPage');
    Route::get('/finished-orders/get', 'OrderController@getFinishedOrders');
});

Route::group(['middleware' => ['api']], function () {

    Route::get('/driver/orders', 'DriverController@getOrderList');
    Route::post('/driver/login', 'AuthController@loginDriver');
    Route::post('/driver/update/state', 'DriverController@updateState');
    Route::post('/driver/update/location', 'DriverController@updateLocation');
    Route::get('/driver/order/respond', 'DriverController@respondToNewOrder');
    Route::get('/driver/order/finish', 'DriverController@finishOrder');

    Route::get('/customer/taxis', 'CustomerController@getAvailableTaxis');
    Route::get('/customer/order/new', 'CustomerController@placeOrder');
    Route::get('/customer/get/driverUpdate', 'CustomerController@getDriverUpdate');

});

