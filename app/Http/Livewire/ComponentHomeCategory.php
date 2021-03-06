<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;

class ComponentHomeCategory extends Component
{
    public function render()
    {
        $categories = ProductCategory::with('product_category_details')->orderBy('id', 'desc')->limit(10)->get();
        return view('livewire.component.component-home-category', compact('categories'));
    }
}
