<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Respond;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;

class AdminRespondController extends Controller
{
    //
    public function index(){
        return view('admin.respond.index');
    }

    public function detail($id){
        $respond = Respond::with('product_review')->where('id', $id)->first();
        return view('admin.respond.detail')->with(compact('respond'));
    }
}
