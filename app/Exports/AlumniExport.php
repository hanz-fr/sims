<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AlumniExport implements FromView, ShouldAutoSize
{

    use Exportable;
    public function __construct()
    {
        //
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        //
    }
}
