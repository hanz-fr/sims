<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use App\Exports\AlumniExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class AlumniController extends Controller
{
    

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* Select Jurusan */
    public function selectJurusanAlumni(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        $jurusan = Http::get("{$this->api_url}/jurusan?perPage=1000");

        return view('induk.select-jurusan-alumni', [
            'title' => 'Data Alumni',
            'active' => 'data-induk',
            'status' => 'error',
            'jurusan' => json_decode($jurusan)->data->rows,
        ]);
    }


    /* Select Angkatan */
    public function selectAngkatanAlumni(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        return view('induk.select-angkatan-alumni', [
            'title' => 'Data Alumni',
            'active' => 'data-induk',
            'status' => 'error',
        ]);
    }


    /* View Alumni */
    public function viewAlumni(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

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

            $response = Http::get("{$this->api_url}/dashboard/alumni/all?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}&angkatan={$angkatan}");


            if($response->successful()) {
    
                if (json_decode($response)->data->rows == []) {
    
                    return view('induk.show-alumni', [
                        'title' => 'Data Alumni',
                        'active' => 'data-induk',
                        'status' => 'error',
                        'response' => json_decode($response),
                        'total' => json_decode($response)->data->count,
                    ]);
    
                } else {
    
                    return view('induk.show-alumni', [
                        'title' => 'Data Alumni',
                        'active' => 'data-induk',
                        'alumni' => json_decode($response)->data->rows,
                        'response' => json_decode($response),
                        'total' => json_decode($response)->data->count,
                    ]);
    
                }
    
    
            } else {
                
                return view('induk.show-all', [
                    'status' => 'error',
                    'title' => 'Data Alumni',
                    'active' => 'data-induk',
                    'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
                ]);
                
            }

        } else {

            $response = Http::get("{$this->api_url}/dashboard/alumni/get/{$jurusan}/{$angkatan}?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");
    
    
            if($response->successful()) {
    
                if (json_decode($response)->data->rows == []) {
    
                    return view('induk.show-alumni', [
                        'title' => 'Data Alumni',
                        'active' => 'data-induk',
                        'status' => 'error',
                        'response' => json_decode($response),
                        'total' => json_decode($response)->data->count,
                    ]);
    
                } else {
    
                    return view('induk.show-alumni', [
                        'title' => 'Data Alumni',
                        'active' => 'data-induk',
                        'alumni' => json_decode($response)->data->rows,
                        'response' => json_decode($response),
                        'total' => json_decode($response)->data->count,
                    ]);
    
                }
    
    
            } else {

                return view('induk.show-all', [
                    'status' => 'error',
                    'title' => 'Data Alumni',
                    'active' => 'data-induk',
                    'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
                ]);

            }
        }
    }


    /* Export Alumni ke file PDF */
    public function exportAlumniPDF(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

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

            $response = Http::get("{$this->api_url}/dashboard/alumni/all?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}&angkatan={$angkatan}");

            try {

                $pdf = PDF::loadView('induk.pdf.alumni', [
                    'alumni' => json_decode($response)->data->rows,
                    'jurusan' => $jurusan,
                    'angkatan' => $angkatan,
                ])->setPaper('A4_PLUS_PAPER', 'potrait');
    
                $dataalumni = 'data_alumni_tahun_'.$angkatan.'.pdf';
    
                return $pdf->download($dataalumni);
    
                $user = Auth::user();
        
                Http::post("{$this->api_url}/history", [
                
                    'activityName' => 'Export Data Alumni',
                    'activityAuthor' => "$user->nama",
                    'activityDesc' => "$user->nama mengekspor data alumni dengan tipe file PDF."
                
                ]);
    
            } catch (\Exception) {
    
                return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');
            }
            
        } else {

            $response = Http::get("{$this->api_url}/dashboard/alumni/get/{$jurusan}/{$angkatan}?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");            $response = Http::get("{$this->api_url}/dashboard/alumni/get/{$jurusan}/{$angkatan}?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

            try {

                $pdf = PDF::loadView('induk.pdf.alumni', [
                    'alumni' => json_decode($response)->data->rows,
                    'jurusan' => $jurusan,
                    'angkatan' => $angkatan,
                ])->setPaper('A4_PLUS_PAPER', 'potrait');
    
                $dataalumni = 'data_alumni.pdf';
    
                return $pdf->download($dataalumni);
    
                $user = Auth::user();
        
                Http::post("{$this->api_url}/history", [
                
                    'activityName' => 'Export Data Alumni',
                    'activityAuthor' => "$user->nama",
                    'activityDesc' => "$user->nama mengekspor data alumni dengan tipe file PDF."
                
                ]);
    
            } catch (\Exception) {
    
                return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');
            }
        }

    }

    
    /* Print Data Alumni */
    public function printAlumni(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

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

            $response = Http::get("{$this->api_url}/dashboard/alumni/all?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}&angkatan={$angkatan}");

            try {

                return view('induk.pdf.alumni', [
                    'alumni' => json_decode($response)->data->rows,
                    'jurusan' => $jurusan,
                    'angkatan' => $angkatan,
                ]);
    
            } catch (\Exception) {
    
                return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

            }

        } else {

            $response = Http::get("{$this->api_url}/dashboard/alumni/get/{$jurusan}/{$angkatan}?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

            try {

                return view('induk.pdf.alumni', [
                    'alumni' => json_decode($response)->data->rows,
                    'jurusan' => $jurusan,
                    'angkatan' => $angkatan,
                ]);

            } catch (\Exception) {
    
                return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');
            }
        }

    }


    /* Export Alumni ke file Excel */
    public function exportAlumniExcel(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        ob_end_clean();
        ob_start();

        $angkatan = $request->angkatan;

        if ($angkatan) {

            $dataalumni = 'data_alumni_tahun_'.$angkatan.'.xlsx';
            
        } else {

            $dataalumni = 'data_alumni.xlsx';

        }

        try {

            return Excel::download(new AlumniExport, $dataalumni);

            $user = Auth::user();
            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Export Data Alumni',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengexport data alumni dengan tipe file excel."
            
            ]);

        } catch (\Exception) {

            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');
        }
        
    }
}
