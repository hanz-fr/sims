<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JumlahSiswaExport implements FromView, ShouldAutoSize
{

    use Exportable;

    /**
    * @return \Illuminate\Support\View
    */
    public function view() : View
    {
        
        $semuaKelas = Http::get("https://9393-103-148-113-86.ap.ngrok.io/kelas/siswa-per-kelas/all");
        $kelas10 = Http::get("https://9393-103-148-113-86.ap.ngrok.io/kelas/siswa-per-kelas/10");
        $kelas11 = Http::get("https://9393-103-148-113-86.ap.ngrok.io/kelas/siswa-per-kelas/11");
        $kelas12 = Http::get("https://9393-103-148-113-86.ap.ngrok.io/kelas/siswa-per-kelas/12");

        return view('rekap-siswa.pdf.rekap-jumlah-siswa', [
            'semua_kelas' => json_decode($semuaKelas)->result,
            'kelas10' => json_decode($kelas10)->result,
            'kelas11' => json_decode($kelas11)->result,
            'kelas12' => json_decode($kelas12)->result
        ]);
    }
}
