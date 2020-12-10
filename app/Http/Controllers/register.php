<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class register extends Controller
{
    public function showregisterform()
    {
        $category = \App\Category::all();
        return view('/auth/register',compact('category'));
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'address' => 'required|string',
            'dob' => 'required|date',
            'gender'=> 'required|string'
        ]);

        $user = new user;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->dob = $request->input('dob');
        $user->roleid = '1';
        $user->save();

        return redirect('/login');
    }
}
