<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\ProductCategory;
use App\Models\Product;

class ShopProductGeneral extends Component
{

    // use WithPagination;
    public $jmlh_product;


    public function render()
    {
        $categories = ProductCategory::all();
        $this->jmlh_product = Product::all();
        $products = Product::with('product_images', 'product_category_details', 'discounts')->orderby('id', 'desc')->paginate(9);
        return view('livewire.shop-product-general')->with(compact('products', 'categories'));
    }
}
