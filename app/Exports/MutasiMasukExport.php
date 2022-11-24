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
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class MutasiMasukExport implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{

    use Exportable;

    private $mutasi;

    public function __construct()
    {

        $this->url = 'https://552d-103-139-10-189.ap.ngrok.io';
        
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        $request = request();

        $sort_by = $request->sort_by;
        $sort = $request->sort;
        $tgl_masuk_dari = $request->tgl_masuk_dari;
        $tgl_masuk_ke = $request->tgl_masuk_ke;

        $mutasi = Http::get("{$this->url}/mutasi/siswa-masuk?sort_by={$sort_by}&sort={$sort}&tgl_masuk_dari={$tgl_masuk_dari}&tgl_masuk_ke={$tgl_masuk_ke}");

        return view('mutasi.pdf.mutasi-masuk', [
            'mutasi' => json_decode($mutasi)->data->rows,
            'tgl_masuk_dari' => $request->tgl_masuk_dari,
            'tgl_masuk_ke' => $request->tgl_masuk_ke
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
                
                $event->sheet->getDelegate()->getStyle('A2:G14')->applyFromArray([
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

    public function columnWidths(): array
    {
        return [
            'A' => 5,
        ];
    }
}