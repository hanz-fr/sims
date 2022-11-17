<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataTidakNaikExport implements FromView, ShouldAutoSize
{

    use Exportable;

    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000';

    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {

        $siswa = Http::get("{$this->api_url}/dashboard/siswa-tidak-naik??perPage=1&perPage=100");

        return view('rekap-siswa.pdf.tidak-naik', [
            'siswa' => json_decode($siswa)->data->rows
        ]);
    }
}
