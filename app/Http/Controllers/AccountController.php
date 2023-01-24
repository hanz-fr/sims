<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $user = User::where([
            ['nama', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('nama', 'LIKE', '%' . $s . '%')
                        ->orWhere('email', 'LIKE', '%' . $s . '%')
                        ->orWhere('role', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->cursorPaginate(7);

        if($user) {
            return view('admin.account.manage-user', [
                'title'     => 'Manage User SIMS',
                'active'    => '',
                'status'    => '',
                'user'      => $user,
            ]);
        } else {
            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'Data Induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('admin.account.create', [
            'title' => 'Create Account',
            'active' => 'admin'
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
            'email'    => 'required|email|unique:users',
            // 'no_telp'  => 'unique:users|min:10|max:16',
            'role'     => 'required',
            'password' => 'required|min:6',
        ]);
        
        $user = new User([
            'nip'      => $request->nip,
            'nama'     => $request->nama,
            'email'    => $request->email,
            // 'no_telp'  => $request->no_telp,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
            'token'    => Str::random(40),
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
            'active' => 'admin',
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
            'active' => 'admin',
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
            'nip'      => 'required|min:9|max:18',
            'nama'     => 'required',
            'email'    => 'required|email',
            // 'no_telp'  => 'unique:users|min:10|max:16'
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
}
 