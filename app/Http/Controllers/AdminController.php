<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
//    public function addcategory()
//    {
//        $data_categoryflower = \App\Category::all();
//        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
//            ->where('id','=',Auth::id())->get();
//        return view('addcat',['data_categoryflower' => $data_categoryflower,'user'=>$user]);
//    }
//    public function managecategory()
//    {
//        $data_categoryflower = \App\Category::all();
//        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
//            ->where('id','=',Auth::id())->get();
//        return view('mancat',['data_categoryflower' => $data_categoryflower,'user'=>$user]);
//    }
//    public function store(Request $request)
//    {
//        $cat = new Category();
//        $cat->categoryname = $request->input('categoryname');
//        if ($request ->hasfile('categoryimage')){
//            $file = $request->file('categoryimage');
//            $extension = $file->getClientOriginalExtension();
//            $filename = time() . '.' . $extension;
//            $file->move('upload/category/',$filename);
//            $cat->categoryimage = $filename;
//        }else{
//            return $request;
//            $cat->categoryimage = '';
//        }
//        $cat->save();
//        return redirect()->back();
//    }
//
//
//    public function edit($id)
//    {
//
//    $category = DB::table('category')->where('categoryid',$id)->first();
//    // passing data books yang didapat ke view edit.blade.php
//    return view('edit', compact('category'));
//    }

    public function changepassword()
    {
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        return view('/auth/reset',compact('category','user'));
    }
    public function confirmchange(Request $request)
    {
        $this->validate($request, [
            'passwordold' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        if(Hash::check($request->input('passwordold'),Auth::user()->getAuthPassword())){
            DB::table('users')->where('id',Auth::id())->update(['password'=>Hash::make($request->input('password'))]);
            return redirect('/')->with('status','Password Change!');
        }else{
            return redirect()->back()->with('status','Password Not match!');
        }
    }

//    public function destroy($id)
//    {
//        DB::table('category')->where('categoryid',$id)->delete();
//        return redirect('/mancat')->with('success', 'Category deleted!');
//    }
}
