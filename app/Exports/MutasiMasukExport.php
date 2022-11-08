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

    public function __construct()
    {

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        
    }
}