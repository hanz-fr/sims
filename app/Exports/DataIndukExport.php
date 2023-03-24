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

class DataIndukExport implements FromView, ShouldAutoSize, WithEvents, WithColumnWidths
{

    use Exportable;

    public function __construct()
    {

        $this->url = 'https://sims-api.vercel.app';
    }

    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        
        $request = request();

        $siswa = Http::get("{$this->url}/siswa/{$request->jurusan}/{$request->kelas}?page={$request->page}&perPage={$request->perPage}&search={$request->search}&nis_siswa={$request->nis_siswa}&nisn_siswa={$request->nisn_siswa}&nama_siswa={$request->nama_siswa}&jenis_kelamin={$request->jenis_kelamin}&KelasId={$request->KelasId}&sort_by={$request->sort_by}&sort={$request->sort}&dibuatTglDari={$request->dibuatTglDari}&dibuatTglKe={$request->dibuatTglKe}&thn_ajaran={$request->thn_ajaran}&angkatan={$request->angkatan}");
        
        return view('induk.pdf.data-induk', [
            'siswa'   => json_decode($siswa)->data->rows,
            'jurusan' => $request->jurusan,
            'kelas'   => $request->kelas
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
                $event->sheet->getDelegate()->mergeCells('A1:F1');


                // set alignment
                $event->sheet->getDelegate()->getStyle("A1:F{$event->sheet->getHighestRow()}")
                ->getAlignment()
                ->setWrapText(true)
                ->setVertical(Alignment::VERTICAL_CENTER)
                ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);
                

                // set borders to table
                $event->sheet->getDelegate()->getStyle("A2:F{$event->sheet->getHighestRow()}")->applyFromArray([
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