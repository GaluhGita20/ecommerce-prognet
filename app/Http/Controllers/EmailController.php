<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function kirim(){
        return new Email();
    }
}
