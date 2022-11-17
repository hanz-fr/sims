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
        
        $this->url = 'https://9393-103-148-113-86.ap.ngrok.io';
    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        $request = request();

        $siswa = Http::get("{$this->url}/siswa/{$request->nis}");

        return view('rekap-nilai.pdf.rekap-nilai', [
            'siswa' => json_decode($siswa)->result
        ]);
    }
}
