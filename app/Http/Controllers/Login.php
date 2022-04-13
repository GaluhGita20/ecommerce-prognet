<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class Login extends Controller
{
    //

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

   
   

    public function proses_register(request $request){
      
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'password_confirmation' => 'required_with:password|same:password'
        ]);

      
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->status = 'aktif';
        $data->save();

        if($data){
            return redirect()->back()->with('success','Register success, silahkan melakukan login terlebih dahulu!');

        }else{
            return redirect()->back()->with('error','Register Failed');
        }

        // event(new Registered($data));
    }

    public function proses_login(request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $check= $request->only('email','password');
        $data = User::where('email',$request->email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if($data->status== 'aktif'){
                if(Hash::check($request->password,$data->password)){
                    if(Auth::guard('web')->attempt($check)){
                        return redirect()->route('home')->with('success','Login Success');
                    }else{
                        return redirect()->back()->with('error','Login Failed!!!');
                    }
                }
                else{
                    return redirect('login')->with('error','Password Salah !');
                }
            }else{
                return redirect('login')->with('error','Akun telah dinonaktifkan, silahkan hubungi customer service!');
            }
            
        }
        else{
            return redirect('login')->with('error','Email belum terdaftar! Silahkan registrasi terlebih dahulu!');
        }
    
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
