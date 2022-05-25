<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin;
use Livewire\WithPagination;
use illuminate\Pagination\Paginator;

class TableAdmin extends Component
{
    use WithPagination;
    public $searchProduct = '';
    public function render()
    {
        $admins = Admin::latest()->Where('name', 'like', '%'.$this->searchProduct.'%')->orWhere('id', 'like', '%'.$this->searchProduct.'%')->paginate(5);
        Paginator::useBootstrap();
        return view('livewire.table-admin')->with(compact('admins'));
    }
}
