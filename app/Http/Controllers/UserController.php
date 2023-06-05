<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $redirectTo = '/dashboard';
    
    public function index()
    {
        $data = User::all();
        return view('dashboard.DataUser.index', compact('data'));
    }
    
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register',$data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:user',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ],[
            'name.required' => 'Nama Wajib Diisi!',
            'username.required' => 'Username Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
            'password_confirmation.required' => 'Password Confirmation Wajib Diisi!',
        ]);
        
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user -> save();
         return redirect()->route('login')->with('success', 'Registrasi Berhasil. Silakan Login!');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login',$data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Username Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'password' => 'Password atau Username Salah!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function create()
    {
        return view('dashboard.DataUser.create');
    }

    public function store(Request $request)
    {
        Session::flash('nama', $request->name);
        Session::flash('username', $request->username);

        $request->validate([   
            'username'=>'required|unique:dataaslab',
            'nama'=>'required',
        ]);

        $data=[
            'nama'=>$request->name,
            'username'=>$request->username,
        ];
        User::create($data);

        return redirect()->route('datauser.index')->with('success', 'Berhasil Menambahkan Data');

    }
}
