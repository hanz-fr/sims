<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KelasController extends Controller
{


    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* View All Kelas */
    public function viewAllKelas(Request $request) {

        $search = $request->search;
        $sort_by = $request->sort_by;
        $sort = $request->sort;

        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/kelas?page={$page}&perPage={$perPage}&search={$search}&sort_by={$sort_by}&sort={$sort}");
        $total_kelas = json_decode(Http::get("{$this->api_url}/kelas"))->data->count;
        
        return view('admin.kelas.index', [
            'title' => 'Data Semua Kelas',
            'active' => '',
            'response' => json_decode($response),
            'kelas' => json_decode($response)->data->rows,
            'total' => json_decode($response)->data->count,
            'total_kelas' => $total_kelas,
        ]);

    }


    /* View Detail Kelas */
    public function viewKelas(Request $request) {

        $id = $request->id;

        $response = Http::get("{$this->api_url}/kelas/{$id}");

        return view('admin.kelas.show-detail', [
            'title' => 'Detail Data Kelas',
            'active' => '',
            'kelas' => json_decode($response)->result,
        ]);

    }


    /* Create Kelas */
    public function createKelas(Request $request) {

        $jurusan = json_decode(Http::get("{$this->api_url}/jurusan"))->data->rows;

        return view('admin.kelas.create', [
            'title' => 'Tambah Data Kelas',
            'active' => '',
            'jurusan' => $jurusan,
        ]);

    }


    /* Edit Kelas */
    public function editKelas($id) {

        $jurusan = json_decode(Http::get("{$this->api_url}/jurusan"))->data->rows;

        $response = Http::get("{$this->api_url}/kelas/{$id}");

        return view('admin.kelas.edit', [
            'title' => 'Edit Data Kelas',
            'active' => '',
            'kelas' => json_decode($response)->result,
            'jurusan' => $jurusan
        ]);

    }


    /* Store Kelas */
    public function storeKelas(Request $request) {

        $id = "{$request->kelas}{$request->jurusan}{$request->rombel}";

        $response = json_decode(Http::post("{$this->api_url}/kelas", [
            'kelas' => $request->kelas,
            'rombel' => $request->rombel,
            'jurusan' => $request->jurusan,
            'JurusanId' => $request->JurusanId
        ]));

        if($response->status === 'success') {

            return redirect('/admin/kelas')->with('success', 'Data berhasil ditambahkan.');

        } else if ($response->message === "kelas with Id : '{$id}' already exist") {

            return redirect('/admin/kelas/create')->with(['error' => 'Kelas dengan Id tersebut sudah terdaftar.']);

        } else {

            return redirect('/admin/kelas/create')->with(['error' => 'Terjadi kesalahan.']);

        }

    }


    /* Update Kelas */
    public function updateKelas(Request $request, $id) { 

        $response = Http::put("{$this->api_url}/kelas/{$id}", [
            'kelas' => $request->kelas,
            'rombel' => $request->rombel,
            'jurusan' => $request->jurusan,
            'JurusanId' => $request->JurusanId,
        ]);

        $response->throw();

        if (json_decode($response)->message === "Successfully updated kelas with id : '{$id}'") {

            return redirect('/admin/kelas')->with('success', 'Data berhasil diperbarui!');

        } else {

            return redirect("/admin/kelas/edit/{$id}")->with('error', 'Terjadi Kesalahan');

        }

    }


    /* Delete Kelas */
    public function deleteKelas(Request $request, $id) {
        
        $response = Http::delete("{$this->api_url}/kelas/{$id}");

        if (json_decode($response)->message == "Kelas with id '{$id}' does not exist") {

            return redirect('/admin/kelas')->with('warning', 'Data tidak terdaftar.');
            
        } else {

            return redirect('/admin/kelas')->with('success', 'Data berhasil dihapus.');

        }

    }

    
}
