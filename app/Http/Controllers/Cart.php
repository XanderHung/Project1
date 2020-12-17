<?php

namespace App\Http\Controllers;

use App\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cart extends Controller
{
    public function viewcart(){
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
            return view('/transaction/cart', compact('user','category'));
    }
    public function addcart($id){
        $flower = DB::table('flower')->where('flowerid',$id)->first();
        if(!$flower){
            abort(404);
        }
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $flower->flowername,
                    "quantity" => 1,
                    "price" => $flower->price,
                    "photo" => $flower->flowerimage
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $flower->flowername,
            "quantity" => 1,
            "price" => $flower->price,
            "photo" => $flower->flowerimage
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function checkout(Request $request){
        $history = new history;
        $history->userid = Auth::id();
        $flower = DB::table('flower')->pluck('flowerid');
        $cart = session()->get('cart');
        for ($i=1;$i<=count($flower);$i++){
            if(isset($cart[$flower])){

            }
        }
    }

    public function remove($id)
    {
        $name = DB::table('flower')->where('flowername',$id)->pluck('flowerid')->first();
        $cart = session()->get('cart');
            if(isset($cart[$name])) {
                unset($cart[$name]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        
        return redirect()->back();
    }
}
