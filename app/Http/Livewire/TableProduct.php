<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;


class TableProduct extends Component
{
    use WithPagination;
    public $searchProduct = '';

    public function render()
    {
        
        $products = Product::latest()->Where('product_name', 'like', '%'.$this->searchProduct.'%')->orWhere('id', 'like', '%'.$this->searchProduct.'%')->paginate(10);
        return view('livewire.table-product')->with(compact('products'));
    }
}
