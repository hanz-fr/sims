<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index() {

        $siswa = Http::get('localhost:3000/siswa');

        return view('be-test',[
            'siswa' => json_decode($siswa),
            'title' => 'backend-test',
            'active' => 'backend-test'
        ]);
    }

    public function create() {
        return view('create-siswa', [
            'title' => 'backend-test',
            'active' => 'backend-test'
        ]);
    }


    public function store(Request $request) {

        Http::post('localhost:3000/ortu', [
            'nik_ortu' => null,
            'nama' => $request->nama_ibu,
            'hubungan' => 'Ibu',
            'alamat' => $request->alamat_ortu,
            'no_telp' => $request->no_telp_ortu,
            'pekerjaan' => null,
            'email' => $request->email_ortu,
        ]);

        Http::post('localhost:3000/siswa',[
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'KelasId' =>  1,
            'email' => $request->email,
            'nomor_ijazah_smk' => $request->nomor_ijazah_smk,
            'nomor_ijazah_smp' => $request->nomor_ijazah_smp,
            'tanggal_ijazah_smk' => $request->tanggal_ijazah_smk,
            'nomor_skhun' => $request->nomor_skhun,
            'tahun_ijazah_smp' => $request->tahun_ijazah_smp,
            'diterima_di_kelas' => $request->kelas,
            'tgl_diterima' => $request->tgl_masuk,
            'semester_diterima' => $request->semester,
            'alamat_siswa' => $request->alamat_siswa,
            'nama_sekolah_asal' => $request->nama_sekolah_asal,
            'alamat_sekolah_asal' => $request->alamat_sekolah_asal,
            'tmp_lahir' => $request->tmp_lahir, 
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'anak_ke' => $request->anak_ke,
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
    }
}

