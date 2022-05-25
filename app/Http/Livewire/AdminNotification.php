<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminNotification extends Component
{
    public function render()
    {
        $notifikasi= auth()->guard('admin')->user()->notifications->whereNull('read_at');
        return view('livewire.admin-notification', compact('notifikasi'));
    }
}
