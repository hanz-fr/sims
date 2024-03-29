<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AccountController extends Controller
{


    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = 'https://sims-api.vercel.app'; // Ganti link NGROK disini
    

        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user) {

        abort_if(Gate::denies('admin-only'), 403);

        $users = DB::table('user_data')->where([
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

        if($user) {
            return view('admin.account.index', [
                'title'      => 'Manajemen Akun SIMS',
                'active'     => 'admin-dashboard',
                'status'     => '',
                'users'      => $users,
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
            'active' => 'admin-dashboard',
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

        try {

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

        } catch (ValidationException $e) {

            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception) {

            return redirect()->back()->with('warning', 'Terjadi kesalahan, periksa kembali inputan anda atau coba lagi beberapa saat')->withInput();
        }

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
        $kelas_walkel = '';
        $current_year = Carbon::now()->year;
        $usercount = User::all()->count();
        $admincount = User::where('is_admin', 1)->count();
        $userHistory = Http::get("{$this->api_url}/history/$user->nama/all?limit=5&year=$current_year");

        /* Check if there's kelas with currently viewed walikelas */
        if ($user->role == 4) {

            $response = json_decode(Http::get("{$this->api_url}/kelas/get-by-walkel/{$user->nip}"));

            if ($response->status == 'success') {

                $kelas_walkel = $response->kelas->id;

            } else {

                $kelas_walkel = '';

            }

        }

        return view('admin.account.show', [
            'title'   => 'Detail Akun',
            'active'  => 'admin-dashboard',
            'user'    => $user,
            'usercount' => $usercount,
            'kelas_walkel' => $kelas_walkel,
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
            'active'   => 'admin-dashboard',
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

        try {

            $this->validate($request,[
                'nip'      => 'required|min:9|max:18',
                'nama'     => 'required',
                'email'    => 'required|email',
                'is_admin' => 'required'
            ]);

            $user = User::find($id);

            $user->update($request->all());

            return redirect()->route('account.index')->with('success','Akun berhasil diperbarui!');
        
        } catch (ValidationException $e) {

            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception) {

            return redirect()->back()->with('warning', 'Terjadi kesalahan, periksa kembali inputan anda atau coba lagi beberapa saat')->withInput();
        }
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
 