<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // registrasi
    public function registration()
    {
        return view('auth.register', [
            'title' => 'Registrasi Akun'
        ]);
    }

    public function register(Request $request)
    {  
        $request->validate([
            'nip'      => 'required|unique:users',
            'nama'     => 'required',
            'email'    => 'required|email|unique:users',
            'roles'    => 'required',
            'password' => 'required|min:6',
        ]);
        
        $user = new User([
            'nip'      => $request->nip,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'roles'    => $request->roles,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
         
        return view("auth.login", [
            'title'  => 'Akun berhasil dibuat',
            'status' => 'success'
        ]);
    }
    
    // login
    public function index()
    {
        return view('auth.login', [
            'title'  => 'Log In',
            'status' => ''
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'nip'      => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('nip', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Signed in');
        }
  
        return redirect("login")->with('error', 'Login details are not valid');
    }

    // logout
    public function signOut() 
    {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }
    
    // profile
    public function show() 
    {
        $user = User::findOrFail(Auth::id());

        return view('profil-user', [
            'title'  => 'Profil User',
            'active' => ''
        ], 
        compact('user'));
    }

    public function edit() 
    {
        $user = User::findOrFail(Auth::id());

        return view('edit-profil', [
            'title'  => 'Profil User',
            'active' => ''
        ], 
        compact('user'));
    }

    public function update(Request $request, User $user, $id)
    {
        $this->validate($request,[
            'nip'   => 'required',
            'nama'  => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find($id);

        $user->update($request->all());

        return redirect()->route('profile')->with(['info','Data berhasil Di Update']);
    }

    public function changePassword(Request $request) 
    {
    #Validation
        $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed',
        ]);

    #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

    #Update the new Password
        User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}

