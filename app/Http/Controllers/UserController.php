<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    // registrasi
    public function registration() {
    
        return view('auth.register', [
            'title' => 'Registrasi Akun',
            'status' => ''
        ]);

    }


    public function register(Request $request) {

        $request->validate([
            'nip'      => 'required|unique:users|min:9|max:18',
            'nama'     => 'required',
            'email'    => 'required|email|unique:users',
            'no_telp'  => 'unique:users|min:10|max:16',
            'role'     => 'required',
            'password' => 'required|min:6',
        ]);
        
        $user = User::create([
            'nip'      => $request->nip,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_telp'  => $request->no_telp,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
            'token'    => Str::random(40),
        ]);

        Mail::to($request->email)->send(new EmailVerification($user));

        return view('auth.register', [
            'title'  => 'Verifikasi akun anda',
            'status' => 'success',
            'user'   => $user
        ]);

    }


    public function sendVerifyAccount(Request $request, $id) {

        $user = User::where('id', $id)->first();

        $user->update([
            'token' => Str::random(40),
            'email' => $request->email
        ]);

        Mail::to($user->email)->send(new EmailVerification($user));

        return view('auth.edit-profil', [
            'title' => '',
            'active' => '',
            'status' => 'success', 
            'message' => 'Link baru sudah terkirim',
            'user' => $user
        ]);

    }


    public function verifyAccount($token) {
        
        $user = User::where('token', $token)->first();

        if (!$user){
            return redirect()->route('profile')->with('error', 'Invalid URL');
        } else {

            if ($user->email_verified_at) {
                return redirect()->route('profile')->with('error', 'Email sudah terverifikasi');
            } else {
                $user->update([
                    'email_verified_at' => Carbon::now()
                ]);

                return view('auth.profil-user', [
                    'title'  => 'Verifikasi akun anda',
                    'status' => 'success',
                    'user'   => $user,
                    'message'=> 'Verifikasi Akun Berhasil'
                ]);

            }

        }

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

            if (auth()->user()->is_admin == 1) {
                return redirect()->intended('/admin')->with('success', 'Signed In');
            }else{
                return redirect()->intended('/')->with('success', 'Signed In');
            }
        }

        if($request->get('remember')):
            Auth::setRememberDuration(43200); // equivalent to 1 month
        endif;
  
        return redirect("login")->with('error', 'Detail login tidak valid!');
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
            'active' => '',
            'status' => ''
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

        if ($user->email_verified_at) {
            $user->update(['email_verified_at' => null]);
        }

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
            return back()->with('error', 'Kata Sandi lama tidak cocok!');
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Kata Sandi berhasil diubah!');

    }


    // forget password
      public function showForgetPasswordForm() {

         return view('auth.forgot-password', [
            'title' => 'Lupa Kata Sandi',
            'status' => ''
         ]);

      }
  

    public function submitForgetPasswordForm(Request $request) {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $request->email)->first();
  
        if ($user->email_verified_at) {
            $token = Str::random(64);
    
            DB::table('password_resets')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
            ]);
    
            Mail::send('auth.email.forget-password', [
                'token' => $token, 
                'title' => 'Email',
            ], function($message) use($request) {
                $message->to($request->email);
                $message->subject('Atur Ulang Kata Sandi');
            });
    
            return view("auth.forgot-password", [
                'title'  => 'Email Sent',
                'status' => 'message'
            ]);
        } else {
            return redirect("login")->with('error', 'Email anda belum terverifikasi!');
        }

      }


      public function showResetPasswordForm($token) { 

        $user = DB::table('password_resets')->where('token', $token)->first();

         return view('auth.reset-password', [
            'user' => $user,
            'title' => 'Atur Ulang Kata Sandi'
        ]);

      }
  

      public function submitResetPasswordForm(Request $request) {

        $this->validate($request, [
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['password'] = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Password has been changed');
        }

        return redirect()->route('update.password')->with('error', 'Failed! something went wrong');

    }

}

