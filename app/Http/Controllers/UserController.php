<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = User::findOrFail(Auth::id());
        return view('profil-user', compact('user'), [
            'title' => 'Profile',
            'active' => ' '
        ]);
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        return view('edit-profil', compact('user'), [
            'title' => 'Edit Profile',
            'active' => ' '
        ]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());
            $this->validate($request,[
                'foto' => 'image|file|max:2048',
            ]);
        $user->update($request->all());
        return view('edit-profil', compact('user'), [
            'title' => 'Profile',
            'active' => ' '
        ]);
    }
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
    public function logout(){
        Auth::logout();
        return redirect('/login');
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
            'foto' => $request->foto,
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

