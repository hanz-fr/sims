<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RekapNilaiExport implements FromView, ShouldAutoSize
{

    use Exportable;

    public function __construct()
    {
        
        $this->api_url = 'https://d386-103-148-113-86.ap.ngrok.io';
    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {

        $request = request();

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");
        $nis = json_decode($response)->result->nis_siswa;
        $jurusanSiswa = json_decode($response)->result->kelas->JurusanId;
        $mapel = Http::get("{$this->api_url}/mapel-jurusan/get/by-jurusan/$jurusanSiswa");
        
        $raportId = "RPT{$nis}";

        $raport01 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-1");
        $raport02 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-2");
        $raport03 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-3");
        $raport04 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-4");
        $raport05 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-5");
        $raport06 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-6");

        return view('rekap-nilai.pdf.rekap-nilai', [
            'siswa' => json_decode($response)->result,
            'raport1' => json_decode($response)->result->raport[0],
            'raport2' => json_decode($response)->result->raport[1],
            'mapel' => json_decode($mapel),
            'raport01' => json_decode($raport01)->rows,
            'raport02' => json_decode($raport02)->rows,
            'raport03' => json_decode($raport03)->rows,
            'raport04' => json_decode($raport04)->rows,
            'raport05' => json_decode($raport05)->rows,
            'raport06' => json_decode($raport06)->rows,
        ]);
    }
}
