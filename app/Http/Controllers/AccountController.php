<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AccountController extends Controller
{


    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini
    

        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user) {

        abort_if(Gate::denies('admin-only'), 403);

        $users = User::where([
            ['nama', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('nama', 'LIKE', '%' . $s . '%')
                        ->orWhere('email', 'LIKE', '%' . $s . '%')
                        ->orWhere('role', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->simplePaginate(7);

        $created_at = Carbon::parse($user->created_at)->translatedFormat('d F Y');

        if($user) {
            return view('admin.account.index', [
                'title'     => 'Manajemen Akun SIMS',
                'active'    => '',
                'status'    => '',
                'users'      => $users,
                'created_at' => $created_at
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

        abort_if(Gate::denies('admin-only'), 403);

        $prevPageURL = URL::previous();

        return view('admin.account.create', [
            'title' => 'Tambah Akun',
            'active' => 'admin',
            'prevPage' => $prevPageURL,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        $request->validate([
            'nip'      => 'required|unique:users|min:9|max:18',
            'nama'     => 'required',
            'email'    => 'required|email|unique:users',
            'no_telp'  => 'unique:users',
            'role'     => 'required',
            'is_admin' => 'required',
            'password' => 'required|min:6',
        ]);
        
        $user = new User([
            'nip'      => $request->nip,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_telp'  => $request->no_telp,
            'role'     => $request->role,
            'is_admin' => $request->is_admin,
            'password' => Hash::make($request->password),
            'token'    => Str::random(40),
        ]);

        $user->save();
         
        return redirect()->route('account.index')->with('success','Akun berhasil dibuat');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        abort_if(Gate::denies('admin-only'), 403);

        $user = User::findOrFail($id);

        $current_year = Carbon::now()->year;

        $usercount = User::all()->count();

        $admincount = User::where('is_admin', 1)->count();

        $userHistory = Http::get("{$this->api_url}/history/$user->nama/all?limit=5&year=$current_year");

        return view('admin.account.show', [
            'title'   => 'Detail Akun',
            'active'  => '',
            'user'    => $user,
            'usercount' => $usercount,
            'admincount' => $admincount,
            'history' => json_decode($userHistory)->rows
        ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        abort_if(Gate::denies('admin-only'), 403);

        $user = User::find($id);

        $prevPageURL = URL::previous();

        return view('admin.account.edit', [
            'title'    => 'Edit Akun',
            'active'   => 'admin',
            'user'     => $user,
            'prevPage' => $prevPageURL,
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

        abort_if(Gate::denies('admin-only'), 403);

        $this->validate($request,[
            'nip'      => 'required|min:9|max:18',
            'nama'     => 'required',
            'email'    => 'required|email',
            'is_admin' => 'required'
        ]);

        $user = User::find($id);

        $user->update($request->all());

        return redirect()->route('account.index')->with('success','Akun berhasil diperbarui!');

    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        abort_if(Gate::denies('admin-only'), 403);

        $user = User::find($id);

        $user->delete();

        return redirect()->route('account.index')->with('success','Akun berhasil dihapus');

    }
}
 