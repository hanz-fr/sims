<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataSiswaExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $siswa;

    public function __construct()
    {

        $request = request();

        $nis = $request->nis;

        $this->siswa = Http::get("https://4782-103-139-10-81.ngrok.io//siswa/{$nis}");

    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view() : View
    {
        
        return view('induk.pdf.data-induk-detail', [
            'siswa' => json_decode($response)->result,
            'tgl_lahir_siswa' => $tgl_lahir_siswa,
        ]);
    }
}
