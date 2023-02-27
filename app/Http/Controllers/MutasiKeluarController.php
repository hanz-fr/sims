<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use App\Exports\MutasiKeluarExport;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class MutasiKeluarController extends Controller
{
    

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* View All Mutasi Keluar */
    public function getAllMutasiKeluar(Request $request) {

        abort_if(Gate::denies('manage-mutasi'), 403);
        
        $page = $request->page;
        $perPage = $request->perPage;
        $search = $request->search;
        $nama_siswa = $request->nama_siswa;
        $nis_siswa = $request->nis_siswa;
        $keluar_di_kelas = $request->keluar_di_kelas;
        $tgl_mutasi = $request->tgl_mutasi;
        $sk_mutasi = $request->sk_mutasi;
        $alasan_mutasi = $request->alasan_mutasi;
        $sort_by = $request->sort_by;
        $sort = $request->sort;
        $tgl_keluar_dari = $request->tgl_keluar_dari;
        $tgl_keluar_ke = $request->tgl_keluar_ke;
    

        $response = Http::get("{$this->api_url}/mutasi/siswa-keluar?page={$page}&perPage={$perPage}&search={$search}&nama_siswa={$nama_siswa}&nis_siswa={$nis_siswa}&keluar_di_kelas={$keluar_di_kelas}&tgl_mutasi={$tgl_mutasi}&sk_mutasi={$sk_mutasi}&alasan_mutasi={$alasan_mutasi}&sort_by={$sort_by}&sort={$sort}&tgl_keluar_dari={$tgl_keluar_dari}&tgl_keluar_ke={$tgl_keluar_ke}");

        if ($response->successful()) {

            if (json_decode($response)->data->rows == []) {

                return view('mutasi.siswa-keluar', [
                    'status' => 'success',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'Data Siswa Keluar',
                    'active' => 'rekap-siswa'
                ]);

            } else {

                return view('mutasi.siswa-keluar', [
                    'mutasi' => json_decode($response)->data->rows,
                    'status' => 'success',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'Data Siswa Keluar',
                    'active' => 'rekap-siswa'
                ]);

            }


        } else {

            return view('mutasi.siswa-keluar', [
                'response' => $response,
                'status' => 'error',
                'title' => 'Data Siswa Mutasi Keluar',
                'active' => 'rekap-siswa',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }
    }


    /* Create Mutasi Keluar */
    public function createMutasiKeluar() {

        abort_if(Gate::denies('manage-mutasi'), 403);

        $kelas = Http::get("{$this->api_url}/kelas?perPage=1000");

        $prevURL = URL::previous();

        return view('mutasi.create-mutasi-keluar', [
            'title' => 'Create Mutasi Keluar',
            'active' => 'rekap-siswa',
            'kelas' => json_decode($kelas)->data->rows,
            'prevURL' => $prevURL,
        ]);
    }


    /* Store Mutasi Keluar */
    public function storeMutasiKeluar(Request $request) {

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
                'alasan_mutasi' => $request->alasan_mutasi,
                'keluar_di_kelas' => $request->keluar_di_kelas,
                'pindah_ke' => $request->pindah_ke,
                'tgl_mutasi' => $request->tgl_mutasi,
                'sk_mutasi' => $request->sk_mutasi
            ]);

            $response2 = Http::put("{$this->api_url}/siswa/{$nis}", [
                'tgl_meninggalkan_sekolah' => $request->tgl_mutasi,
                'alasan_meninggalkan_sekolah' => $request->alasan_mutasi, 
            ]);


            if ($response->successful() || $response2->successful()) {

                $user = Auth::user();

                Http::post("{$this->api_url}/history", [
                
                    'activityName' => 'Create Mutasi Keluar',
                    'activityAuthor' => "$user->nama",
                    'activityDesc' => "$user->nama membuat mutasi keluar dengan SK Mutasi : $request->sk_mutasi"
                
                ]);

                return redirect('/siswa-keluar')->with('success', 'Mutasi created successfully.');
            } 

            if ($response->clientError() || $response2->clientError()) {
                return redirect('/create-mutasi-keluar')->with('error-mutasi', 'Mutasi dengan NIS tersebut sudah terdaftar.');
            }


        } else {

            return redirect('/create-mutasi-keluar')->with('error', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }

    }


    /* Edit Mutasi Keluar */
    public function editMutasiKeluar(Request $request, $id) {

        abort_if(Gate::denies('manage-alumni'), 403);

        $response = Http::get("{$this->api_url}/mutasi/{$id}");

        $prevURL = URL::previous();

        if ($response->successful()) {

            $kelas = Http::get("{$this->api_url}/kelas?perPage=1000");

            return view('mutasi.edit-mutasi-keluar', [
                'title' => 'Edit Mutasi Keluar',
                'active' => 'rekap-siswa',
                'mutasi' => json_decode($response)->result,
                'status' => 'success',
                'kelas' => json_decode($kelas)->data->rows,
                'prevURL' => $prevURL,
            ]);
        } else {
            return view('mutasi.edit-mutasi-keluar', [
                'title' => 'Edit Mutasi Keluar',
                'active' => 'rekap-siswa',
                'status' => 'error',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan.'
            ]);
        }
    }


    /* Update Mutasi Keluar */
    public function updateMutasiKeluar(Request $request, $id) {

        abort_if(Gate::denies('manage-alumni'), 403);

        // validasi nis siswa jika sudah ada
        $nis = $request->nis_siswa;

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
                'alasan_mutasi' => $request->alasan_mutasi,
                'keluar_di_kelas' => $request->keluar_di_kelas,
                'pindah_ke' => $request->pindah_ke,
                'tgl_mutasi' => $request->tgl_mutasi,
                'sk_mutasi' => $request->sk_mutasi
            ]);

            $response2 = Http::put("{$this->api_url}/siswa/{$nis}", [
                'tgl_meninggalkan_sekolah' => $request->tgl_mutasi,
                'alasan_meninggalkan_sekolah' => $request->alasan_mutasi, 
            ]);
    
            $response->throw();

            $response2->throw();

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Update Mutasi Keluar',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengupdate mutasi keluar dengan SK Mutasi : $request->sk_mutasi"
            
            ]);

            return redirect("{$request->prevURL}")->with('success', 'Mutasi updated successfully.');
    
        } else {
            
            return redirect("/edit-mutasi/{$id}")->with('error', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }
    }

    
    /* Delete Mutasi Keluar */
    public function deleteMutasiKeluar($id) {

        abort_if(Gate::denies('manage-mutasi'), 403);

        // validasi apakah id valid atau tidak
        $mutasiExist = Http::get("{$this->api_url}/mutasi/{$id}");

        $sk_mutasi = json_decode($mutasiExist)->result->sk_mutasi;

        if (json_decode($mutasiExist)->message) {

            Http::delete("{$this->api_url}/mutasi/{$id}");

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Delete Mutasi Keluar',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama menghapus data mutasi keluar dengan SK : $sk_mutasi"
            
            ]);

            return redirect('/siswa-keluar')->with('success', 'Mutasi deleted successfully.');

        } else {

            return redirect('/siswa-keluar', [
                'title' => 'Data Siswa Keluar',
                'active' => 'rekap-siswa',
                'status' => 'error',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan.'
            ]);

        }
    }


    /* Export Mutasi Keluar Excel */
    public function exportMutasiKeluarExcel(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        ob_end_clean();
        ob_start();

        $tgl_keluar_dari = $request->tgl_keluar_dari;
        $tgl_keluar_ke = $request->tgl_keluar_ke;

        $laporan = 'laporan_mutasi_keluar_'.$tgl_keluar_dari.'_'.$tgl_keluar_ke.'.xlsx';

        try {
            
            return Excel::download(new MutasiKeluarExport, $laporan);

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Export Mutasi Keluar',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengexport data mutasi keluar dengan tipe file excel."
            
            ]);

        } catch (\Exception $e) {
            
            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

        }
        
    }


    /* Export Mutasi Keluar PDF */
    public function exportMutasiKeluarPDF(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        $tgl_keluar_dari = $request->tgl_keluar_dari;
        $keluar_dari = Carbon::parse($tgl_keluar_dari)->translatedFormat('F');
        $tgl_keluar_ke = $request->tgl_keluar_ke;
        $keluar_ke = Carbon::parse($tgl_keluar_ke)->translatedFormat('F');

        $response = Http::get("{$this->api_url}/mutasi/siswa-keluar?tgl_keluar_dari={$tgl_keluar_dari}&tgl_keluar_ke={$tgl_keluar_ke}");

        $pdf = PDF::loadView('mutasi.pdf.mutasi-keluar', [
            'mutasi' => json_decode($response)->data->rows,
            'tgl_keluar_dari' => $tgl_keluar_dari,
            'tgl_keluar_ke' => $tgl_keluar_ke,
            'keluar_dari' => $keluar_dari,
            'keluar_ke' => $keluar_ke
        ])->setPaper('A4_PLUS_PAPER', 'potrait');

        $laporan = 'laporan_mutasi_keluar_'.$tgl_keluar_dari.'_'.$tgl_keluar_ke.'.pdf';

        try {
            
            return $pdf->download($laporan);

            $user = Auth::user();
    
            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Export Mutasi Keluar',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengexport data mutasi keluar dengan tipe file PDF."
            
            ]);

        } catch (\Exception $e) {
            
            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

        }

    }


    public function printMutasiKeluar(Request $request) {

        abort_if(Gate::denies('manage-alumni'), 403);

        $tgl_keluar_dari = $request->tgl_keluar_dari;
        $keluar_dari = Carbon::parse($tgl_keluar_dari)->translatedFormat('F');
        $tgl_keluar_ke = $request->tgl_keluar_ke;
        $keluar_ke = Carbon::parse($tgl_keluar_ke)->translatedFormat('F');

        try {
            
            $response = Http::get("{$this->api_url}/mutasi/siswa-keluar?tgl_keluar_dari={$tgl_keluar_dari}&tgl_keluar_ke={$tgl_keluar_ke}");

            return view('mutasi.pdf.mutasi-keluar', [
                'mutasi' => json_decode($response)->data->rows,
                'tgl_keluar_dari' => $tgl_keluar_dari,
                'tgl_keluar_ke' => $tgl_keluar_ke,
                'keluar_dari' => $keluar_dari,
                'keluar_ke' => $keluar_ke
            ]);

        } catch (\Exception $e) {
            
            return back()->with('warning', 'Terjadi kesalahan, tidak dapat mengekspor data');

        }

    }
}
