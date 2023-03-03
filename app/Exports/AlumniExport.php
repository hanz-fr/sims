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

        $page = $request->page;
        $perPage = $request->perPage;
        $search = $request->search;
        $nis_siswa = $request->nis_siswa;
        $nisn_siswa = $request->nisn_siswa;
        $nama_siswa = $request->nama_siswa;
        $jenis_kelamin = $request->jenis_kelamin;
        $KelasId = $request->KelasId;
        $sort_by = $request->sort_by;
        $sort = $request->sort;
        $dibuatTglDari = $request->dibuatTglDari;
        $dibuatTglKe = $request->dibuatTglKe;
        $angkatan = $request->angkatan;
        $jurusan = $request->jurusan;

        if(is_null($request->jurusan)) {
        
            $alumni = Http::get("{$this->url}/dashboard/alumni/all?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}&angkatan={$angkatan}");

        } else {

            $alumni = Http::get("{$this->url}/dashboard/alumni/get/{$jurusan}/{$angkatan}?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

        }

        return view('induk.pdf.alumni', [
            'alumni' => json_decode($alumni)->data->rows,
            'angkatan' => $angkatan,
        ]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                // merge cells
                $event->sheet->getDelegate()
                ->mergeCells('A1:G1')
                ->mergeCells('A2:G2')
                ->mergeCells('A3:G3');


                // set alignment
                $event->sheet
                    ->getDelegate()
                    ->getStyle("A1:G{$event->sheet->getHighestRow()}")
                    ->getAlignment()
                    ->setWrapText(true)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER_CONTINUOUS);


                // set borders to table
                $event->sheet
                    ->getDelegate()
                    ->getStyle("A7:G{$event->sheet->getHighestRow()}")
                    ->applyFromArray([
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
