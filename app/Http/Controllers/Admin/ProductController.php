<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;


class ProductController extends Controller
{
    //
    public function index(){
        return view('admin.product.index');
    }

    public function addProduct(){
        return view('admin.product.add');
    }

    public function editProduct($id){
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    public function detailProduct($id){
        $product = Product::with(['product_images', 'product_category_details'])->where('id','=',$id)->get()->first();
        $categories = ProductCategory::all();
        return view('admin.product.detail')->with(compact('product', 'categories'));
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return view('admin.product.index');
    }

    public function saveProduct(Request $request){
       
        $request->validate([
            "product" => "required",
            "price" => "required|numeric",
            "description" => "required",
            "star" => "required|numeric",
            "stock" => "required|numeric",
            "weight" => "required|numeric"
        ]);
        
        

        $product= new Product();
        $product->product_name = $request->product;
        $product->price = $request->price;
        $product->desc = $request->description;
        $product->product_rate = $request->star;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->save();


        return redirect ('admin/products');
    }

    public function saveEditProduct(Request $request,$id){
       
        $request->validate([
            "product" => "required",
            "price" => "required|numeric",
            "description" => "required",
            "star" => "required|numeric",
            "stock" => "required|numeric",
            "weight" => "required|numeric"
        ]);
        
        

        $product= Product::find($id);
        $product->product_name = $request->product;
        $product->price = $request->price;
        $product->desc = $request->description;
        $product->product_rate = $request->star;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->update();


        return redirect ('admin/products');
    }
}
