<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ComponentHomeTopProduct extends Component
{
    public $namaproduk;
    public $gambarproduk;
    public $hargaproduk;
    public $desc;
    public $ids;
    public $action;

    // protected $listeners = ['some-event' => '$refresh'];

    public function detail($id){
        $this->ids = $id;

    }

    public function render()
    {
        $products = Product::with('product_images', 'product_category_details', 'discounts')->get();
        return view('livewire.component.component-home-top-product')->with(compact('products'));
    }


}
