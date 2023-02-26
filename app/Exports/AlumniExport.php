<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AlumniExport implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{

    use Exportable;

    public function __construct()
    {
        
        $this->url = '127.0.0.1:3000';

    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {

        $request = request();

        $dibuatTglDari = $request->dibuatTglDari;
        $dibuatTglKe   = $request->dibuatTglKe;

        $tahun_dari = Carbon::parse($dibuatTglDari)->translatedFormat('Y');
        $tahun_ke   = Carbon::parse($dibuatTglDari)->translatedFormat('Y');

        $alumni = Http::get("{$this->url}/dashboard/alumni/all?page={$request->page}&perPage={$request->perPage}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}&angkatan={$request->angkatan}");

        return view('induk.pdf.alumni', [
            'alumni'        => json_decode($alumni)->data->rows,
            'dibuatTglDari' => $dibuatTglDari,
            'dibuatTglKe'   => $dibuatTglKe,
            'TglDari'       => $tahun_dari,
            'TglKe'         => $tahun_ke
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
                $event->sheet->getDelegate()->mergeCells('A1:G1');
                $event->sheet->getDelegate()->mergeCells('A2:G2');
                $event->sheet->getDelegate()->mergeCells('A3:G3');


                // set alignment
                $event->sheet->getDelegate()->getStyle("A1:G{$event->sheet->getHighestRow()}")
                ->getAlignment()
                ->setWrapText(true)
                ->setVertical(Alignment::VERTICAL_CENTER)
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);
                

                // set borders to table
                $event->sheet->getDelegate()->getStyle("A7:G{$event->sheet->getHighestRow()}")->applyFromArray([
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


    // set column widths
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 15,
            'C' => 15,
            'F' => 15,
        ];
    }
}
