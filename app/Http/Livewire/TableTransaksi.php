<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;

class TableTransaksi extends Component
{
    use WithPagination;
    public $searchProduct = 'unverified';

    public function render()
    {
        if($this->searchProduct == "all"){
            $trxs = Transaction::with('user')->latest()->paginate(10);
        }else{
            $trxs = Transaction::with('user')->where('status','=', $this->searchProduct)->latest()->paginate(10);

        }
        return view('livewire.table-transaksi')->with(compact('trxs'));
    }
}
