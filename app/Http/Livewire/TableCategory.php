<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithPagination;
use illuminate\Pagination\Paginator;

class TableCategory extends Component
{
    // public function render()
    // {
    //     return view('livewire.table-category');
    // }

    use WithPagination;
    public $searchProduct = '';

    public function render()
    {
        
        $categories = ProductCategory::latest()->Where('category_name', 'like', '%'.$this->searchProduct.'%')->orWhere('id', 'like', '%'.$this->searchProduct.'%')->paginate(5);
        Paginator::useBootstrap();
        return view('livewire.table-category')->with(compact('categories'));
    }
}
