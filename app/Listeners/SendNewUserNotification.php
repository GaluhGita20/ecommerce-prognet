<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\UserNotification;
use App\Models\Admin;
use Illuminate\Support\Facades\Notification;

class SendNewUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        $admins = Admin::where('id', 1)->get();

        Notification::send($admins, new AdminNotification('acc register', 'admin', "gita melakukan registrasi akun"));
    }
}
