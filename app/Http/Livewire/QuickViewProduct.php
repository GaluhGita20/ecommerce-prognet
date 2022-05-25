<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuickViewProduct extends Component
{
    public $inputRate;
    public function render()
    {
        return view('livewire.component.quick-view-product');
    }
}
