<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login', [
            'title'  => 'SIMS Admin',
            'status' => ''
        ]);
    }

    public function authenticate(Request $request)
    {

        $request->validate([
            'email'      => 'required',
            'password'   => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->with('success', 'Signed in');
        }
  
        return redirect("admin")->with('error','Login details are not valid');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAccount()
    {
        return view('admin.account.create', [
            'title' => 'Create Account',
            'active' => 'account'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAccount(Request $request)
    {
        $request->validate([
            'nip'      => 'required|unique:users|min:7',
            'nama'     => 'required',
            'email'    => 'required|email|unique:users',
            'role'    => 'required',
            'password' => 'required|min:6',
        ]);
        
        $user = new User([
            'nip'      => $request->nip,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'role'    => $request->role,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
         
        return route("manage.user")->with('success', 'Account created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $tatausaha = User::where('role',1)->count();
        $user = User::all();
        return view('admin.account.manage-user', [
            'title' => 'Manage User SIMS',
            'active' => 'account'
        ],
        compact('user'));
    }

    public function showDetail($id)
    {
        $user = User::find($id);

        return view('admin.account.show-detail', [
            'title' => 'Account Details',
            'active' => 'account'
        ],
        compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAccount(User $user, $id)
    {
        $user = User::find($id);

        return view('admin.account.edit', [
            'title' => 'Edit Account',
            'active' => 'manage-user'
        ],
        compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAccount(Request $request, $id)
    {
        $this->validate($request,[
            'nip'   => 'required|min:7',
            'nama'  => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user = User::find($id);

        $user->update($request->all());

        return redirect()->route('manage.user')->with('success','Account has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAccount($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('manage.user')->with('success','Account has been deleted successfully');
    }
}
