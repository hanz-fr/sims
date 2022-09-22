<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index(Request $request) { 

        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("https://a86b-103-148-113-86.ap.ngrok.io/siswa?page={$page}&perPage={$perPage}");

        if ($response->successful()){
            return view('data-induk',[
                'siswa' => json_decode($response)->data->rows,
                'status' => 'success',
                'response' => json_decode($response),
                'total' => json_decode($response)->data->count,
                'title' => 'data-induk',
                'active' => 'data-induk',
            ]);
        } else {
            return view('data-induk',[
                'response' => $response,
                'status' => 'error',
                'title' => 'data-induk',
                'active' => 'data-induk',
                'message' => 'Sori dek, halaman nya ga ada :"('
            ]);
            
        }
    }


    public function show(Request $request) {

        $nis = $request->nis;

        $response = Http::get("https://a86b-103-148-113-86.ap.ngrok.io/siswa/{$nis}");

        if ($response->successful()){
            return view('di-detail', [
                'title' => 'Data Siswa',
                'active' => 'detail-siswa',
                'status' => 'success',
                'siswa' => json_decode($response)->result,
            ]);
        } else {
            return view('di-detail', [
                'title' => 'Data Siswa',
                'active' => 'detail-siswa',
                'status' => 'error',
                'message' => 'Sori dek, halaman nya ga ada :"('
            ]);
        }

    }

    public function create() {
        return view('create-siswa', [
            'title' => 'backend-test',
            'active' => 'backend-test'
        ]);
    }

    public function store(Request $request) {
        $response = Http::post('https://a86b-103-148-113-86.ap.ngrok.io/siswa',[
            'nis_siswa' => $request->nis,
            'nisn_siswa' => $request->nisn,
            'nama_siswa' => $request->nama,
            'KelasId' =>  null,
            'email_siswa' => $request->email,
            'tmp_lahir' => $request->tmp_lahir, 
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'no_ijazah_smk' => $request->nomor_ijazah_smk,
            'no_ijazah_smp' => $request->nomor_ijazah_smp,
            'tgl_ijazah_smk' => $request->tanggal_ijazah_smk,
            'no_skhun_smp' => $request->nomor_skhun,
            'thn_ijazah_smp' => $request->tahun_ijazah_smp,
            'tgl_diterima' => $request->tgl_masuk,
            'semester_diterima' => (int)$request->semester,
            'alamat_siswa' => $request->alamat_siswa,
            'sekolah_asal' => $request->nama_sekolah_asal,
            'alamat_sekolah_asal' => $request->alamat_sekolah_asal,
            'anak_ke' => (int)$request->anak_ke,
            'status' => $request->status,
            'keterangan_lain' => $request->keterangan_lain,
            'no_telp_siswa' => $request->no_telp,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'alamat_ortu' => $request->alamat_ortu,
            'no_telp_ortu' => $request->no_telp_ortu,
            'email_ortu' =>  $request->email_ortu,
            'nama_wali' => $request->nama_wali,
            'alamat_wali' => $request->alamat_wali,
            'no_telp_wali' => $request->no_telp_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'tgl_meninggalkan_sekolah' => $request->tgl_meninggalkan_sekolah, 
            'alasan_meninggalkan_sekolah' => $request->alasan_meninggalkan_sekolah,
            'foto' => $request->file('foto')->store('foto'),
            'berat_badan' => null,
            'tinggi_badan' => null,
            'lingkar_kepala' => null,
            'tgl_masuk' => null,
            'isAlumni' => false,
        ]);

        $response->throw();

        return redirect('/data-induk-siswa?perPage=10');
    }
}

