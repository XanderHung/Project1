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
        $data_categoryflower = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->get();
        return view('home',['data_categoryflower' => $data_categoryflower,'user'=>$user]);
    }
}
