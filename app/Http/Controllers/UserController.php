<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        return view('register', [
            'title' => 'Registration'
        ]);
    }
    public function login(){
        return view('login-main', [
            'title' => 'Login'
        ]);
    }
    public function registersc(){
        return view('register-sc', [
            'title' => 'Registration Success'
        ]);
    }

    public function registeruser(Request $request){
        User::create([ 
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'nip' => $request->nip,
            'roles' => $request->roles,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);

        return redirect('/register-success');
    }

    public function loginuser(Request $request){
        if(Auth::attempt($request->only('nip','password'))){
            return redirect('/');
        }

        return redirect('/login');
    }
}

