<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class MapelController extends Controller
{
    

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = 'https://sims-api.vercel.app'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* View All Mapel */
    public function viewAllMapel(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        //-- search & sorting --//
        $search = $request->search;
        $sort_by = $request->sort_by;
        $sort = $request->sort;

        //-- pagination --//
        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/mapel?page={$page}&perPage={$perPage}&search={$search}&sort_by={$sort_by}&sort={$sort}");
        $total_mapel = json_decode(Http::get("{$this->api_url}/mapel"))->data->count;

        Session::flash('backUrl', URL::current());

        if ($response->successful()) {

            return view('admin.all-mapel.all-mapel', [
                'title' => 'Mata Pelajaran',
                'active' => 'admin-dashboard',
                'response' =>  json_decode($response),
                'mapel' => json_decode($response)->data->rows,
                'total' => json_decode($response)->data->count,
                'total_mapel' => $total_mapel,
            ]); 

        } else {

            return view('errors.404');

        }

    }
    
    
    /* View Detail Mapel */
    public function viewDetailMapel(Request $request, $id) {

        abort_if(Gate::denies('admin-only'), 403);

        $response = Http::get("{$this->api_url}/mapel/{$id}");

        if($response->successful()) {

            return view('admin.all-mapel.detail-mapel', [
                'title' => 'Detail Mata Pelajaran',
                'active' => 'admin-dashboard',
                'mapel' => json_decode($response)->result,
            ]);

        } else {

            return view('errors.404');

        }

    }
    
    
    /* Create Mapel */
    public function createMapel(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        if (Session::has('backUrl')) {
            Session::keep('backUrl');
        }

        return view('admin.all-mapel.create-mapel', [
            'title' => 'Create Mata Pelajaran',
            'active' => 'admin-dashboard'
        ]);

    }
    
    
    /* Edit Mapel */
    public function editMapel(Request $request, $id) {

        $response = Http::get("{$this->api_url}/mapel/$id");

        return view('admin.all-mapel.edit-mapel', [
            'title' => 'Edit Mata Pelajaran',
            'active' => 'admin-dashboard',
            'mapel' => json_decode($response)->result,
        ]);

    }
    
    
    /* Store Mapel */
    public function storeMapel(Request $request) {

        abort_if(Gate::denies('admin-only'), 403);

        $id = $request->id;

        if (Session::has('backUrl')) {
            Session::keep('backUrl');
        }

        $response = json_decode(Http::post("{$this->api_url}/mapel", [
            'id' => $request->id,
            'nama' => $request->nama,
        ]));

        if($response->message == 'Data added successfully.') {

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [

                'activityName' => 'Create Mapel',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama membuat mapel dengan Id Mapel : $id"

            ]);

            return ($url = Session::get('backUrl')) 
            ? Redirect::to($url)->with('success', 'Data berhasil ditambahkan.') 
            : Redirect::route('view-all-mapel')->with('success', 'Data berhasil ditambahkan.') ;

        } else if ($response->message === "Mata pelajaran with Id : '{$id}' already exist") {

            return redirect('/admin/mata-pelajaran/create')->with(['error' => 'Mata pelajaran dengan Id tersebut sudah terdaftar.']);

        } else {

            return redirect('/admin/mata-pelajaran/create')->with(['error' => 'Terjadi kesalahan.']);

        }

    }
    
    
    /* Update Mapel */
    public function updateMapel(Request $request, $id) {

        abort_if(Gate::denies('admin-only'), 403);

        $response = Http::put("{$this->api_url}/mapel/{$id}", [
            'id' => $request->id,
            'nama' => $request->nama,
        ]);

        $response->throw();

        if (json_decode($response)->status == 'success') {

            // if admin redirect to edit page from detail page.
            if($request->fromDetailPage){

                $user = Auth::user();

                Http::post("{$this->api_url}/history", [
    
                    'activityName' => 'Update Mapel',
                    'activityAuthor' => "$user->nama",
                    'activityDesc' => "$user->nama memperbarui Mapel dengan Id Mapel : $id"
    
                ]);

                return redirect("/admin/detail-mata-pelajaran/{$id}")->with('success', 'Data berhasil diupdate.');
            
            } else {

                return redirect('/admin/mata-pelajaran?page=1&perPage10')->with('success', 'Data berhasil diupdate.');
            
            }

        } else {

            return redirect("/admin/mata-pelajaran/edit/{$id}")->with(['error' => 'Terjadi kesalahan']);

        }

    }
    
    
    /* Delete Mapel */
    public function deleteMapel(Request $request, $id) {

        abort_if(Gate::denies('admin-only'), 403);
        
        $response = Http::delete("{$this->api_url}/mapel/{$id}");

        if (json_decode($response)->message == "Mapel with id {$id} does not exist") {

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [

                'activityName' => 'Delete Mapel',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama menghapus Mapel dengan Id Mapel : $id"

            ]);

            return redirect('/admin/mata-pelajaran?page=1&perPage10')->with('warning', 'Data tidak terdaftar.');
            
        } else {

            return redirect('/admin/mata-pelajaran?page=1&perPage10')->with('success', 'Data berhasil dihapus.');

        }
        
    }
}
