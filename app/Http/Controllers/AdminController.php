<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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

        return view('admin.jurusan.show-jurusan', [
            'title' => 'Jurusan',
            'active' => 'database',
            'response' =>  json_decode($response),
            'jurusan' => json_decode($response)->data->rows,
            'total' => json_decode($response)->data->count,
            'total_jurusan' => $total_jurusan,
        ]);

    }


    /* View Detail Jurusan */
    public function viewJurusan(Request $request) {

        return view('admin.jurusan.show-detail-jurusan', [
            'title' => 'Detail Jurusan',
            'active' => 'database'
        ]);

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

        return view('admin.all-mapel.all-mapel', [
            'title' => 'Mata Pelajaran',
            'active' => 'database',
            'response' =>  json_decode($response),
            'mapel' => json_decode($response)->data->rows,
            'total' => json_decode($response)->data->count,
            'total_mapel' => $total_mapel,
        ]); 

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

        return view('admin.mapel-jurusan.mapel-jurusan', [
            'title' => 'Mata Pelajaran Jurusan',
            'active' => 'database',
            'response' =>  json_decode($response),
            'mapel_jurusan' => json_decode($response)->data->rows,
            'total' => json_decode($response)->data->count,
            'total_mapel_jurusan' => $total_mapel_jurusan,
        ]); 

    }


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
            'total_kelas' => $total_kelas
        ]);
    }


    public function createKelas(Request $request) {

        $prevURL = URL::previous();

        $jurusan = json_decode(Http::get("{$this->api_url}/jurusan"))->data->rows;

        return view('admin.kelas.create', [
            'title' => 'Tambah Data Kelas',
            'active' => '',
            'jurusan' => $jurusan,
            'prevURL' => $prevURL
        ]);
    }


    public function storeKelas(Request $request) {

        $id = $request->id;

        $kelasExist = Http::get("{$this->api_url}/kelas/{$id}");

        if ($id) {
            $message = json_decode($kelasExist)->message;
        } else {
            $message = json_decode($kelasExist);
        }

        if ($message == 'Displaying kelas with id : ' . $id) {
            
            return redirect('/admin/kelas/create')->with('warning', 'Kelas dengan ID tersebut sudah terdaftar.');
        
        } else {

            $request->validate([
                'id' => 'required|max:50',
                'kelas' => 'required|max:50',
                'jurusan' => 'required|max:50',
                'JurusanId' => 'required',
                'rombel' => 'required|max:5'
            ]);

            $response = Http::post("{$this->api_url}/kelas", [
                'id' => $request->id,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'JurusanId' => $request->JurusanId,
                'rombel' => $request->rombel
            ]);

            $response->throw;

            $user = Auth::user();
            
            Http::post("{$this->api_url}/history", [
                'activityName' => 'Create Data Kelas',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama menambahkan data kelas baru dengan ID : $request->id"
            ]);

            return redirect($request->prevURL)->with('success', 'Data berhasil ditambahkan.');
        }
    }


    public function editKelas(Request $request) {

        $id = $request->id;

        $response = Http::get("{$this->api_url}/kelas/{$id}");
        $kelas = Http::get("{$this->api_url}/kelas");

        return view('admin.kelas.edit', [
            'title' => 'Edit Data Kelas',
            'active' => '',
            'kelas' => json_decode($response)->result,
            'kelas' => json_decode($kelas),
        ]);
    }


    public function viewKelas(Request $request) {

        $id = $request->id;

        $response = Http::get("{$this->api_url}/kelas/{$id}");

        $createdAt = '';
        $updatedAt = '';

        if (! empty(json_decode($response)->result->createdAt)) {
            $createdAt = Carbon::parse(json_decode($response)->result->createdAt)->translatedFormat('l d F Y');
        }
        if (! empty(json_decode($response)->result->updatedAt)) {
            $updatedAt = Carbon::parse(json_decode($response)->result->updatedAt)->diffForHumans();
        }

        return view('admin.kelas.show-detail', [
            'title' => 'Detail Data Kelas',
            'active' => '',
            'updatedAt' => $updatedAt,
            'createdAt' => $createdAt,
            'kelas' => json_decode($response)->result,
        ]);
    }

}
