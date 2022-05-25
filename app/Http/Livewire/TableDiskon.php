<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Discount;
use Livewire\WithPagination;
use illuminate\Pagination\Paginator;

class TableDiskon extends Component
{
    use WithPagination;
    public $searchProduct = '';

    public function render()
    {
        $products = Discount::join('products', 'products.id','=','discounts.product_id')->Where('products.product_name', 'like', '%'.$this->searchProduct.'%')->select('products.product_name','discounts.*')->paginate(5);
        Paginator::useBootstrap();
        return view('livewire.table-diskon',compact('products'));
    }
}
