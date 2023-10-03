<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login()
    {
        return view('login');
    }

    function register()
    {
        return view('register');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username','password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended(route('home'))->with("success", "Login success");
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }
    
    function registerPost(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telepon' => 'required'
        ]);

        $data['nik'] = $request->nik;
        $data['nama'] = $request->nama;
        $data['username'] = $request->username; 
        $data['password'] = Hash::make($request->password);
        $data['telepon'] = $request->telepon;
        $user = User::create($data);
        if(!$user)
        {
            return redirect(route('register'))->with("error", "Register failed, try again.");
        }
        return redirect(route('login'))->with("success", "Register success, login to access the app");
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}