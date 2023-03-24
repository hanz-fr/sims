<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{


    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = 'https://sims-api.vercel.app'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* View All Kelas */
    public function viewAllKelas(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        $search = $request->search;
        $sort_by = $request->sort_by;
        $sort = $request->sort;

        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/kelas?page={$page}&perPage={$perPage}&search={$search}&sort_by={$sort_by}&sort={$sort}");
        $total_kelas = json_decode(Http::get("{$this->api_url}/kelas"))->data->count;
        
        return view('admin.kelas.index', [
            'title'       => 'Data Semua Kelas',
            'active'      => 'admin-dashboard',
            'response'    => json_decode($response),
            'kelas'       => json_decode($response)->data->rows,
            'total'       => json_decode($response)->data->count,
            'total_kelas' => $total_kelas,
        ]);

    }


    /* View Detail Kelas */
    public function viewKelas(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        $id = $request->id;

        $response = json_decode(Http::get("{$this->api_url}/kelas/{$id}"));

        $walkel = User::where('nip', $response->result->walikelas)->first();

        if (!empty($walkel)) {

            $walkel = $walkel->nama;
        
        } else {
            
            $walkel = '';
        
        }

        return view('admin.kelas.show-detail', [
            'title'       => 'Detail Data Kelas',
            'active'      => 'admin-dashboard',
            'kelas'       => $response->result,
            'total_siswa' => $response->siswa,
            'walikelas' => $walkel,
        ]);

    }


    /* Create Kelas */
    public function createKelas(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        $jurusan = json_decode(Http::get("{$this->api_url}/jurusan?perPage=500"))->data->rows;

        $walikelas = User::where('role', 4)->get();

        return view('admin.kelas.create', [
            'title'   => 'Tambah Data Kelas',
            'active'  => 'admin-dashboard',
            'jurusan' => $jurusan,
            'walikelas' => $walikelas,
        ]);

    }


    /* Edit Kelas */
    public function editKelas($id) {

        abort_if(Gate::denies('admin-only'), 403);

        $jurusan = json_decode(Http::get("{$this->api_url}/jurusan?perPage=500"))->data->rows;

        $all_walikelas = User::where('role', 4)->get();

        $response = Http::get("{$this->api_url}/kelas/{$id}");

        $walikelas = DB::table('users')->where('nip', json_decode($response)->result->walikelas)->first();

        return view('admin.kelas.edit', [
            'title'   => 'Edit Data Kelas',
            'active'  => 'admin-dashboard',
            'kelas'   => json_decode($response)->result,
            'jurusan' => $jurusan,
            'all_walikelas' => $all_walikelas,
            'walikelas' => $walikelas,
        ]);

    }


    /* Store Kelas */
    public function storeKelas(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        $id = "{$request->kelas}{$request->jurusan}{$request->rombel}";

        $kelas_occupied = json_decode(Http::get("{$this->api_url}/kelas/get-by-walkel/{$request->walikelas}"));

        // check if there is kelas with inputed walikelas nip.
        if($kelas_occupied->status == 'success') {

            return redirect('/admin/kelas/create')->with('warning', 'Sudah ada kelas yang diajar dengan walikelas tersebut.');

        }

        $response = json_decode(Http::post("{$this->api_url}/kelas", [
            'kelas'     => $request->kelas,
            'rombel'    => $request->rombel,
            'jurusan'   => $request->jurusan,
            'JurusanId' => $request->JurusanId,
            'walikelas' => $request->walikelas
        ]));

        if($response->status === 'success') {

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [

                'activityName'   => 'Create Kelas',
                'activityAuthor' => "$user->nama",
                'activityDesc'   => "$user->nama membuat kelas dengan Id Kelas : $id"

            ]);

            return redirect('/admin/kelas')->with('success', 'Data berhasil ditambahkan.');

        } else if ($response->message === "kelas with Id : '{$id}' already exist") {

            return redirect('/admin/kelas/create')->with(['error' => 'Kelas dengan Id tersebut sudah terdaftar.']);

        } else {

            return redirect('/admin/kelas/create')->with(['error' => 'Terjadi kesalahan.']);

        }

    }


    /* Update Kelas */
    public function updateKelas(Request $request, $id) { 

        abort_if(Gate::denies('admin-only'), 403);


        // klo walikelas nya kosong, kasih null
        if ($request->walikelas == null) {

            $walikelas = null;

        } else {

            $kelas_occupied = json_decode(Http::get("{$this->api_url}/kelas/get-by-walkel/{$request->walikelas}"));
    
            // check if there is kelas with inputed walikelas nip.
            if($kelas_occupied->status == 'success') {
    
                return redirect("/admin/kelas/edit/$id")->with('warning', 'Sudah ada kelas yang diajar dengan walikelas tersebut.');
    
            }

            $walikelas = $request->walikelas;
        }

        $response = Http::put("{$this->api_url}/kelas/{$id}", [
            'kelas' => $request->kelas,
            'rombel' => $request->rombel,
            'jurusan' => $request->jurusan,
            'JurusanId' => $request->JurusanId,
            'walikelas' => $walikelas,
        ]);

        if (json_decode($response)->status === 'success') {

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [

                'activityName' => 'Update Kelas',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama memperbarui kelas dengan Id Kelas : $id"

            ]);

            return redirect('/admin/kelas?page=1&perPage=10')->with('success', 'Data berhasil diperbarui!');

        } else {

            return redirect("/admin/kelas/edit/{$id}")->with('warning', 'Terjadi Kesalahan');

        }

    }


    /* Delete Kelas */
    public function deleteKelas(Request $request, $id) {

        abort_if(Gate::denies('admin-only'), 403);
        
        $response = Http::delete("{$this->api_url}/kelas/{$id}");

        if (json_decode($response)->message == "Kelas with id '{$id}' does not exist") {

            return redirect('/admin/kelas')->with('warning', 'Data tidak terdaftar.');
            
        } else {

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [

                'activityName' => 'Delete Kelas',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama menghapus kelas dengan Id Kelas : $id"

            ]);

            return redirect('/admin/kelas')->with('success', 'Data berhasil dihapus.');

        }

    }

    
}
