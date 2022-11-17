<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MutasiMasukExport implements FromView, ShouldAutoSize
{

    use Exportable;

    private $mutasi;

    public function __construct()
    {

        $this->url = 'https://9393-103-148-113-86.ap.ngrok.io';
        
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {

        $mutasi = Http::get("{$this->url}/mutasi/siswa-masuk");

        return view('mutasi.pdf.mutasi-masuk', [
            'mutasi' => json_decode($mutasi)->data->rows,
        ]);
    }
}