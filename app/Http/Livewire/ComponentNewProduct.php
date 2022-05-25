<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ComponentNewProduct extends Component
{
    public $products;
    public function render()
    {
        $this->products = Product::orderBy('id', 'desc')->limit(7)->get();
        return view('livewire.component.component-new-product');
    }
}
