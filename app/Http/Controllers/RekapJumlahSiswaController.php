<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Exports\JumlahSiswaExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class RekapJumlahSiswaController extends Controller
{


    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    public function rekapJumlahSiswa() {

        abort_if(Gate::allows('wali-kelas'), 403);

        $semuaKelas = Http::get("{$this->api_url}/kelas/siswa-per-kelas/all");
        $kelas10 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/10");
        $kelas11 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/11");
        $kelas12 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/12");

        if ($semuaKelas->successful()) {

            return view('rekap-siswa.data-rekap-jumlah-siswa', [
                'title' => 'Data Rekap Siswa',
                'active' => 'rekap-siswa',
                'semua_kelas' => json_decode($semuaKelas)->result,
                'kelas10' => json_decode($kelas10)->result,
                'kelas11' => json_decode($kelas11)->result,
                'kelas12' => json_decode($kelas12)->result,
            ]);

        } else {

            return view('induk.show-all', [
                'response' => $semuaKelas,
                'status' => 'error',
                'title' => 'Data Induk',
                'active' => 'rekap-siswa',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }


    public function exportRekapJumlahPDF() {

        abort_if(Gate::allows('wali-kelas'), 403);

        $semuaKelas = Http::get("{$this->api_url}/kelas/siswa-per-kelas/all");
        $kelas10 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/10");
        $kelas11 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/11");
        $kelas12 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/12");

        try {

            return $pdf->download($datajumlah);

            $pdf = PDF::loadView('rekap-siswa.pdf.rekap-jumlah-siswa', [
                'semua_kelas' => json_decode($semuaKelas)->result,
                'kelas10' => json_decode($kelas10)->result,
                'kelas11' => json_decode($kelas11)->result,
                'kelas12' => json_decode($kelas12)->result
            ])->setPaper('A4_PLUS_PAPER', 'landscape');
    
            $datajumlah = 'data_rekap_jumlah_siswa_'.date('Y-m-d').'.pdf';
    
            $user = Auth::user();
    
            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Export Rekap Jumlah Siswa',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengexport data rekap jumlah siswa dengan tipe file PDF."
            
            ]);


        } catch (\Exception) {
            
            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

        }

    }
    
    
    public function printRekapJumlah() {

        abort_if(Gate::allows('wali-kelas'), 403);

        $semuaKelas = Http::get("{$this->api_url}/kelas/siswa-per-kelas/all");
        $kelas10 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/10");
        $kelas11 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/11");
        $kelas12 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/12");

        try {

            return view('rekap-siswa.pdf.rekap-jumlah-siswa', [
                'semua_kelas' => json_decode($semuaKelas)->result,
                'kelas10' => json_decode($kelas10)->result,
                'kelas11' => json_decode($kelas11)->result,
                'kelas12' => json_decode($kelas12)->result
            ]);

        } catch (\Exception) {

            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

        }

    } 

    
    public function exportRekapJumlahExcel() {

        abort_if(Gate::allows('wali-kelas'), 403);

        ob_end_clean();
        ob_start();

        $datajumlah = 'data_rekap_jumlah_siswa_'.date('Y-m-d').'.xlsx';

        try {

            return Excel::download(new JumlahSiswaExport, $datajumlah);

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Export Rekap Jumlah Siswa',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengexport data rekap jumlah siswa dengan tipe file excel."
            
            ]);

        } catch (\Exception) {
            
            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

        }

    }


}