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
        //$selcat = DB::table('category')->where('categoryname', $id)->first();
            return view('\category\mancat', compact('category', 'user'));
    }
    public function showeditform($id)
    {
        $selcat =DB::table('category')->where('categoryid',$id)->first();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        $category = \App\Category::all();
        // passing data books yang didapat ke view edit.blade.php
        return view('/category/edit',compact('selcat','user','category'));
    }
    public function destroy($id)
    {
        DB::table('Category')->where('categoryid',$id)->delete();
        return redirect('/mancat')->with('status', 'Category deleted!');
    }
}
