<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyAccount extends Controller
{
    public function index(){
        return view('user.myaccount');
    }
}
