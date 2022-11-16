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
        $request = request();

        $this->url = '127.0.0.1:3000';

        $this->siswa = Http::get("{$this->url}/siswa/{$request->jurusan}/{$request->kelas}??page=1&perPage=100");
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        
        $request = request();
        
        return view('induk.pdf.data-induk', [
            'siswa' => json_decode($this->siswa)->data->rows,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas
        ]);

    }
}