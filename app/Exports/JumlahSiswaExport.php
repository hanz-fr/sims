<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JumlahSiswaExport implements FromView, ShouldAutoSize, WithEvents
{

    use Exportable;

    public function __construct() {

        $this->api_url = '127.0.0.1:3000';
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view() : View
    {
        
        $semuaKelas = Http::get("{$this->api_url}/kelas/siswa-per-kelas/all");
        $kelas10    = Http::get("{$this->api_url}/kelas/siswa-per-kelas/10");
        $kelas11    = Http::get("{$this->api_url}/kelas/siswa-per-kelas/11");
        $kelas12    = Http::get("{$this->api_url}/kelas/siswa-per-kelas/12");

        return view('rekap-siswa.pdf.rekap-jumlah-siswa', [
            'semua_kelas' => json_decode($semuaKelas)->result,
            'kelas10'     => json_decode($kelas10)->result,
            'kelas11'     => json_decode($kelas11)->result,
            'kelas12'     => json_decode($kelas12)->result
        ]);
    }

        /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                // merge cells
                $event->sheet->getDelegate()
                ->mergeCells('A1:M1')
                ->mergeCells('A2:M2')
                ->mergeCells('A3:M3');


                // set alignment
                $event->sheet->getDelegate()->getStyle("A1:M{$event->sheet->getHighestRow()}")
                ->getAlignment()
                ->setWrapText(true)
                ->setVertical(Alignment::VERTICAL_CENTER)
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);
                

                // set border to table
                $event->sheet->getDelegate()->getStyle('A5:M79')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
