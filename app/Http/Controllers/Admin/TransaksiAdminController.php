<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserNotifications;
use App\Notifications\AdminNotifications;
use App\Models\User;
use App\Models\Admin;
use Auth;



class TransaksiAdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.transaksi.index');
    }

    public function detail($id)
    {
        $trx = Transaction::with('user', 'transaction_details', 'transaction_details.product', 'transaction_details.product.product_images')->where('id','=',$id)->first();
        return view('admin.transaksi.detail')->with(compact('trx'));
    }

    public function trx_verifikasi($id)
    {
        $trx = Transaction::with('user', 'transaction_details', 'transaction_details.product', 'transaction_details.product.product_images')->where('id','=',$id)->first();
        $trx->update([
            'status' => "verified"
        ]);

        //update stock
        $temp_i = 0;
        $temp_nama = "";
        foreach($trx->transaction_details as $dd){
            $product = Product::find($dd->product->id);
            $temp = $product->stock;
            $product->update([
                'stock' => $temp - $dd->qty
            ]);
            if($temp_i == 0){
                $temp_nama = $product->product_name; 
                $temp_i = 1;
            }
            
        }

        $user = User::find($trx->user_id);
        Notification::send($user, new UserNotifications('transaksi', 'admin', 'pembayaran transaksi '. $temp_nama . ' telah diverifikasi!'));

        return back();
    }

    public function trx_delivery($id)
    {
        $trx = Transaction::with('user', 'transaction_details', 'transaction_details.product', 'transaction_details.product.product_images')->where('id','=',$id)->first();
        $trx->update([
            'status' => "delivered"
        ]);
        $temp_i = 0;
        $temp_nama = "";
        foreach($trx->transaction_details as $dd){
            $product = Product::find($dd->product->id);
            if($temp_i == 0){
                $temp_nama = $product->product_name; 
                $temp_i = 1;
            }
            
        }

        $user = User::find($trx->user_id);
        Notification::send($user, new UserNotifications('transaksi', 'admin', 'pemesanan transaksi ' . $temp_nama . ' telah dikirim ke alamat Anda!'));
        return back();
    }

    public function trx_success($id)
    {
        $trx = Transaction::with('user', 'transaction_details', 'transaction_details.product', 'transaction_details.product.product_images')->where('id','=',$id)->first();
        $trx->update([
            'status' => "success"
        ]);

        //create review
        $temp_nama = "";
        $temp_i = 0;
        foreach($trx->transaction_details as $dd){
            $product = Product::find($dd->product->id);
            ProductReview::create([
                'product_id' => $product->id,
                'user_id' => $trx->user->id,
                'transaction_id' => $trx->id,
                'rate' => NULL,
                'content' => NULL,
                'is_finish' =>0
            ]);
            if($temp_i == 0){
                $temp_nama = $product->product_name; 
                $temp_i = 1;
            }
        }
        $admin = Admin::find(1);
        Notification::send($admin, new AdminNotifications('transaksi', 'admin', 'Transaksi ' . $temp_nama . ' telah diterima oleh user!'));

        return back();
    }
}


