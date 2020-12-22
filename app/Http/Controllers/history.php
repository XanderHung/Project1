<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class history extends Controller
{
    public function viewhistory(){
        $category = \App\Category::all();
        $hist = \App\history::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        
            return view('/transaction/history', compact('user', 'hist','category'));
        
    }

    public function detailhistory($id){
        $category = \App\Category::all();
        //$hist = \App\history::all();
        $selhist = DB::table('history')->where('transactionid',$id)->pluck('transactionid')->first();
        $item = DB::table('detail_history')->join('flower','flower.flowerid','=','detail_history.flowerid')->where('historyid',$id)->get();
        //dd($item);
        $selhist = DB::table('history')->where('transactionid',$id)->first();
        $flower = \App\Flower::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
            return view('/transaction/detailhistory', compact('user','category','item','selhist','flower'));
        }
    

}