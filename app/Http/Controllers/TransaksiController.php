<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotifications;
use App\Models\Admin;
use App\Models\Respond;
use Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $trxs = Transaction::with('transaction_details', 'transaction_details.product')->where('user_id','=',$user->id)->latest()->get();

        return view('user.list-transaksi')->with(compact('trxs'));
    }

    public function checkout(){
        $user = Auth::user();
        $carts = Cart::with('product', 'product.product_images')->where([['user_id', '=', $user->id],['status','=', 'aktif']])->get();
        if($carts->count() == 0){
            return abort(404);
        }else{
            return view('user.checkout')->with(compact('carts'));
        }
    }

    public function checkout_confirm(Request $request){
        $request->validate([
            "address" => "required",
            "order_notes" => "required",
            "regency" => "required",
            "province" => "required",
            "postal_code" => "required",
            "total" => "required|numeric",
            "shipping_cost" => "required",
            "shipping_service" => "required",
            "shipping_etd" => "required",
            "courier_id" => "required",
            // 'products' => "required",
        ]);
        $date = Carbon::now('Asia/Makassar');
        
        $timeout = $date->addHours(24);
        $transaksi = Transaction::create([
            'timeout' => $timeout,
            'address' => $request->address,
            'order_notes' => $request->order_notes,
            'regency' => $request->regency,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
            'total' => $request->total,
            'shipping_cost' => $request->shipping_cost,
            'shipping_service' => $request->shipping_service,
            'shipping_etd' => $request->shipping_etd,
            'weight' => $request->weight,
            'user_id' => Auth::user()->id,
            'courier_id' => $request->courier_id,
            'proof_of_payment' => NULL,
            'status' => 'unverified',
            'is_review' =>0
        ]);
        $i=0;
        foreach($request->products as $product_id){
            $temp = 0;
            $dd = Product::with('discounts')->where('id','=',$product_id)->first();
            $discount_product =[];
            $discount_product = $dd->discounts->where('status_aktif', '=',0)->last();
            if(!is_null($discount_product)){
                    $temp = $discount_product->percentage/100;
                    $harga_jual_product = $dd->price - ($dd->price*$temp);

            }else{
                    $harga_jual_product = $dd->price;
            }
            $trx_detail = TransactionDetail::create([
                'transaction_id' => $transaksi->id,
                'product_id' => $dd->id,
                'qty' => $request->qty_carts[$i],
                'discount_id' => NULL,
                'selling_price' => $harga_jual_product
            ]);

            if(!is_null($discount_product)){
                $trx_detail->update([
                    'discount_id' => $discount_product->id,
                ]);
            }

            Cart::where('product_id', $product_id)->where('user_id', Auth::user()->id)->where('status', 'aktif')
                ->update([
                    'status' => 'check out'
                ]);
            $i = $i+1;
        }
        return redirect()->route('checkout.detail', $transaksi->id)->with('success', "Anda telah berhasil melakukan checkout untuk pesanan Anda! Silahkan melakukan pembayaran sebeluh batas terakhir waktu pembayaran!!!");
    }

    public function checkout_detail($id){
        $user = Auth::user();
        $carts = Transaction::with('transaction_details', 'transaction_details.product', 'product_reviews', 'product_reviews.product', 'product_reviews.product.product_images')->where('id','=',$id)->first();

        return view('user.finish-checkout')->with(compact('carts'));
        // return $carts;
    }

    public function upload_bukti_pembayaran($id, Request $request){
        $trx = Transaction::find($id);

        $fileName = time() . '-' . $request->gambar->getClientOriginalName();
        $file = $request->file('gambar');
        Storage::disk('asset')->put('asset/payment/'.$fileName, file_get_contents($file));

        $trx->update([
            'proof_of_payment' => $fileName,
        ]);

        $admin = Admin::find(1);
        Notification::send($admin, new AdminNotifications('transaksi', 'admin', 'Transaksi ' . $trx->id . ' telah mengupload bukti pembayaran. Menunggu verifikasi admin!'));
        
        return back();
    }

    public function checkout_cancelled($id){
        $trx = Transaction::find($id);
        $trx->update([
            'status' => "cancelled",
        ]);
        
        return back();
    }

    public function review_post($id, Request $request){
        $trx = ProductReview::find($id);
        $trx->update([
            'rate' => $request->stars,
            'content' => $request->content,
            'is_finish' => 1
        ]);

        $dd = Respond::create([
            'review_id' => $id,
            'admin_id' =>1,
            'content' => null,
            'is_finish' => 0, 
        ]);

        //update is_review transaksi
        $temps = ProductReview::where('transaction_id', '=', $trx->transaction_id)->get();
        $x = 0;
        foreach($temps as $temp){
            if($temp->is_finish == 0){
                $x=1;
            }
        }
        if($x == 0){
            $update_trx = Transaction::find($trx->transaction_id);
            $update_trx->update([
                'is_review' => 1
            ]);
        }

        //update rating product
        $product= Product::find($trx->product_id);
        $temp_rate = $product->product_rate;
        $product->update([
            'product_rate' => ($temp_rate+$request->stars)/2,
        ]);

        $admin = Admin::find(1);
        Notification::send($admin, new AdminNotifications('transaksi', 'admin', 'User melakukan review product ' . $product->product_name . '!'));
        
        return back();
    }


}
