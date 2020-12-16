<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cart extends Controller
{
    public function viewcart(){
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        if (Auth::guest()){
            return view('/transaction/cart',compact('category'));
        }else {
            return view('/transaction/cart', compact('user','category'));
        }
    }
    public function addcart($id){
        $flower = DB::table('flower')->where('flowerid',$id)->first();
        if(!$flower){
            abort(404);
        }
        $cart = session()->get('cart');

    }


}
