<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use App\Exports\MutasiMasukExport;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class MutasiMasukController extends Controller
{
    

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }
    

    public function getAllMutasiMasuk(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        $page = $request->page;
        $perPage = $request->perPage;
        $search = $request->search;
        $nama_siswa = $request->nama_siswa;
        $nis_siswa = $request->nis_siswa;
        $jenis_kelamin = $request->jenis_kelamin;
        $tgl_mutasi = $request->tgl_mutasi;
        $diterima_di_kelas = $request->diterima_di_kelas;
        $pindah_dari = $request->pindah_dari;
        $alasan_mutasi = $request->alasan_mutasi;
        $sort_by = $request->sort_by;
        $sort = $request->sort;
        $tgl_masuk_dari = $request->tgl_masuk_dari;
        $tgl_masuk_ke = $request->tgl_masuk_ke;

        $response = Http::get("{$this->api_url}/mutasi/siswa-masuk?page={$page}&perPage={$perPage}&search={$search}&nama_siswa={$nama_siswa}&nis_siswa={$nis_siswa}&jenis_kelamin={$jenis_kelamin}&tgl_mutasi={$tgl_mutasi}&diterima_di_kelas={$diterima_di_kelas}&pindah_dari={$pindah_dari}&alasan_mutasi={$alasan_mutasi}&sort_by={$sort_by}&sort={$sort}&tgl_masuk_dari={$tgl_masuk_dari}&tgl_masuk_ke={$tgl_masuk_ke}");


        if ($response->successful()) {
            
            if(json_decode($response)->data->rows == []) {

                return view('mutasi.siswa-masuk', [
                    'status' => 'Pencarian tidak ditemukan!',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'Data Siswa Masuk',
                    'active' => 'rekap-siswa'
                ]);

            } else {

                return view('mutasi.siswa-masuk', [
                    'mutasi' => json_decode($response)->data->rows,
                    'status' => 'success',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'Data Siswa Masuk',
                    'active' => 'rekap-siswa'
                ]);

            }


        } else {

            return view('mutasi.siswa-masuk', [
                'response' => $response,
                'status' => 'error',
                'title' => 'Data Siswa Mutasi Masuk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }

    }


    public function createMutasiMasuk() {

        abort_if(Gate::denies('manage-mutasi'), 403);

        $kelas = Http::get("{$this->api_url}/kelas?perPage=1000");

        $prevURL = URL::previous();

        return view('mutasi.create-mutasi-masuk', [
            'title' => 'Create Mutasi Masuk',
            'active' => 'rekap-siswa',
            'kelas' => json_decode($kelas)->data->rows,
            'prevURL' => $prevURL,
        ]);
    }


    public function storeMutasiMasuk(Request $request) {

        abort_if(Gate::denies('manage-mutasi'), 403);

        // validasi nis siswa jika sudah ada
        $nis = $request->nis_siswa;

        $siswaExist = Http::get("{$this->api_url}/siswa/{$nis}");

        if ($nis) {

            $message = json_decode($siswaExist)->message;
        
        } else {

            $message = json_decode($siswaExist);

        }



        if ($message == 'Displaying siswa with nis : '.$nis) {

            
            $response = Http::post("{$this->api_url}/mutasi", [
                'nis_siswa' => $request->nis_siswa,
                'nama_siswa' =>  $request->nama_siswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pindah_dari' => $request->pindah_dari,
                'diterima_di_kelas' => $request->diterima_di_kelas,
                'alasan_mutasi' => $request->alasan_mutasi,
                'tgl_mutasi' => $request->tgl_mutasi,
                'sk_mutasi' => $request->sk_mutasi
            ]);

            if ($response->successful()) {
                $user = Auth::user();

                Http::post("{$this->api_url}/history", [
                
                    'activityName' => 'Create Mutasi Masuk',
                    'activityAuthor' => "$user->nama",
                    'activityDesc' => "$user->nama membuat mutasi masuk dengan SK Mutasi : $request->sk_mutasi"
                
                ]);

                return redirect("{$request->prevURL}")->with('success', 'Mutasi created successfully.');
            } 

            if ($response->clientError()) {
                return redirect('/create-mutasi-masuk')->with('error-mutasi', 'Mutasi dengan NIS tersebut sudah terdaftar.');
            }


        } else {

            return redirect('/create-mutasi-masuk')->with('error', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }
    }


    public function editMutasiMasuk(Request $request, $id) {

        abort_if(Gate::denies('manage-alumni'), 403);

        $response = Http::get("{$this->api_url}/mutasi/{$id}");

        $prevURL = URL::previous();

        if ($response->successful()) {

            $kelas = Http::get("{$this->api_url}/kelas?perPage=1000");

            return view('mutasi.edit-mutasi-masuk', [
                'title' => 'Edit Mutasi Masuk',
                'active' => 'rekap-siswa',
                'mutasi' => json_decode($response)->result,
                'status' => 'success',
                'kelas' => json_decode($kelas)->data->rows,
                'prevURL' => $prevURL,
            ]);
        } else {
            return view('mutasi.edit-mutasi-masuk', [
                'title' => 'Edit Mutasi Masuk',
                'active' => 'rekap-siswa',
                'status' => 'error',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan.'
            ]);
        }
    }


    public function updateMutasiMasuk(Request $request, $id) {

        abort_if(Gate::denies('manage-alumni'), 403);

        // validasi nis siswa jika sudah ada
        $nis = $request->nis_siswa;

        $prevURL = URL::previous();

        $siswaExist = Http::get("{$this->api_url}/siswa/{$nis}");

        if ($nis) {

            $message = json_decode($siswaExist)->message;
        
        } else {

            $message = json_decode($siswaExist);

        }

        if ($message == 'Displaying siswa with nis : '.$nis) {
    
            $response = Http::put("{$this->api_url}/mutasi/{$id}", [
                'nis_siswa' => $request->nis_siswa,
                'nama_siswa' =>  $request->nama_siswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pindah_dari' => $request->pindah_dari,
                'diterima_di_kelas' => $request->diterima_di_kelas,
                'alasan_mutasi' => $request->alasan_mutasi,
                'tgl_mutasi' => $request->tgl_mutasi,
                'sk_mutasi' => $request->sk_mutasi
            ]);
    
            $response->throw();

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Update Mutasi Masuk',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengupdate mutasi masuk dengan SK Mutasi : $request->sk_mutasi"
            
            ]);

            return redirect("{$request->prevURL}")->with('success', 'Mutasi updated successfully.');
    
        } else {
            
            return redirect("/edit-mutasi-masuk/{$id}")->with('error', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }
    }


    public function deleteMutasiMasuk($id) {

        abort_if(Gate::denies('manage-mutasi'), 403);

        // validasi apakah id valid atau tidak
        $mutasiExist = Http::get("{$this->api_url}/mutasi/{$id}");

        $sk_mutasi = json_decode($mutasiExist)->result->sk_mutasi;

        if (json_decode($mutasiExist)->message) {

            Http::delete("{$this->api_url}/mutasi/{$id}");

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Delete Mutasi Masuk',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama menghapus data mutasi masuk dengan SK : $sk_mutasi"
            
            ]);

            return redirect('/siswa-masuk')->with('success', 'Mutasi deleted successfully.');

        } else {

            return redirect('/siswa-masuk', [
                'title' => 'Data Siswa Masuk',
                'active' => 'rekap-siswa',
                'status' => 'error',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan.'
            ]);

        }
    }


    public function exportMutasiMasukExcel(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        ob_end_clean();
        ob_start();

        $tgl_masuk_dari = $request->tgl_masuk_dari;
        $tgl_masuk_ke = $request->tgl_masuk_ke;
        

        $laporan = 'laporan_mutasi_masuk_'.$tgl_masuk_dari.'_'.$tgl_masuk_ke.'.xlsx';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Mutasi Masuk',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data mutasi masuk dengan tipe file excel."
        
        ]);

        return Excel::download(new MutasiMasukExport, $laporan);
        
    }


    
    public function exportMutasiMasukPDF(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        $tgl_masuk_dari = $request->tgl_masuk_dari;
        $masuk_dari = Carbon::parse($tgl_masuk_dari)->translatedFormat('F');
        $tgl_masuk_ke = $request->tgl_masuk_ke;
        $masuk_ke = Carbon::parse($tgl_masuk_ke)->translatedFormat('F');

        $response = Http::get("{$this->api_url}/mutasi/siswa-masuk?tgl_masuk_dari={$tgl_masuk_dari}&tgl_masuk_ke={$tgl_masuk_ke}");

        $pdf = PDF::loadView('mutasi.pdf.mutasi-masuk', [
            'mutasi' => json_decode($response)->data->rows,
            'tgl_masuk_dari' => $tgl_masuk_dari,
            'tgl_masuk_ke' => $tgl_masuk_ke,
            'masuk_dari' => $masuk_dari,
            'masuk_ke' => $masuk_ke
        ])->setPaper('A4_PLUS_PAPER', 'potrait');

        $laporan = 'laporan_mutasi_masuk_'.$tgl_masuk_dari.'_'.$tgl_masuk_ke.'.pdf';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Mutasi Masuk',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data mutasi masuk dengan tipe file PDF."
        
        ]);

        return $pdf->download($laporan);

    }


    public function printMutasiMasuk(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        $tgl_masuk_dari = $request->tgl_masuk_dari;
        $masuk_dari = Carbon::parse($tgl_masuk_dari)->translatedFormat('F');
        $tgl_masuk_ke = $request->tgl_masuk_ke;
        $masuk_ke = Carbon::parse($tgl_masuk_ke)->translatedFormat('F');

        $response = Http::get("{$this->api_url}/mutasi/siswa-masuk?tgl_masuk_dari={$tgl_masuk_dari}&tgl_masuk_ke={$tgl_masuk_ke}");

        return view('mutasi.pdf.mutasi-masuk', [
            'mutasi' => json_decode($response)->data->rows,
            'tgl_masuk_dari' => $tgl_masuk_dari,
            'tgl_masuk_ke' => $tgl_masuk_ke,
            'masuk_dari' => $masuk_dari,
            'masuk_ke' => $masuk_ke
        ]);

    }
}
