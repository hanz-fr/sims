<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $tatausaha = User::where('role',1)->count();
        $kesiswaan = User::where('role',2)->count();
        $kurikulum = User::where('role',3)->count();
        $walikelas = User::where('role',4)->count();
        $admin = Admin::all()->count();

        $user = User::all();

        return view('admin.account.manage-user', [
            'title'     => 'Manage User SIMS',
            'active'    => 'account',
            'user'      => $user,
            'admin'     => $admin,
            'tatausaha' => $tatausaha,
            'kesiswaan' => $kesiswaan,
            'kurikulum' => $kurikulum,
            'walikelas' => $walikelas
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

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
    public function store(Request $request) {

        $request->validate([
            'nip'      => 'required|unique:users|min:9|max:18',
            'nama'     => 'required',
            'no_telp'  => 'required|max:20',
            'email'    => 'required|email|unique:users',
            'role'     => 'required',
            'password' => 'required|min:6',
        ]);
        
        $user = new User([
            'nip'      => $request->nip,
            'nama'     => $request->nama,
            'no_telp'  => $request->no_telp,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
         
        return redirect()->route('account.index')->with('success','Account created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $user = User::find($id);

        return view('admin.account.show-detail', [
            'title' => 'Account Details',
            'active' => 'account',
            'user' => $user
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.account.edit', [
            'title' => 'Edit Account',
            'active' => 'manage-user',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $this->validate($request,[
            'nip'   => 'required|min:9|max:18',
            'nama'  => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find($id);

        $user->update($request->all());

        return redirect()->route('account.index')->with('success','Account has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $user = User::find($id);

        $user->delete();

        return redirect()->route('account.index')->with('success','Account has been deleted successfully');

    }

    public function destroyAll() {

        User::truncate(); 

        return redirect()->route('account.index')->with('success','All account has been deleted successfully');
    }
}
 