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

        $this->api_url = 'https://9976-103-139-10-36.ngrok.io';
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view() : View
    {
        
        $semuaKelas = Http::get("{$this->api_url}/kelas/siswa-per-kelas/all");
        $kelas10 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/10");
        $kelas11 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/11");
        $kelas12 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/12");

        return view('rekap-siswa.pdf.rekap-jumlah-siswa', [
            'semua_kelas' => json_decode($semuaKelas)->result,
            'kelas10' => json_decode($kelas10)->result,
            'kelas11' => json_decode($kelas11)->result,
            'kelas12' => json_decode($kelas12)->result
        ]);
    }

        /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:M1');
                $event->sheet->getDelegate()->getStyle('A1')
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);

                $event->sheet->getDelegate()->mergeCells('A3:M3');
                $event->sheet->getDelegate()->getStyle('A3')
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);

                $event->sheet->getDelegate()->mergeCells('A32:M32');
                $event->sheet->getDelegate()->getStyle('A32')
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);

                $event->sheet->getDelegate()->mergeCells('A61:M61');
                $event->sheet->getDelegate()->getStyle('A61')
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);

                $event->sheet->getDelegate()->mergeCells('A90:M90');
                $event->sheet->getDelegate()->getStyle('A90')
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);
                
                $event->sheet->getDelegate()->getStyle('A4:M30')->applyFromArray([
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
                
                $event->sheet->getDelegate()->getStyle('A33:M59')->applyFromArray([
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

                $event->sheet->getDelegate()->getStyle('A62:M88')->applyFromArray([
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

                $event->sheet->getDelegate()->getStyle('A91:M165')->applyFromArray([
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
