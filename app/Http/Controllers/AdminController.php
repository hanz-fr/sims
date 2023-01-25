<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
    public function index() {

        return view('admin.login', [
            'title'  => 'Login',
            'status' => ''
        ]);

    }

    
    public function handleLogin(Request $request) {

        if(Auth::guard('admin')
               ->attempt($request->only(['email', 'password'])))
        {
            return redirect()
                ->route('manage.index');
        }

        return redirect()->back()->with('error', 'Login details are not valid');

    }


    public function logout() {

        Auth::guard('admin')
            ->logout();

        return redirect()
            ->route('admin.login');

    }



    /* View All Jurusan */
    public function viewAllJurusan(Request $request) {

        //-- search & sorting --//
        $search = $request->search;
        $sort_by = $request->sort_by;
        $sort = $request->sort;

        //-- pagination --//
        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/jurusan?page={$page}&perPage={$perPage}&search={$search}&sort_by={$sort_by}&sort={$sort}");
        $total_jurusan = json_decode(Http::get("{$this->api_url}/jurusan"))->data->count;

        if ($response->successful()) {

            return view('admin.jurusan.show-jurusan', [
                'title' => 'Jurusan',
                'active' => 'database',
                'response' =>  json_decode($response),
                'jurusan' => json_decode($response)->data->rows,
                'total' => json_decode($response)->data->count,
                'total_jurusan' => $total_jurusan,
            ]);

        } else {

            return view('errors.404');

        }

    }


    /* View Detail Jurusan */
    public function viewJurusan(Request $request, $id) {

        $response = Http::get("{$this->api_url}/jurusan/{$id}");

        if($response->successful()) {

            return view('admin.jurusan.show-detail-jurusan', [
                'title' => 'Detail Jurusan',
                'active' => 'database',
                'jurusan' => json_decode($response)->result
            ]);

        } else {

            return view('errors.404');

        }

    }
    
    
    /* View All Mapel */
    public function viewAllMapel(Request $request) {

        //-- search & sorting --//
        $search = $request->search;
        $sort_by = $request->sort_by;
        $sort = $request->sort;

        //-- pagination --//
        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/mapel?page={$page}&perPage={$perPage}&search={$search}&sort_by={$sort_by}&sort={$sort}");
        $total_mapel = json_decode(Http::get("{$this->api_url}/mapel"))->data->count;

        if ($response->successful()) {

            return view('admin.all-mapel.all-mapel', [
                'title' => 'Mata Pelajaran',
                'active' => 'database',
                'response' =>  json_decode($response),
                'mapel' => json_decode($response)->data->rows,
                'total' => json_decode($response)->data->count,
                'total_mapel' => $total_mapel,
            ]); 

        } else {

            return view('errors.404');

        }

    }


    /* View All Mapel Jurusan */
    public function viewAllMapelJurusan(Request $request) {

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

}
