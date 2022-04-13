<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Toko extends Controller
{
    //
    public function toko(){
        return view('user.home');
    }

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
}
