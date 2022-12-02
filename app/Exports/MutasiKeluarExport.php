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


class MutasiKeluarExport implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{

    use Exportable;

    private $mutasi;

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

        $sort_by = $request->sort_by;
        $sort = $request->sort;
        $tgl_keluar_dari = $request->tgl_keluar_dari;
        $tgl_keluar_ke = $request->tgl_keluar_ke;

        $mutasi = Http::get("{$this->url}/mutasi/siswa-keluar?sort_by={$sort_by}&sort={$sort}&tgl_keluar_dari={$tgl_keluar_dari}&tgl_keluar_ke={$tgl_keluar_ke}");

        return view('mutasi.pdf.mutasi-keluar', [
            'mutasi' => json_decode($mutasi)->data->rows,
            'tgl_keluar_dari' => $request->tgl_keluar_dari,
            'tgl_keluar_ke' => $request->tgl_keluar_ke
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

                
                $event->sheet->getDelegate()->getStyle('A2:G13')->applyFromArray([
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