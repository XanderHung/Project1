<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class category extends Controller
{
    public function managecategory()
    {
        $data_categoryflower = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->get();
        return view('mancat',['data_categoryflower' => $data_categoryflower,'user'=>$user]);
    }
    public function store(Request $request)
    {
        $cat = new \App\Category();
        $cat->categoryname = $request->input('categoryname');
        if ($request ->hasfile('categoryimage')){
            $file = $request->file('categoryimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/category/',$filename);
            $cat->categoryimage = $filename;
        }else{
            return $request;
            $cat->categoryimage = '';
        }
        $cat->save();
        return redirect()->back();
    }
    public function edit($id)
    {

        $category = DB::table('category')->where('categoryid',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('edit', compact('category'));
    }
    public function destroy($id)
    {
        DB::table('category')->where('categoryid',$id)->delete();
        return redirect('/mancat')->with('success', 'Category deleted!');
    }
}
