<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Respond;
use Auth;

class HomeAdminController extends Controller
{
    //
    public function index(){
        $trxs = Transaction::with('user', 'transaction_details', 'transaction_details.product', 'transaction_details.product.product_images')->where([['status','!=', 'unverified'],['status','!=', 'expired'], ['status', '!=', 'cancelled']])->get();
        $users = User::where('status', '=', 'aktif')->get();
        $products = Product::all();
        // $respond = Respond::with('product_review', 'product_review.user')->get();
        // return $respond;
        // $notifications = auth()->guard('admin')->user()->notifications->whereNull('read_at');
        // $admin = auth()->guard('admin')->user();
        // return $notifications;
        return view('admin.home')->with(compact('trxs', 'users', 'products'));
    }
}
