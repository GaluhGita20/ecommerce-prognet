<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class ChartPenjualan extends Component
{
    public $trxs=[];
    public $input_thn =22;
    public function render()
    {
        $this->trxs = Transaction::with('user', 'transaction_details', 'transaction_details.product', 'transaction_details.product.product_images')->where([['status','!=', 'unverified'],['status','!=', 'expired'], ['status', '!=', 'cancelled']])->get();
        return view('livewire.chart-penjualan');
    }
}
