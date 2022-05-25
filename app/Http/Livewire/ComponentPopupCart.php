<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Discount;
use Auth;

class ComponentPopupCart extends Component
{
    public $jmlh_cart=0;
    public $total_tagihan=0;
    public $total_item=0;
    public $total_qty=0;
    public $total_weight=0;
    public $carts = [];

    protected $listeners = [
        'refresh-me' => '$refresh'
    ];

    public function mount(){
        if(!Auth::guest()){
            $user = Auth::user();
            $this->carts = Cart::with('product', 'product.product_images', 'product.discounts')->where([['user_id', '=', $user->id],['status','=', 'aktif']])->get();
        }else{

        }
        
    }
    
    public function render()
    {
        if(Auth::guest()){
            $this->jmlh_cart=0;
        }else{   
            $this->jmlh_cart = count($this->carts);
            if($this->jmlh_cart == 0){             
                $this->total_tagihan = 0;
                $this->total_item = 0;
                $this->total_qty = 0;
                $this->total_weight = 0;
            }else{
                foreach($this->carts as $dd){
                    $discount_product = Discount::where([['product_id','=', $dd->product->id],['status_aktif', '=',0]])->orderBy('id', 'desc')->limit(1)->first();
                    if(!is_null($discount_product)){
                        $temp_diskon = $discount_product->percentage/100;
                    }else{
                        $temp_diskon=0;
                    }                   
                    // $test = 0;
                    // $harga_jual_produk = 0;
                    // foreach($dd->product->discounts->latest() as $diskon){
                    //     if($test==0 && $diskon->status_aktif == 0){
                    //         $temp_diskon = $dd->percentage/100;
                    //         $test=1;
                    //     }
                    // }
                    $harga_jual_produk = $dd->product->price - ($dd->product->price*$temp_diskon);
                    $this->total_tagihan = $this->total_tagihan + ($dd->qty*$harga_jual_produk);
                    $this->total_item = $this->total_item + 1;
                    $this->total_qty = $this->total_qty + $dd->qty;
                    $this->total_weight = $this->total_weight + ($dd->product->weight*$dd->qty);
                }
            }
            
            
        }
        
        
        return view('livewire.component.component-popup-cart');
    }

    // public function deleteCart($id){
    //     $this->carts->find($id)->delete();
    //     $user = Auth::user();
    //     $this->carts = $this->carts = Cart::with('product', 'product.product_images')->where([['user_id', '=', $user->id],['status','=', 'aktif']])->get();
    //     return back();
    // }

}
