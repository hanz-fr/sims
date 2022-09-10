<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login-main');
    }
    public function registeruser(Request $request){
        dd($request->all());
    }
}
