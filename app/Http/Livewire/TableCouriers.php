<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courier;
use Livewire\WithPagination;
use illuminate\Pagination\Paginator;


class TableCouriers extends Component
{
    use WithPagination;
    public $searchProduct = '';

    public function render()
    {
        
        $products = Courier::latest()->Where('courier', 'like', '%'.$this->searchProduct.'%')->orWhere('id', 'like', '%'.$this->searchProduct.'%')->paginate(5);
        Paginator::useBootstrap();
        return view('livewire.table-couriers')->with(compact('products'));
    }
}
