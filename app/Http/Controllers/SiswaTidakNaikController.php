<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use App\Exports\DataTidakNaikExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class SiswaTidakNaikController extends Controller
{
    

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = 'https://sims-api.vercel.app'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* View All Siswa TIdak Naik */
    public function siswaTidakNaik(Request $request) {

        abort_if(Gate::allows('wali-kelas'), 403);

        $page = $request->page;
        $perPage = $request->perPage;
        $search = $request->search;
        $nama_siswa = $request->nama_siswa;
        $tinggal_di_Kelas = $request->tinggal_di_kelas;
        $alasan_tidak_naik = $request->alasan_tidak_naik;
        $tmp_lahir = $request->tmp_lahir;
        $tgl_lahir = $request->tgl_lahir;
        $sort_by = $request->sort_by;
        $sort = $request->sort;
        $dibuatTglDari = $request->dibuatTglDari;
        $dibuatTglKe = $request->dibuatTglKe;

        $response = Http::get("{$this->api_url}/dashboard/siswa-tidak-naik?page={$page}&perPage={$perPage}&search={$search}&nama_siswa={$nama_siswa}&tinggal_di_Kelas={$tinggal_di_Kelas}&alasan_tidak_naik={$alasan_tidak_naik}&tmp_lahir={$tmp_lahir}&tgl_lahir={$tgl_lahir}&sort={$sort}&sort_by={$sort_by}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");


        if ($response->successful()) {

            if(json_decode($response)->data->rows == []) {

                return view('rekap-siswa.data-tidak-naik', [
                    'title' => 'Data Tidak Naik Kelas',
                    'active' => 'data-induk',      
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,          
                ]);

            } else {

                return view('rekap-siswa.data-tidak-naik', [
                    'title' => 'Data Tidak Naik Kelas',
                    'active' => 'data-induk',
                    'raport' => json_decode($response)->data->rows,
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                ]);

            }

        } else {

            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'Data Induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }


    /* Export Data Tidak Naik Excel */
    public function exportDataTidakNaikExcel(Request $request) {

        abort_if(Gate::allows('wali-kelas'), 403);

        ob_end_clean();
        ob_start();

        $dibuatTglDari = $request->dibuatTglDari;
        $getDibuatTglDari = Carbon::parse($dibuatTglDari)->translatedFormat('F');
        $dibuatTglKe = $request->dibuatTglKe;
        $getDibuatTglKe = Carbon::parse($dibuatTglKe)->translatedFormat('F');

        $tidaknaik = 'daftar_nama_tidak_naik_'.$getDibuatTglDari.'_'.$getDibuatTglKe.'.xlsx';

        try {

            return Excel::download(new DataTidakNaikExport, $tidaknaik);

            $user = Auth::user();
    
            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Export Data Tidak Naik',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengexport data siswa tidak naik dengan tipe file excel."
            
            ]);

        } catch (\Exception) {

            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

        }
        
    }


    /* Export Data Tidak Naik PDF */
    public function exportDataTidakNaikPDF(Request $request) {

        abort_if(Gate::allows('wali-kelas'), 403);

        $dibuatTglDari = $request->dibuatTglDari;
        $getDibuatTglDari = Carbon::parse($dibuatTglDari)->translatedFormat('F');
        $dibuatTglKe = $request->dibuatTglKe;
        $getDibuatTglKe = Carbon::parse($dibuatTglKe)->translatedFormat('F');

        $response = Http::get("{$this->api_url}/dashboard/siswa-tidak-naik?dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

        try {

            $pdf = PDF::loadView('rekap-siswa.pdf.tidak-naik', [
                'raport' => json_decode($response)->data->rows,
                'dibuatTglDari' => $dibuatTglDari,
                'dibuatTglKe' => $dibuatTglKe,
                'TglDari' => $getDibuatTglDari,
                'TglKe' => $getDibuatTglKe            
            ])->setPaper('A4_PLUS_PAPER', 'potrait');
    
            $tidaknaik = 'data_tidak_naik_kelas_periode_'.$getDibuatTglDari.'_'.$getDibuatTglKe.'.pdf';
    
            return $pdf->download($tidaknaik);
    
            $user = Auth::user();
    
            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Export Data Tidak Naik',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengexport data siswa tidak naik dengan tipe file PDF."
            
            ]);

        } catch (\Exception) {

            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

        }
        
    }


    /* Print Data Tidak Naik */
    public function printDataTidakNaik(Request $request) {

        abort_if(Gate::allows('wali-kelas'), 403);

        $dibuatTglDari = $request->dibuatTglDari;
        $getDibuatTglDari = Carbon::parse($dibuatTglDari)->translatedFormat('F');
        $dibuatTglKe = $request->dibuatTglKe;
        $getDibuatTglKe = Carbon::parse($dibuatTglKe)->translatedFormat('F');

        $response = Http::get("{$this->api_url}/dashboard/siswa-tidak-naik?dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

        $tidaknaik = 'daftar_nama_tidak_naik_'.$dibuatTglDari.'_'.$dibuatTglKe.'.xlsx';

        try {

            return view('rekap-siswa.pdf.tidak-naik', [
                'raport' => json_decode($response)->data->rows,
                'dibuatTglDari' => $dibuatTglDari,
                'dibuatTglKe' => $dibuatTglKe,
                'TglDari' => $getDibuatTglDari,
                'TglKe' => $getDibuatTglKe   
            ]);

        } catch (\Exception) {

            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

        }
        
    }

    
}
