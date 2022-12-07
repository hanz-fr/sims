<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    // registrasi
    public function registration() {
        
        return view('auth.register', [
            'title' => 'Registrasi Akun'
        ]);

    }


    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    public function register(Request $request) {

        $request->validate([
            'nip'      => 'required|unique:users|min:9|max:18',
            'nama'     => 'required',
            // 'phone'    => 'required|unique:users|max:20',
            'email'    => 'required|email|unique:users',
            'role'     => 'required',
            'password' => 'required|min:6',
        ]);
        
        $user = new User([
            'nip'      => $request->nip,
            'nama'     => $request->nama,
            // 'phone'    => $request->phone,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
         
        return view("auth.login", [
            'title'  => 'Akun berhasil dibuat',
            'status' => 'success'
        ]);

    }
    
    // show login form
    public function index() {

        return view('auth.login', [
            'title'  => 'Log In',
            'status' => ''
        ]);

    }

    public function authenticate(Request $request) {

        $request->validate([
            'nip'      => 'required|min:9|max:18',
            'password' => 'required|min:6',
        ]);

        $remember_me = $request->has('remember') ? true : false;
   
        $credentials = $request->only('nip', 'password');

        if (Auth::attempt($credentials, $remember_me)) {
            // $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Signed In');
        }

        if($request->get('remember')):
            Auth::setRememberDuration(43200); // equivalent to 1 month
        endif;
  
        return redirect("login")->with('error', 'Login details are not valid');
    }

    // logout
    public function signOut() {

        Auth::logout();
        
        Session::flush(); // delete session after logout

        return redirect('login');

    }


    // show profile
    public function show() {

        $user = User::findOrFail(Auth::id());

        $current_year = Carbon::now()->year;

        $userHistory = Http::get("{$this->api_url}/history/$user->nama/all?limit=5&year=$current_year");

        return view('auth.profil-user', [
            'title'  => 'Profil User',
            'active' => '',
            'history' => json_decode($userHistory)->rows,
        ], 
        compact('user'));

    }


    // edit profile
    public function edit() {

        $user = User::findOrFail(Auth::id());

        return view('auth.edit-profil', [
            'title'  => 'Profil User',
            'active' => ''
        ], 
        compact('user'));

    }


    // update profile
    public function update(Request $request, User $user, $id) {

        $this->validate($request,[
            'nip'   => 'required|min:9|max:18',
            'nama'  => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find($id);

        $user->update($request->all());

        return redirect()->route('profile')->with('success','Data berhasil Di Update');

    }


    // change password 
    public function changePassword(Request $request)  {
        
        $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed',
        'new_password_confirmation' => 'required|same:new_password'
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password changed successfully!');

    }


    // number verification form
    public function verifyAccount() {
        
    }


    // forget password
      public function showForgetPasswordForm() {

         return view('auth.forgot-password', [
            'title' => 'Forgot Password',
            'status' => ''
         ]);

      }
  

    public function submitForgetPasswordForm(Request $request) {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
  
        $token = Str::random(64);
  
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
  
        Mail::send('auth.email.forget-password', [
            'token' => $token, 
            'title' => 'Email'
        ], function($message) use($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
  
        return view("auth.forgot-password", [
            'title'  => 'Email Sent',
            'status' => 'message'
        ]);

      }


      public function showResetPasswordForm($token) { 

         return view('auth.reset-password', [
            'token' => $token,
            'title' => 'Reset your password'
        ]);

      }
  

      public function submitResetPasswordForm(Request $request) {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['password'] = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Password has been changed');
        }

        return redirect()->route('update.password')->with('failed', 'Failed! something went wrong');

    }

}

