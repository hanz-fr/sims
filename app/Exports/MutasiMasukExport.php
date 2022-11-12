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
        $this->mutasi = Http::get("https://4782-103-139-10-81.ngrok.io/mutasi/siswa-masuk");
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        return view('mutasi.pdf.mutasi-masuk', [
            'mutasi' => json_decode($this->mutasi)->data->rows,
        ]);
    }
}