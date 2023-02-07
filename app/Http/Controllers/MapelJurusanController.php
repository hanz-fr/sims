<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class MapelJurusanController extends Controller
{
    

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* View All Mapel Jurusan */
    public function viewAllMapelJurusan(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        //-- search & sorting --//
        $search = $request->search;
        $sort_by = $request->sort_by;
        $sort = $request->sort;

        //-- pagination --//
        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/mapel-jurusan?page={$page}&perPage={$perPage}&search={$search}&sort_by={$sort_by}&sort={$sort}");
        $total_mapel_jurusan = json_decode(Http::get("{$this->api_url}/mapel-jurusan"))->data->count;

        if ($response->successful()) { 

            return view('admin.mapel-jurusan.mapel-jurusan', [
                'title' => 'Mata Pelajaran Jurusan',
                'active' => 'database',
                'response' =>  json_decode($response),
                'mapel_jurusan' => json_decode($response)->data->rows,
                'total' => json_decode($response)->data->count,
                'total_mapel_jurusan' => $total_mapel_jurusan,
            ]); 

        } else {

            return view('errors.404');

        }
    }


    /* View Detail Mapel Jurusan */
    public function viewDetailMapelJurusan(Request $request, $id) {

        abort_if(Gate::denies('admin-only'), 403);

        $response = Http::get("{$this->api_url}/mapel-jurusan/{$id}");

        if($response->successful()) {

            return view('admin.mapel-jurusan.detail-mapel-jurusan', [
                'title' => 'Mata Pelajaran Jurusan',
                'active' => 'database',
                'mapel_jurusan' => json_decode($response)->result,
            ]);

        } else {

            return view('errors.404');

        }

    }


    /* Create Mapel Jurusan */
    public function createMapelJurusan(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        $jurusan = Http::get("{$this->api_url}/jurusan?perPage=500");
        $mapel = Http::get("{$this->api_url}/mapel?perPage=500");

        return view('admin.mapel-jurusan.create-mapel-jurusan', [
            'title' => 'Create Mata Pelajaran',
            'active' => 'database',
            'jurusan' => json_decode($jurusan)->data->rows,
            'mapel' => json_decode($mapel)->data->rows,
        ]);

    }


    /* Edit Mapel Jurusan */
    public function editMapelJurusan(Request $request, $id) {

        abort_if(Gate::denies('admin-only'), 403);

        $response = Http::get("{$this->api_url}/mapel-jurusan/{$id}");
        $jurusan = Http::get("{$this->api_url}/jurusan?perPage=500");
        $mapel = Http::get("{$this->api_url}/mapel?perPage=500");

        return view('admin.mapel-jurusan.edit-mapel-jurusan', [
            'title' => 'Edit Mata Pelajaran',
            'active' => 'database',
            'mapelJurusan' => json_decode($response)->result,
            'jurusan' => json_decode($jurusan)->data->rows,
            'mapel' => json_decode($mapel)->data->rows,
        ]);

    }


    /* Store Mapel Jurusan */
    public function storeMapelJurusan(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        $mapelJurusanId = "{$request->JurusanId}_{$request->MapelId}";

        $response = json_decode(Http::post("{$this->api_url}/mapel-jurusan", [
            'MapelId' => $request->MapelId,
            'JurusanId' => $request->JurusanId,
        ]));

        if ($response->status == 'success') {

            return redirect('/admin/mapel-jurusan')->with('success', 'Data berhasil ditambahkan.');
            
        } else if ($response->message == "MapelJurusan with id {$mapelJurusanId} already exist") {
            
            return redirect('/admin/mapel-jurusan/create')->with(['error' => 'Sudah ada Mapel Jurusan dengan Id tersebut.']);

        } else {

            return redirect('/admin/mapel-jurusan/create')->with(['error' => 'Terjadi kesalahan.']);

        }

    }


    /* Update Mapel Jurusan */
    public function updateMapelJurusan(Request $request, $id) {

        abort_if(Gate::denies('admin-only'), 403);

        $mapelJurusanId = "{$request->JurusanId}_{$request->MapelId}";
        
        $response = json_decode(Http::put("{$this->api_url}/mapel-jurusan/{$id}", [
            'MapelId' => $request->MapelId,
            'JurusanId' => $request->JurusanId,
        ]));

        if ($response->status == 'success') {

            return redirect('/admin/mapel-jurusan')->with('success', 'Data berhasil diupdate.');

        } else  {

            return redirect("/admin/mapel-jurusan/edit/{$id}")->with(['error', 'Terjadi kesalahan.']);

        } 

    }


    /* Delete Mapel Jurusan */
    public function deleteMapelJurusan(Request $request, $id) {

        abort_if(Gate::denies('admin-only'), 403);

        $response = Http::delete("{$this->api_url}/mapel-jurusan/{$id}");

        if (json_decode($response)->message == "Mapel Jurusan does not exist") {

            return redirect('/admin/mapel-jurusan?page=1&perPage10')->with('warning', 'Data tidak terdaftar.');
            
        } else {

            return redirect('/admin/mapel-jurusan?page=1&perPage10')->with('success', 'Data berhasil dihapus.');

        }

    }


}
