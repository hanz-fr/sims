<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AlumniExport implements FromView, ShouldAutoSize
{

    use Exportable;

    public function __construct()
    {
        
        $this->url = 'https://9393-103-148-113-86.ap.ngrok.io';

    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {

        $alumni = Http::get("{$this->url}/dashboard/alumni/get");

        return view('induk.pdf.alumni', [
            'alumni' => json_decode($alumni)->data->rows,
        ]);
    }
}
