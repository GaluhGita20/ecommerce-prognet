<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Auth;

class CartController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $carts = Cart::where([['user_id', '=', $user->id],['status','=','aktif']])->get();
        return view('user.cart')->with(compact('carts'));
    }

    public function create(Request $request){
        $request->validate([
            "input_id_productcart" => "required",
            "qty_product"=> "required|numeric"
        ]);
        $user = Auth::user();
        $carts = Cart::where([['user_id', '=', $user->id],['product_id','=',$request->input_id_productcart],['status','=','aktif']])->get();
        $product = Product::find($request->input_id_productcart);
        if(count($carts)==0){
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $request->input_id_productcart; 
            $cart->qty = $request->qty_product;
            $cart->status = "aktif";
            $cart->save();  
        }else{  
            foreach($carts as $cart){
                $temp = new Cart;
                $temp = Cart::where('id','=',$cart->id)->increment('qty', $request->qty_product);
            }  
        }
        return back();
        // return response()->json(['return' => 'some data']);
    }

    public function update(Request $request){
        $request->validate([
            "input_id_productcart" => "required",
            "qty_product"=> "required|numeric"
        ]);
        $user = Auth::user();
        $carts = Cart::where([['user_id', '=', $user->id],['product_id','=',$request->input_id_productcart],['status','=','aktif']])->get();
        $product = Product::find($request->input_id_productcart);
        foreach($carts as $cart){
            $temp = Cart::where('id','=',$cart->id)->first();
            $temp->update([
                'qty' => $request->qty_product,
            ]);
        }  
        return back();
        // return response()->json(['return' => 'some data']);
    }

    public function clear_cart(){
        $carts = Cart::where([['user_id', '=', Auth::user()->id],['status','=','aktif']])->get();
        foreach($carts as $cart){
            $data = Cart::find($cart->id);
            $data->delete();
        }
        return back();
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }
}
