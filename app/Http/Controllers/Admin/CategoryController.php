<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function index(){
        return view('admin.category.index');
    }

    public function addCategory(){
        return view('admin.category.add');
    }

    public function editCategory($id){
        
        $category = ProductCategory::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function detailCategory($id){
        $product = Product::all();
        $category = ProductCategory::find($id);
        return view('admin.category.detail',compact('product','category'));
    }

    public function saveEditCategory(Request $request, $id){
        $request->validate([
            "category" => "required",
        ]);
        
        $kategori= ProductCategory::find($id);
        $kategori->category_name = $request->category;
        $kategori->update();

        return redirect('admin/category');
    }

    public function deleteCategory($id){
        $product = ProductCategory::find($id);
        $product->delete();
        return redirect('admin/category');
    }

    public function saveCategory(Request $request){
        
        $request->validate([
            "category" => "required",
            "gambar" =>"required",
        ]);
        $fileName = $request->gambar->getClientOriginalName();
        $file = $request->file('gambar');
        Storage::disk('asset')->put('asset/kategori/'.$fileName, file_get_contents($file));

        $kategori= new ProductCategory();
        $kategori->category_name = $request->category;
        $kategori->gambar = $request->gambar->getClientOriginalName();
        $kategori->save();

        return redirect('admin/category');
    }
}
