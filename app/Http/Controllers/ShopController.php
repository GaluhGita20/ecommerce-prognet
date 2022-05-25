<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Cart;
use Auth;

class ShopController extends Controller
{
    //
    public function index(){
        
        if(Auth::guest()){
            $jmlh_cart = 0;
        }else{
            $carts = Cart::with('product', 'product.product_images')->where('user_id','=',Auth::user()->id)->get();
            $jmlh_cart = $carts->count();
        }

        //product category
        $categories = ProductCategory::all();
        return view('user.shop')->with(compact('jmlh_cart'));
    }

    public function shop_detail_product($slug)
    {
        $product = Product::with('product_images', 'discounts', 'product_category_details', 'product_category_details.category', 'product_reviews')->where('slug','=', $slug)->first();
        return view('user.shop-product-detail')->with(compact('product'));
        // return $product;
    }
}
