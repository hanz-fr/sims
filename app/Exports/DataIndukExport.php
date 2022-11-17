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

        $siswa = Http::get("{$this->url}/siswa/{$request->jurusan}/{$request->kelas}??page=1&perPage=100");
        
        return view('induk.pdf.data-induk', [
            'siswa' => json_decode($siswa)->data->rows,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas
        ]);

    }
}