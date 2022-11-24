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

class AlumniExport implements FromView, ShouldAutoSize, WithEvents
{

    use Exportable;

    public function __construct()
    {
        
        $this->url = 'https://e5aa-103-148-113-86.ap.ngrok.io';

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
    
        /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:G1');
                $event->sheet->getDelegate()->getStyle('A1')
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);
                
                $event->sheet->getDelegate()->getStyle('A2:G12')->applyFromArray([
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
