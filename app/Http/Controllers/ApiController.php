<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index(Request $request) { 

        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("https://ccea-103-139-10-202.ngrok.io/siswa?page={$page}&perPage={$perPage}");

        $response->throw();


        return view('di-detail',[
            'siswa' => json_decode($response)->data->rows,
            'response' => json_decode($response),
            'total' => json_decode($response)->data->count,
            'title' => 'backend-test',
            'active' => 'backend-test',
        ]);
    }

    public function create() {
        return view('create-siswa', [
            'title' => 'backend-test',
            'active' => 'backend-test'
        ]);
    }

    public function store(Request $request) {

        Http::post('https://8630-103-148-113-86.ap.ngrok.io//siswa',[
            'nis_siswa' => $request->nis,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'KelasId' =>  1,
            'email' => $request->email,
            'nomor_ijazah_smk' => $request->nomor_ijazah_smk,
            'nomor_ijazah_smp' => $request->nomor_ijazah_smp,
            'tanggal_ijazah_smk' => $request->tanggal_ijazah_smk,
            'nomor_skhun' => $request->nomor_skhun,
            'tahun_ijazah_smp' => (int)$request->tahun_ijazah_smp,
            'diterima_di_kelas' => $request->kelas,
            'tgl_diterima' => $request->tgl_masuk,
            'semester_diterima' => (int)$request->semester,
            'alamat_siswa' => $request->alamat_siswa,
            'nama_sekolah_asal' => $request->nama_sekolah_asal,
            'alamat_sekolah_asal' => $request->alamat_sekolah_asal,
            'tmp_lahir' => $request->tmp_lahir, 
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'anak_ke' => (int)$request->anak_ke,
            'status' => $request->status,
            'agama' => $request->agama,
            'keterangan_lain' => $request->keterangan_lain,
            'no_telp' => $request->no_telp,
            'foto' => null,
            'berat_badan' => null,
            'tinggi_badan' => null,
            'lingkar_kepala' => null,
            'tgl_masuk' => null,
            'isAlumni' => false,
        ]);

        return $request;

        /* return view('be-test2', [
            'title' => 'Data Tidak Naik Kelas',
            'active' => 'data-induk',
            'req' => $request
        ]); */
    }
}

