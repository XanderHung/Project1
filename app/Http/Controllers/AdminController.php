<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function addcategory()
    {
        $data_categoryflower = \App\Category::all();
        return view('addcat',['data_categoryflower' => $data_categoryflower]);
    }
    public function viewcategory()
    {
        $data_categoryflower = \App\Category::all();
        return view('viewcat',['data_categoryflower' => $data_categoryflower]);
    }
    public function store(Request $request)
    {
        $cat = new Category();
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

        return view('addcat')->with('addcat',$cat);
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
        return redirect('/viewcat')->with('success', 'Category deleted!');
    }
}
