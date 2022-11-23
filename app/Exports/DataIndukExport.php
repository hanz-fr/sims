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

class DataIndukExport implements FromView, ShouldAutoSize, WithEvents
{

    use Exportable;

    public function __construct()
    {

        $this->url = 'https://d197-103-139-10-189.ngrok.io';
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        
        $request = request();

        $siswa = Http::get("{$this->url}/siswa/{$request->jurusan}/{$request->kelas}??page=1&perPage=100");
        
        return view('induk.pdf.data-induk', [
            'siswa' => json_decode($siswa)->data->rows,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas
        ]);

    }

            /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:F1');
                $event->sheet->getDelegate()->getStyle('A1')
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);
                
                $event->sheet->getDelegate()->getStyle('A2:F102')->applyFromArray([
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