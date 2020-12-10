<?php

namespace App\Http\Controllers;

use App\roletype;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        if (Auth::guest()){
            return view('home',['category' => $category]);
        }else {
            return view('home', ['category' => $category, 'user' => $user]);
        }
    }
}
