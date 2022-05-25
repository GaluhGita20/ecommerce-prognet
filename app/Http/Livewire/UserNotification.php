<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models;
use Auth;

class UserNotification extends Component
{
    public $user_notifikasi;

    public function render()
    {
        $this->user_notifikasi = Models\UserNotification::where('notifiable_id', '=', Auth::user()->id)->latest()->get();
        return view('livewire.user-notification');
    }
}
