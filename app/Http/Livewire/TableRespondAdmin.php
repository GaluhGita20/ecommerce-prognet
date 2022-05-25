<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Respond;
use Illuminate\Pagination\LengthAwarePaginator;

class TableRespondAdmin extends Component
{
    // use WithPagination;
    public $searchProduct = "0";
    public function render()
    {
        if($this->searchProduct == "all"){
            $responds = Respond::with('product_review', 'product_review.user')->where('product_review.is_finish', '=', 1)->latest()->paginate(10);
        }else{
            $responds = Respond::with('product_review', 'product_review.user')->where([['is_finish', '=', $this->searchProduct]])->latest()->paginate(10);
        }
        return view('livewire.table-respond-admin')->with(compact('responds'));
    }
}
