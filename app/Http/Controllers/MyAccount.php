<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Storage;


class MyAccount extends Controller
{
    public function index(){

        $user = Auth::user();
        return view('user.myaccount')->with(compact('user'));
    }

    public function update_profil(Request $request){

        $request->validate([
            "name" => "required",
            "no_telp" => "required",
            "alamat" => "required",
        ]);

        $user = Auth::user();
        $user_profile = User::find($user->id);
        $user_profile->update([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return back()->with('success', 'Data profile berhasil diupdate!');
    }

    public function update_profil_photo(Request $request){

        $request->validate([
            "gambar" => "required",
        ]);

        $user = Auth::user();
        $user_profile = User::find($user->id);

        if(!is_null($user_profile->profile_image) || $user_profile->profile_image != ""){
            Storage::disk('asset')->delete('asset/users/'.$user->id.'/'.$user_profile->profile_image);
        }

        $fileName = $request->gambar->getClientOriginalName();
        $file = $request->file('gambar');
        Storage::disk('asset')->put('asset/users/'.$user->id.'/'.$fileName, file_get_contents($file));

        $user_profile->update([
            'profile_image' => $request->gambar->getClientOriginalName(),
        ]);



        return back()->with('success', 'Data photo profile berhasil diupdate!');
    }
}
