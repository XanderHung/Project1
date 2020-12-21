<?php

namespace App\Http\Controllers;

use App\detailcart;
use App\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Cart extends Controller
{
    public function viewcart(){
//        session()->forget('cart');
        $category = \App\Category::all();
        $user = DB::table('users')->join('roletype','users.roleid','=','roletype.roleid')
            ->where('id','=',Auth::id())->first();
        $cart = DB::table('detailcart')->join('cart','detailcart.detailid','=','cart.detailid')
            ->join('flower','cart.flowerid','=','flower.flowerid')
            ->where('userid',Auth::id())->orWhere('done',false)
            ->get(['flowername','flowerimage','price','quantity']);
        return view('/transaction/cart', compact('user','category','cart'));
    }
    public function addcart($id,Request $request){
//        $request->validate(['quantity'=>'required:0|numeric']);
//        if(!DB::table('detailcart')->where('userid',Auth::id())->first()|| !DB::table('detailcart')->where('done',false and
//                'userid',Auth::id())->first()){
//            $detailcart = new detailcart;
//            $detailcart->userid = Auth::id();
//            $detailcart->done = false;
//            $detailcart->save();
//            $cart = new \App\cart();
//            $cart->detailid = $detailcart->id;
//            $cart->flowerid = $id;
//            $cart->quantity = $request->input('quantity');
//            $cart->save();
//        }else{
//            $quantity = DB::table('detailcart')->join('cart','detailcart.detailid','=','cart.detailid')->where('userid',Auth::id() and 'done',false)->orWhere('flowerid',$id)->pluck('quantity')
//                ->first()+$request->input('quantity');
//            $flower = DB::table('detailcart')->join('cart','detailcart.detailid','=','cart.detailid')->where('userid',Auth::id() and 'done',false)->orWhere('flowerid',$id)->pluck('flowerid')
//                ->first();
//            if($flower){
//                DB::table('cart')->join('detailcart','cart.detailid','=','detailcart.detailid')->where('userid',Auth::id() and 'done',false)->orWhere('flowerid',$id)
//                    ->update(['quantity'=>$quantity]);
//            }else{
//                $cart = new \App\cart();
//                $cart->detailid = DB::table('detailcart')
//                    ->where('userid',Auth::id())->orWhere('done',false)
//                    ->pluck('detailid')->first();
//                $cart->flowerid = $id;
//                $cart->quantity = $request->input('quantity');
//                $cart->save();
//            }
//        }
        $cart = session()->get('cart');
        $flower = DB::table("flower")->where('flowerid',$id)->first();
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $flower->flowername,
                    "quantity" => $request->quantity,
                    "price" => $flower->price,
                    "photo" => $flower->flowerimage
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']+=$request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $flower->flowername,
            "quantity" => $request->quantity,
            "price" => $flower->price,
            "photo" => $flower->flowerimage
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('status', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->quantity == 0) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }else if ($request->id and $request->quantity) {
            $flower = DB::table("flower")->where('flowername', $request->id)->limit(1)->pluck('flowerid');
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }
//        if($request->quantity == 0){
//            DB::table('cart')->join('flower','cart.flowerid','=','flower.flowerid')
//                ->join('detailcart','detailcart.detailid','=','cart.detailid')
//                ->where('flowername',$request->id)->orWhere('userid',Auth::id())
//                ->orWhere('done',false)->delete();
//        }else {
//            DB::table('cart')->join('flower', 'cart.flowerid', '=', 'flower.flowerid')
//                ->join('detailcart', 'detailcart.detailid', '=', 'cart.detailid')
//                ->where('flowername', $request->id)->orWhere('userid',Auth::id())->orWhere('done',false)->limit(1)
//                ->update(['quantity'=>$request->quantity]);
//        }
//        return redirect()->back();

//    public function remove($id)
//    {
//        $name = DB::table('flower')->where('flowername',$id)->pluck('flowerid')->first();
//        $cart = session()->get('cart');
//            if(isset($cart[$name])) {
//                unset($cart[$name]);
//                session()->put('cart', $cart);
//            }
//            session()->flash('success', 'Product removed successfully');
//
//        return redirect()->back();
//    }
}
