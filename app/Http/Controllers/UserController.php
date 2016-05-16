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

    public function showViewPage(User $user){
        return view('viewaccount', compact('user'));
    }

    public function showEditPage(User $user){
        return view('editaccount', compact('user'));
    }

    public function updateUser(Request $request){
        $user = User::where('username', $request->username)->first();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->phone = $request->phone;
        $user->save();
        
    }
}
