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

    private $url;

    private $semuaKelas;

    private $kelas10;
    private $kelas11;
    private $kelas12;

    public function __contruct() {

        $this->url = 'https://ffaf-114-79-55-233.ap.ngrok.io';

        $this->semuaKelas = Http::get("{$this->url}/kelas/siswa-per-kelas/all");
        $this->kelas10 = Http::get("{$this->url}/kelas/siswa-per-kelas/10");
        $this->kelas11 = Http::get("{$this->url}/kelas/siswa-per-kelas/11");
        $this->kelas12 = Http::get("{$this->url}/kelas/siswa-per-kelas/12");

    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view() : View
    {
        return view('rekap-siswa.pdf.rekap-jumlah-siswa', [
            'semua_kelas' => json_decode($this->semuaKelas)->result,
            'kelas10' => json_decode($this->kelas10)->result,
            'kelas11' => json_decode($this->kelas11)->result,
            'kelas12' => json_decode($this->kelas12)->result
        ]);
    }
}
