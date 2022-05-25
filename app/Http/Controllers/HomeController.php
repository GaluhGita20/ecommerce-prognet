<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carts = Cart::with('product', 'product.product_images')->where('user_id','=',Auth::user()->id)->get();
        if(Auth::guest()){
            $jmlh_cart = 0;
        }else{
            $jmlh_cart = 0;
        }
        $products = Product::with('product_images', 'product_category_details', 'discounts')->paginate(10);
        return view('user.home')->with(compact('jmlh_cart', 'carts'));
        // return $products;
    }
}
