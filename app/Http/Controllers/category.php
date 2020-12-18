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
        return view('/category/edit',compact('selcat','user','category'));
    }
    public function update(Request $request,$id){
        $data=array();
        $data['categoryname']= $request->input('categoryname');
        if ($request ->hasfile('categoryimage')){
        $file = $request->file('categoryimage');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('upload/flower/', $filename);
        $data['categoryimage'] = $filename;
        }else{
            $data['categoryimage'] = DB::table('category')->where('categoryid',$id)->pluck('categoryimage')->first();
        }

        DB::table('category')->where('categoryid',$id)->update($data);
        return redirect()->back()->with('status','Category Updated!');
    }
    public function destroy($id)
    {
        DB::table('Category')->where('categoryid',$id)->delete();
        return redirect('/mancat')->with('status', 'Category deleted!');
    }
}
