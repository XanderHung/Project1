<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Login extends Controller
{
    public function store(Request $request)
    {
        $user = new user();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->roleid = '2';
        $user->dob = $request->input('dob');
        $user->save();
        return view('home',compact($user));
    }
}
