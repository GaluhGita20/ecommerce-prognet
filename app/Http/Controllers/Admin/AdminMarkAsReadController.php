<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminNontification;

class AdminMarkAsReadController extends Controller
{
    //
    public function markNotification(Request $request)
    {
        auth()->guard('admin')->user()
            ->whereNull('read_at')
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
