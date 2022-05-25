<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategoryDetail;

class ProductCategoryController extends Controller
{
    public function addCategoryProduct($id, Request $request){
        $request->validate([
            "category" => "required",
        ]);
        $kategori= new ProductCategoryDetail();
        $kategori->product_id = $id;
        $kategori->category_id = $request->category;
        $kategori->save();
    
        return redirect()->back();
    }

    public function deleteCategoryProduct($id){
        $c = ProductCategoryDetail::find($id);
        $c->delete();
        return redirect()->back();
    }
    
}
