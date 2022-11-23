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


class MutasiKeluarExport implements FromView, ShouldAutoSize, WithEvents
{

    use Exportable;

    private $mutasi;

    public function __construct()
    {

        $this->url = 'https://d197-103-139-10-189.ngrok.io';
        
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {

        $mutasi = Http::get("{$this->url}/mutasi/siswa-keluar");

        return view('mutasi.pdf.mutasi-keluar', [
            'mutasi' => json_decode($mutasi)->data->rows,
        ]);
    }

        /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:G1');
                
                $event->sheet->getDelegate()->getStyle('A2:G10')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ])
                ->getAlignment()
                ->setWrapText(true)
                ->setVertical(Alignment::VERTICAL_CENTER)
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);
            },
        ];
    }
}