<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

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

    //    $request->validate([
    //        'categoryname' => 'required|min:3',
    //    ]);

    //    $input = $request->all();
    //    if($request->hasFile('categoryimage'))
    //    {
    //        $destination_path = 'public/image/products';
    //        $image = $request->file('categoryimage');
    //        $image_name = $image->getClientOriginalName();
    //        $path = $request->file('categoryimage')->storeAs($destination_path,$image_name);

    //        $input['categoryimage'] = $image_name;
    //    }

    //    Category::create($input);
    //    session()->flash('message',$input['categoryname'].' successfully saved');

    //    return redirect('/addcat');
    }
}
