<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Admin extends Controller
{
    //
    public function login(){
        return view('admin.auth.login');
    }

    public function proses_login(request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $check= $request->only('email','password');
        if(Auth::guard('admin')->attempt($check)){
            return redirect()->route('admin.home')->with('success','Login Success!');
        }else{
            return redirect()->back()->with('error','Login Failed!');
        }
    
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
