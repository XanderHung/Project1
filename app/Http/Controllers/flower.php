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
            ->where('id','=',Auth::id())->get();
        return view('/addflower',compact('user','category'));
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
        $file->move('upload/category/',$filename);
        $flower->flowerimage = $filename;
        $flower->save();
        return redirect('/addflower')->with('status', 'Flower berhasil Diinput!');
    }
    public function managecategory()
    {
        $data_categoryflower = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->get();
        return view('mancat',['data_categoryflower' => $data_categoryflower,'user'=>$user]);
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
