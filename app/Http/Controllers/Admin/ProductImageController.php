<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function addImageProduct($id, Request $request){

        $request->validate([
            "gambar" => "required",
        ]);

        $product = Product::find($id);

        $fileName = $request->gambar->getClientOriginalName();
        $file = $request->file('gambar');
        Storage::disk('asset')->put('asset/product/'.$product->id.'/'.$fileName, file_get_contents($file));

        $product_image= new ProductImage();
        $product_image->product_id = $product->id;
        $product_image->image_name = $request->gambar->getClientOriginalName();
        $product_image->save();
        return redirect()->back();
    }

    public function deleteImageProduct($id){

        $img = ProductImage::find($id);
        $product = Product::find($img->product_id);

        Storage::disk('asset')->delete('asset/product/'.$product->product_name.'/'.$img->image);

        // // dd($data);
        $img->delete();
        return redirect()->back();
    }
}
