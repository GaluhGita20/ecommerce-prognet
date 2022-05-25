<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\City;
use GuzzleHttp\Client;
use App\Models\Courier;
use App\Models\Cart;
use Auth;


class BillingDetails extends Component
{
    public $provinces;
    public $input_province;
    public $input_region;
    public $input_courier;
    public $input_service;
    public $regions;
    public $couriers;
    public $carts;
    public $shipping_cost=[];
    public $result=[];
    public $temp_biaya=0;
    public $temp_etd= "0";
    public $temp_shipping= "0";

    public $total_tagihan=0;
    public $sub_total_tagihan=0;
    public $total_item=0;
    public $total_qty=0;
    public $total_weight=0;

    public function render()
    {
        $url = 'https://api.rajaongkir.com/starter/cost';
        $client = new Client();
        $this->total_weight=0;

        //bagian detail product yg dicheckout
        $user = Auth::user();
        $this->carts = Cart::with('product', 'product.product_images', 'product.discounts')->where([['user_id', '=', $user->id],['status','=', 'aktif']])->get();
        $this->sub_total_tagihan = 0;
        foreach($this->carts as $dd){
            $temp = 0;
            $discount_product =[];
            $discount_product = $dd->product->discounts->where('status_aktif', '=',0)->last();
            if(!is_null($discount_product)){
                    $temp = $discount_product->percentage/100;
            $harga_jual_product = $dd->product->price - ($dd->product->price*$temp);

            }else{
                    $harga_jual_product = $dd->product->price;
            }
            $this->sub_total_tagihan = $this->sub_total_tagihan +($harga_jual_product*$dd->qty);
            $this->total_item = $this->total_item + 1;
            $this->total_qty = $this->total_qty + $dd->qty;
            $this->total_weight = $this->total_weight + ($dd->product->weight*$dd->qty);
        }
        //bagian pengiriman
        $this->provinces = Province::all();
        $this->couriers = Courier::all();
        if(!is_null($this->input_province)){
            $this->result = [];
            $temp = Province::where('title', '=', $this->input_province)->first();
            $this->regions = City::where('province_id', '=', $temp->id)->get();
            if(!is_null($this->input_region) && !is_null($this->input_courier)){
                $temp_regency = City::where('title','=', $this->input_region)->first();
                $temp_courier = Courier::find($this->input_courier);
                $getCost = $client->request('POST', $url, 
                    [
                        'headers' => [
                            'key' => 'c4267eb2dc0020aee5262bc61cdb044b',
                            'Content-Type' => 'application/x-www-form-urlencoded',
                        ],
                        'form_params' => [
                            'origin' => 114,
                            'destination' => $temp_regency->city_id,
                            'weight' => $this->total_weight,
                            'courier' => strtolower($temp_courier->courier),
                        ]
                    ]);
                $cost= json_decode($getCost->getBody(), true);
                $this->shipping_cost = $cost['rajaongkir']['results'][0]['costs'];
                foreach($this->shipping_cost as $row){
                    $this->result[]= array(
                        'description' => $row['description'],
                        'biaya' => $row['cost'][0]['value'],
                        'etd' => $row['cost'][0]['etd']
                    );
                }

                if(!is_null($this->input_service)){
                    foreach($this->result as $dd){
                        if($dd['description'] == $this->input_service){
                            $this->temp_biaya = $dd['biaya'];
                            $this->temp_etd = $dd['etd'];
                            $this->total_tagihan = $this->sub_total_tagihan+$this->temp_biaya;
                        }
                    }
                }
            }
        }

        return view('livewire.billing-details');
    }
}
