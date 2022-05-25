<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Admin;

class ManagementAdminController extends Controller
{
    //
    public function index(){
        return view('admin.admin.index');
    }

    public function addAdmin(){
        return view('admin.admin.add');
    }

    public function editAdmin($id){
        $admin = Admin::find($id);
        return view('admin.admin.edit',compact('admin'));
    }

    public function detailAdmin($id){
        $product = Product::with(['product_images', 'product_category_details'])->where('id','=',$id)->get()->first();
        $categories = ProductCategory::all();
        return view('admin.product.detail')->with(compact('product', 'categories'));
    }

    public function deleteAdmin($id){
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admin.managementAdmin.index')->with('success', 'Data admin '. $admin->name . ' berhasil didelete!');
    }

    public function saveAdmin(Request $request){
       
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:admins,email',
            'password'=>'required',
            'role'=>'required',
        ]);
        

        $data = new Admin();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->role = $request->role;
        $data->save();


        return redirect()->route('admin.managementAdmin.index')->with('success', 'Data admin '. $data->name . ' berhasil ditambahkan!');
    }

    public function saveEditAdmin(Request $request,$id){
       
        $request->validate([
            'name'=>'required',
            'role'=>'required',
        ]);
        
        $data= Admin::find($id);
        $data->name = $request->name;
        $data->role = $request->role;
        $data->update();


        return redirect()->route('admin.managementAdmin.index')->with('success', 'Data admin '. $data->name . ' berhasil diedit!');
    }
}
