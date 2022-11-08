<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class DataIndukExport implements FromView, ShouldAutoSize
{

    use Exportable;

    private $siswa;

    public function __construct()
    {
        $this->siswa = Http::get("https://82a1-103-139-10-81.ap.ngrok.io/siswa?page=1&perPage=100");
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        return view('induk.pdf.data-induk', [
            'siswa' => json_decode($this->siswa)->data->rows,
        ]);
    }
}