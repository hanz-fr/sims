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

    private $siswa;

    public function __construct()
    {
        // $request = request();

        $this->api_url = 'https://d625-103-148-113-86.ap.ngrok.io';

        $this->siswa = Http::get("{$this->api_url}/dashboard/siswa-tidak-naik??perPage=1&perPage=100");
        
    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        return view('induk.pdf.tidak-naik', [
            'siswa' => json_decode($this->siswa)->data->rows
        ]);
    }
}
