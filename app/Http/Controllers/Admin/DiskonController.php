<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;

class DiskonController extends Controller
{
    //
    public function index(){
        return view('admin.diskon.index');
    }

    public function addDiskon(){
        $product = Product::all();
        return view('admin.diskon.add',compact('product'));
    }

    public function editDiskon($id){
        $product = Product::all();
        $diskon = Discount::find($id);
        return view('admin.diskon.edit')->with(compact('product','diskon'));
    }

    public function detailDiskon($id){
        $product = Product::all();
        $diskon = Discount::find($id);
        return view('admin.diskon.detail',compact('product','diskon'));
    }

    public function saveEditDiskon(Request $request, $id){
        $request->validate([
            "product" => "required",
            "persen" => "required",
            "start" => "required",
            "end" => "required",
        ]);
        

        $category= Discount::find($id);
        $category->product_id = $request->product;
        $category->percentage = $request->persen;
        $category->start = $request->start;
        $category->end = $request->end;
        $category->update();

        return redirect('admin/diskon');
    }
    public function deleteDiskon($id){
        $product = Discount::find($id);
        $product->delete();
        return view('admin.diskon.index');
    }


    public function saveDiskon(Request $request){
        $request->validate([
            "product" => "required",
            "persen" => "required",
            "start" => "required",
            "end" => "required",
        ]);
        

        $category= new Discount();
        $category->product_id = $request->product;
        $category->percentage = $request->persen;
        $category->start = $request->start;
        $category->end = $request->end;
        $category->save();

        return redirect('admin/diskon');
    }
}
