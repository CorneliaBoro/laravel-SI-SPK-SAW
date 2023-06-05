<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view ("auth/index");
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password, 
        ];

        if(Auth::attempt($infologin)){  //kalau sukses
            return ('berhasil');
            // return redirect('welcome')->with('success', 'Berhasil login');
        }else{
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak sesuai');
        }
    }
}
