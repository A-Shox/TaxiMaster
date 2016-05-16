<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{
    public function deleteUser(Request $request){
        return json_encode(User::where('id', $request->id)->update(['isActive'=> false]));
    }
}
