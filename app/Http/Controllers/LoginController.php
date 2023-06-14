<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        if(Auth::user()){
            // if($user -> role == 'admin'){
            //     return redirect()->intended('beranda');
            // }else{
            //     return redirect()->intended('superior');
            // }
            return redirect()->intended('homes');
        }
        return view('login.view_login');
    }

    public function process(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
[
        'username.required' => 'username tidak boleh kosong'

        ],
    );

    $kredensial = $request->only('username','password');

    if(Auth::attempt($kredensial)){
        $request->session()->regenerate();
        $user = Auth::user();
        // if($user->role == 'admin'){
        //     return redirect()->intended('beranda');
        // }else{
        //     return redirect()->intended('superior');
        // }

        if($user){
            return redirect()->intended('home');
        }
        return redirect()->intended('/');
    }

        return back()->withErrors([
            'username' => 'maaf username atau password anda salah'
        ])->onlyInput('username');

    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
