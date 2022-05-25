<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShopProductDetail extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.shop-product-detail');
    }
}
