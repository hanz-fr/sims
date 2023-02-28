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
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DataTidakNaikExport implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{

    use Exportable;


    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000';

    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {

        $request = request();

        $sort_by          = $request->sort_by;
        $sort             = $request->sort;
        $dibuatTglDari    = $request->dibuatTglDari;
        $getDibuatTglDari = Carbon::parse($dibuatTglDari)->translatedFormat('F');
        $dibuatTglKe      = $request->dibuatTglKe;
        $getDibuatTglKe   = Carbon::parse($dibuatTglKe)->translatedFormat('F');

        $siswa = Http::get("{$this->api_url}/dashboard/siswa-tidak-naik?dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

        return view('rekap-siswa.pdf.tidak-naik', [
            'raport'        => json_decode($siswa)->data->rows,
            'dibuatTglDari' => $dibuatTglDari,
            'dibuatTglKe'   => $dibuatTglKe,
            'TglDari'       => $getDibuatTglDari,
            'TglKe'         => $getDibuatTglKe
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
                ->mergeCells('A1:E1')
                ->mergeCells('A2:E2')
                ->mergeCells('A3:E3')
                ->mergeCells('A4:E4')
                ->mergeCells('A6:E6');


                // set alignment
                $event->sheet->getDelegate()->getStyle("A1:E{$event->sheet->getHighestRow()}")
                ->getAlignment()
                ->setWrapText(true)
                ->setVertical(Alignment::VERTICAL_CENTER)
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);
                

                // set borders to table
                $event->sheet->getDelegate()->getStyle("A8:E{$event->sheet->getHighestRow()}")->applyFromArray([
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


    // set column width
    public function columnWidths(): array
    {
        return [
            'A' => 5,
        ];
    }
}
