<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addcategory()
    {
        $data_categoryflower = \App\Category::all();
        return view('AddCat',['data_categoryflower' => $data_categoryflower]);
    }

    public function create(Request $request)
    {
        \App\Category::create($request->all());
    }
}
