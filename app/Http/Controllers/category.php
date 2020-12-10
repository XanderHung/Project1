<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class category extends Controller
{
    public function managecategory()
    {
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        if (Auth::guest()){
            return view('\category\mancat',compact('category'));
        }else {
        return view('\category\mancat',compact('category','user'));
        }
    }
    public function showeditform($id)
    {
        $category = DB::table('category')->where('categoryid',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('\category\edit', compact('category'));
    }
    public function destroy($id)
    {
        DB::table('category')->where('categoryid',$id)->delete();
        return redirect('/mancat')->with('status', 'Category deleted!');
    }
}
