<?php

namespace App\Http\Controllers;


use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function showloginform(){
        $category = \App\Category::all();
        return view('/auth/login',compact('category'));
    }
    public function login(Request $request)
    {
        $email= $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        $result =Auth::attempt([
            'email'=> $email,
            'password'=> $password,
        ]);

        if($result === true){
            if($remember){
                \Illuminate\Support\Facades\Cookie::queue('rememberEmail',$email);
            }
            return redirect('/')->with('status','Login Success!');
        }else{
            return redirect('/login?error=1');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
