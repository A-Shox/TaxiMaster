<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;

class TestController extends Controller
{
    public function test(){
        return User::first();
    }
}
