<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DetailDataIndukExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $siswa;

    public function __construct($nis)
    {

        $this->nis = $nis;

        $this->api_url = '127.0.0.1:3000';

        $this->siswa = Http::get("{$this->api_url}/siswa/{$nis}??page=1&perPage=100");

    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        // Parse siswa birthdate
        $getSiswaBirthDate = json_decode($this->siswa)->result->tgl_lahir;
        $tgl_lahir_siswa = Carbon::parse($getSiswaBirthDate)->translatedFormat('l d F Y');
        
        return view('induk.pdf.data-induk-detail', [
            'siswa' => json_decode($this->siswa)->result,
            'tgl_lahir_siswa' => $tgl_lahir_siswa,
        ]);
    }
}
