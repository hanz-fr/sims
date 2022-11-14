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

    private $alumni;

    public function __construct()
    {
        $this->url = 'https://ffaf-114-79-55-233.ap.ngrok.io';

        $this->alumni = Http::get("{$this->url}/dashboard/alumni/get");
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        return view('induk.pdf.alumni', [
            'alumni' => json_decode($this->alumni)->data->rows,
        ]);
    }
}
