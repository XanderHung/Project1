<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class flower extends Controller
{
    public function showflowerform(){
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        if (Auth::guest()){
            return view('/flower/addflower',compact('category'));
        }else {
            return view('/flower/addflower', compact('user', 'category'));
        }
    }
    public function flower(Request $request)
    {
        $this->validate($request, [
            'categoryid' => 'required|string',
            'flowername' => 'required|string',
            'description' => 'required|string',
        ]);

        $flower = new \App\Flower();
        $flower->categoryid = $request->input('categoryid');
        $flower->flowername = $request->input('flowername');
        $flower->price = $request->input('price');
        $flower->description = $request->input('description');
        $file = $request->file('flowerimage');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('upload/flower/',$filename);
        $flower->flowerimage = $filename;
        $flower->save();
        return redirect('/addflower')->with('status', 'Flower berhasil Diinput!');
    }
    public function viewflower($id){
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        $selcat = DB::table('category')->where('categoryname', $id)->first();
        $flower = \App\Flower::all();
        if (Auth::guest()){
            return view('/flower/viewflower', compact('category','selcat', 'flower'));
        }else {
            return view('/flower/viewflower', compact('category', 'user', 'selcat', 'flower'));
        }
    }
    public function manflower($id){
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        $selcat = DB::table('category')->where('categoryname', $id)->first();
        $flower = \App\Flower::all();
        if (Auth::guest()){
            return view('/flower/manflower', compact('category','selcat', 'flower'));
        }else {
            return view('/flower/manflower', compact('category', 'user', 'selcat', 'flower'));
        }
    }
    public function showeditform($id)
    {
        $flower = DB::table('flower')->where('flowername',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/flower/edit', compact('flower'));
    }
    public function destroy($id)
    {
        DB::table('flower')->where('flowername',$id)->delete();
        return redirect('/manflower')->with('status', 'Category deleted!');
    }
}
