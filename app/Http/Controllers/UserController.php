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
            'role'    => 'required',
            'password' => 'required|min:6',
        ],[
            'nip.required'      => 'NIP field is required.',
            'nama.required'     => 'Nama field is required.',
            'email.required'    => 'Email field is required.',
            'email.email'       => 'Email field must be a valid email address.',
            'password.required' => 'Password field is required.',
            'password.min'      => 'Password should be minimum of 6 character.',
        ]);
        
        $user = new User([
            'nip'      => $request->nip,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'role'    => $request->role,
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
            'password' => 'required|min:6',
        ],[
            'nip.required'      => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'password.min'      => 'Password should be minimum of 6 character.'
        ]);
   
        $credentials = $request->only('nip', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Signed In');
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

        return view('auth.edit-profil', [
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
            'email' => 'required|email|unique:users'
        ],[
            'nip.required'      => 'NIP field is required.',
            'nama.required'     => 'Nama field is required.',
            'email.required'    => 'Email field is required.',
            'email.email'       => 'Email field must be a valid email address.'
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

          /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgot-password', [
            'title' => 'Forgot Password',
            'status' => ''
         ]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('auth.email.forget-password', ['token' => $token, 'title' => 'Email'], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return view("auth.forgot-password", [
            'title'  => 'Email Sent',
            'status' => 'message'
        ]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.reset-password', [
            'token' => $token,
            'title' => 'Reset your password'
        ]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
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

