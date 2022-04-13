<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Product;

class CouriersController extends Controller
{
    public function index(){
        return view('admin.couriers.index');
    }

    public function addCouriers(){
        return view('admin.couriers.add');
    }

    public function editCouriers($id){
        
        $courier = Courier::find($id);
        return view('admin.couriers.edit',compact('courier'));
    }

    public function detailCouriers($id){
        $product = Product::all();
        $couriers = Courier::find($id);
        return view('admin.couriers.detail',compact('product','couriers'));
    }

    public function saveEditCouriers(Request $request, $id){
        $request->validate([
            "couriers" => "required",
        ]);
        
        $kurir= Courier::find($id);
        $kurir->courier = $request->couriers;
        $kurir->update();

        return redirect('admin/couriers');
    }

    public function deleteCouriers($id){
        $product = Courier::find($id);
        $product->delete();
        return redirect('admin/couriers');
    }

    public function saveCouriers(Request $request){
        $request->validate([
            "couriers" => "required",
        ]);
        
        $kurir= new Courier();
        $kurir->courier = $request->couriers;
        $kurir->save();

        return redirect('admin/couriers');
    }
}
