<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Cart;

class TableCart extends Component
{
    public $carts;
    public function render()
    {
        $user = Auth::user();
        $this->carts = Cart::with('product', 'product.product_images', 'product.discounts')->where([['user_id', '=', $user->id],['status','=', 'aktif']])->get();
        return view('livewire.table-cart');
    }
}
