<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\AlumniExport;
use App\Exports\DataIndukExport;
use App\Exports\RekapNilaiExport;
use App\Exports\JumlahSiswaExport;
use App\Exports\MutasiMasukExport;
use App\Exports\MutasiKeluarExport;
use Illuminate\Support\Facades\URL;
use App\Exports\DataTidakNaikExport;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DetailDataIndukExport;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = 'https://d198-103-139-10-32.ngrok.io'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* API DASHBOARD */

    public function mainDashboard() 
    {
        $response = Http::get("{$this->api_url}/dashboard");
        
        if ($response->successful()) {

            return view('dashboard-main', [
                'title' => 'Dashboard',
                'active' => 'dashboard-main',
                'mutasi' => json_decode($response)->mutasi->count,
                'kelas' => json_decode($response)->kelas->count,
                'siswa' => json_decode($response)->siswa->count,
                'mapel' => json_decode($response)->mapel->count,
                'jurusan' => json_decode($response)->jurusan->count,
                'alumni' => json_decode($response)->alumni->count,
                'siswaMasuk' => json_decode($response)->siswaMasuk->count,
                'siswaKeluar' => json_decode($response)->siswaKeluar->count,
                'siswaTdkNaik' => json_decode($response)->siswaTdkNaik->count,
                'jumlahSiswaX' =>  json_decode($response)->jumlahSiswaX->count,
                'jumlahSiswaXI' =>  json_decode($response)->jumlahSiswaXI->count,
                'jumlahSiswaXII' =>  json_decode($response)->jumlahSiswaXII->count,
                'jumlahSiswaAKL' => json_decode($response)->jumlahSiswaAKL->count,
                'jumlahSiswaDKV' => json_decode($response)->jumlahSiswaDKV->count,
                'jumlahSiswaMPLB' => json_decode($response)->jumlahSiswaMPLB->count,
                'jumlahSiswaPM' => json_decode($response)->jumlahSiswaPM->count,
                'jumlahSiswaPPLG' => json_decode($response)->jumlahSiswaPPLG->count,
                'jumlahSiswaTJKT' => json_decode($response)->jumlahSiswaTJKT->count,
                'jumlahSiswaMLOG' => json_decode($response)->jumlahSiswaMLOG->count,
            ]);
        } else {
            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'Data Induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }

    public function rekapSiswaDashboard() {

        $response = Http::get("{$this->api_url}/dashboard");

        $current_date = Carbon::now()->toDateString();

        $current_date_parsed = Carbon::parse($current_date)->translatedFormat('l d F Y');

        $current_month = Carbon::now()->month;

        $current_year = Carbon::now()->year;


        /* ngl, this is probably the worst way */
        $akhirJanuari =  Carbon::createFromFormat('m/d/Y', "01/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirFebruari = Carbon::createFromFormat('m/d/Y', "02/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirMaret = Carbon::createFromFormat('m/d/Y', "03/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirApril = Carbon::createFromFormat('m/d/Y', "04/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirMei = Carbon::createFromFormat('m/d/Y', "05/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirJuni = Carbon::createFromFormat('m/d/Y', "06/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirJuli = Carbon::createFromFormat('m/d/Y', "07/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirAgustus = Carbon::createFromFormat('m/d/Y', "08/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirSeptember = Carbon::createFromFormat('m/d/Y', "09/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirOktober = Carbon::createFromFormat('m/d/Y', "10/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirNovember = Carbon::createFromFormat('m/d/Y', "11/01/$current_year")->lastOfMonth()->format('Y-m-d');
        $akhirDesember = Carbon::createFromFormat('m/d/Y', "12/01/$current_year")->lastOfMonth()->format('Y-m-d');


        $siswaMasukJanuari = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-01-01/{$akhirJanuari}");
        $siswaMasukFebruari = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-02-01/{$akhirFebruari}");
        $siswaMasukMaret = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-03-01/{$akhirMaret}");
        $siswaMasukApril = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-04-01/{$akhirApril}");
        $siswaMasukMei = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-05-01/{$akhirMei}");
        $siswaMasukJuni = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-06-01/{$akhirJuni}");
        $siswaMasukJuli = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-07-01/{$akhirJuli}");
        $siswaMasukAgustus = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-08-01/{$akhirAgustus}");
        $siswaMasukSeptember = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-09-01/{$akhirSeptember}");
        $siswaMasukOktober = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-10-01/{$akhirOktober}");
        $siswaMasukNovember = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-11-01/{$akhirNovember}");
        $siswaMasukDesember = Http::get("{$this->api_url}/dashboard/siswaMasukByMonth/get/{$current_year}-12-01/{$akhirDesember}");


        $siswaKeluarJanuari = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-01-01/{$akhirJanuari}");
        $siswaKeluarFebruari = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-02-01/{$akhirFebruari}");
        $siswaKeluarMaret = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-03-01/{$akhirMaret}");
        $siswaKeluarApril = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-04-01/{$akhirApril}");
        $siswaKeluarMei = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-05-01/{$akhirMei}");
        $siswaKeluarJuni = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-06-01/{$akhirJuni}");
        $siswaKeluarJuli = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-07-01/{$akhirJuli}");
        $siswaKeluarAgustus = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-08-01/{$akhirAgustus}");
        $siswaKeluarSeptember = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-09-01/{$akhirSeptember}");
        $siswaKeluarOktober = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-10-01/{$akhirOktober}");
        $siswaKeluarNovember = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-11-01/{$akhirNovember}");
        $siswaKeluarDesember = Http::get("{$this->api_url}/dashboard/siswaKeluarByMonth/get/{$current_year}-12-01/{$akhirDesember}");

        switch($current_month) {

            case(1): 
                $current_month = 'Januari';
                break;
            case(2): 
                $current_month = 'Februari';
                break;
            case(3): 
                $current_month = 'Maret';
                break;
            case(4): 
                $current_month = 'April';
                break;
            case(5): 
                $current_month = 'Mei';
                break;
            case(6): 
                $current_month = 'Juni';
                break;
            case(7): 
                $current_month = 'Juli';
                break;
            case(8): 
                $current_month = 'Agustus';
                break;
            case(9): 
                $current_month = 'September';
                break;
            case(10): 
                $current_month = 'Oktober';
                break;
            case(11): 
                $current_month = 'November';
                break;
            case(12): 
                $current_month = 'Desember';
                break;
            
            default:
                $current_month = 'Undefined';

        }

        if ($response->successful()) {

            return view('rekap-siswa.dashboard-rekap-siswa', [
                'title' => 'Rekap Siswa',
                'active' => 'rekap-siswa',
                'response' => $response,
                'siswaMasuk' => json_decode($response)->siswaMasuk->count,
                'siswaTdkNaik' =>  json_decode($response)->siswaTdkNaik->count,
                'jmlSiswa' => json_decode($response)->siswa->count,
                'siswaKeluar' => json_decode($response)->mutasi->count,
                'jumlahSiswaX' => json_decode($response)->jumlahSiswaX->count,
                'jumlahSiswaXI' => json_decode($response)->jumlahSiswaXI->count,
                'jumlahSiswaXII' => json_decode($response)->jumlahSiswaXII->count,
                'current_month' => $current_month,
                'current_year' => $current_year,
                'current_date' => $current_date,
                'current_date_parsed' => $current_date_parsed,

                /* SISWA MASUK */
                'siswaMasukJan' => json_decode($siswaMasukJanuari)->count ,
                'siswaMasukFeb' => json_decode($siswaMasukFebruari)->count ,
                'siswaMasukMar' => json_decode($siswaMasukMaret)->count ,
                'siswaMasukApr' => json_decode($siswaMasukApril)->count ,
                'siswaMasukMei' => json_decode($siswaMasukMei)->count ,
                'siswaMasukJun' => json_decode($siswaMasukJuni)->count ,
                'siswaMasukJul' => json_decode($siswaMasukJuli)->count ,
                'siswaMasukAgu' => json_decode($siswaMasukAgustus)->count ,
                'siswaMasukSep' => json_decode($siswaMasukSeptember)->count ,
                'siswaMasukOkt' => json_decode($siswaMasukOktober)->count ,
                'siswaMasukNov' => json_decode($siswaMasukNovember)->count ,
                'siswaMasukDes' => json_decode($siswaMasukDesember)->count ,

                /* SISWA KELUAR */
                'siswaKeluarJan' => json_decode($siswaKeluarJanuari)->count ,
                'siswaKeluarFeb' => json_decode($siswaKeluarFebruari)->count ,
                'siswaKeluarMar' => json_decode($siswaKeluarMaret)->count ,
                'siswaKeluarApr' => json_decode($siswaKeluarApril)->count ,
                'siswaKeluarMei' => json_decode($siswaKeluarMei)->count ,
                'siswaKeluarJun' => json_decode($siswaKeluarJuni)->count ,
                'siswaKeluarJul' => json_decode($siswaKeluarJuli)->count ,
                'siswaKeluarAgu' => json_decode($siswaKeluarAgustus)->count ,
                'siswaKeluarSep' => json_decode($siswaKeluarSeptember)->count ,
                'siswaKeluarOkt' => json_decode($siswaKeluarOktober)->count ,
                'siswaKeluarNov' => json_decode($siswaKeluarNovember)->count ,
                'siswaKeluarDes' => json_decode($siswaKeluarDesember)->count ,
            ]);

        } else {

            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'Data Induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }

    }


    public function viewHistory(Request $request) {

        $history = Http::get("{$this->api_url}/history");

        return view('history.index', [
            'title' => 'History',
            'active' => 'history',
            'history' => json_decode($history)->rows,
        ]);

    }


    public function viewHelpCenter(Request $request) {

        return view('userguide.index', [
            'title' => 'Help Center',
            'active' => 'sims-help',  
        ]);

    }

    public function viewGeneralHelp(Request $request) {

        return view('userguide.general.index', [
            'title' => 'Petunjuk Utama',
            'active' => 'sims-help',
        ]);

    }



    public function siswaTidakNaik(Request $request) {

        abort_if(Gate::allows('wali kelas'), 403);

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

    public function exportDataTidakNaikExcel(Request $request) {

        abort_if(Gate::allows('wali kelas'), 403);

        ob_end_clean();
        ob_start();

        $dibuatTglDari = $request->dibuatTglDari;
        $dibuatTglKe = $request->dibuatTglKe;

        $tidaknaik = 'daftar_nama_tidak_naik_'.date('Y-m-d_H-i-s').'.xlsx';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Data Tidak Naik',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data siswa tidak naik dengan tipe file excel."
        
        ]);

        return Excel::download(new DataTidakNaikExport, $tidaknaik);
        
    }

    public function exportDataTidakNaikPDF(Request $request) {

        abort_if(Gate::allows('wali kelas'), 403);

        $dibuatTglDari = $request->dibuatTglDari;
        $dibuatTglKe = $request->dibuatTglKe;

        $response = Http::get("{$this->api_url}/dashboard/siswa-tidak-naik?dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

        $tidaknaik = 'daftar_nama_tidak_naik_'.date('Y-m-d_H-i-s').'.xlsx';

        $pdf = PDF::loadView('rekap-siswa.pdf.tidak-naik', [
            'raport' => json_decode($response)->data->rows,
            'dibuatTglDari' => $request->dibuatTglDari,
            'dibuatTglKe' => $request->dibuatTglKe
        ])->setPaper('A4_PLUS_PAPER', 'potrait');

        $tidaknaik = 'data_tidak_naik_kelas_periode_'.$dibuatTglDari.'_'.$dibuatTglKe.'.pdf';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Data Tidak Naik',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data siswa tidak naik dengan tipe file PDF."
        
        ]);

        return $pdf->download($tidaknaik);
        
    }


    public function printDataTidakNaik(Request $request) {

        abort_if(Gate::allows('wali kelas'), 403);

        $dibuatTglDari = $request->dibuatTglDari;
        $dibuatTglKe = $request->dibuatTglKe;

        $response = Http::get("{$this->api_url}/dashboard/siswa-tidak-naik?dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

        $tidaknaik = 'daftar_nama_tidak_naik_'.$dibuatTglDari.'_'.$dibuatTglKe.'.xlsx';

        return view('rekap-siswa.pdf.tidak-naik', [
            'raport' => json_decode($response)->data->rows,
            'dibuatTglDari' => $request->dibuatTglDari,
            'dibuatTglKe' => $request->dibuatTglKe
        ]);
        
    }

    public function viewTambahNilaiMapel($nis) {

        abort_if(Gate::denies('rekap-nilai'), 403);

        $siswa = Http::get("{$this->api_url}/siswa/{$nis}");
        $jurusanSiswa = json_decode($siswa)->result->kelas->JurusanId;
        $kelas = Http::get("{$this->api_url}/kelas/siswa-per-kelas/all");
        $mapel = Http::get("{$this->api_url}/mapel-jurusan/get/by-jurusan/$jurusanSiswa"); // get mapel by jurusan siswa


        if ($nis) {

            $message = json_decode($siswa)->message;
        
        } else {

            $message = json_decode($siswa);

        }

        if ($message == 'Displaying siswa with nis : ' . $nis) {

            return view('rekap-nilai.add-rekap-nilai', [
                'title' => 'Tambah Rekap Nilai',
                'active' => 'data-induk',
                'siswa' =>  json_decode($siswa)->result,
                'mapel' => json_decode($mapel),
                'kelas' => json_decode($kelas)->result,
            ]); 

        } else {

            return redirect('/data-induk-siswa')->with('warning', 'Siswa dengan NIS tersebut tidak terdaftar.');
        }
    }


    public function editRekapNilai($RaportId) {

        abort_if(Gate::denies('rekap-nilai'), 403);

        $raport = Http::get("{$this->api_url}/raport/{$RaportId}");
        $nis_siswa = json_decode($raport)->result->nis_siswa;
        $siswa = Http::get("{$this->api_url}/siswa/{$nis_siswa}");
        $kelas = Http::get("{$this->api_url}/kelas/siswa-per-kelas/all");
        $jurusanSiswa = json_decode($siswa)->result->kelas->JurusanId;
        $mapel = Http::get("{$this->api_url}/mapel-jurusan/get/by-jurusan/$jurusanSiswa"); // get mapel by jurusan siswa

        if (isset(json_decode($raport)->status)) {
    
            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'Data Induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        } else {
            return view('rekap-nilai.edit-rekap-nilai', [
                'title' => 'Edit Rekap Nilai',
                'active' => 'data-induk',
                'siswa' =>  json_decode($siswa)->result,
                'mapel' => json_decode($mapel),
                'kelas' => json_decode($kelas)->result,
                'raport' => json_decode($raport)->result,
                'nilaiMapel' => json_decode($raport)->result->NilaiMapel,
            ]);
        }
    }

    
    public function storeUpdateNilaiMapel(Request $request) {

        abort_if(Gate::denies('rekap-nilai'), 403);

        $nis = $request->nis_siswa;

        $siswaExist = Http::get("{$this->api_url}/siswa/{$nis}");

        if ($nis) {

            $message = json_decode($siswaExist)->message;
        
        } else {

            $message = json_decode($siswaExist);

        }

        if ($message == 'Displaying siswa with nis : ' . $nis) {
        
            $isNaik = '';

            if ($request->isNaik == 'true') {

                $isNaik = true;

            } elseif($request->isNaik == 'false') {

                $isNaik = false;
            }

            $RaportId = 'RPT' . $request->nis_siswa . '-' . $request->semester;
            $idMapelJurusan = $request->idMapelJurusan;
            $nilai_pengetahuan = $request->nilai_pengetahuan;
            $nilai_keterampilan = $request->nilai_keterampilan;
            $kkm = $request->kkm;
            $nilai_us_teori = $request->nilai_us_teori;
            $nilai_us_praktek = $request->nilai_us_praktek;
            $nilai_ukk_teori = $request->nilai_ukk_teori;
            $nilai_ukk_praktek = $request->nilai_ukk_praktek;
            $nilai_akm = $request->nilai_akm;
            
    
            $response = Http::put("{$this->api_url}/raport/{$RaportId}", [
                'nis_siswa' => $request->nis_siswa,
                'semester' => (int)$request->semester,
                'thn_ajaran' => (int)$request->thn_ajaran,
                'sakit' => (int)$request->sakit,
                'ijin' => (int)$request->ijin,
                'alpa' => (int)$request->alpa,
                'isNaik' => $isNaik,
                'naikKelas' => $request->naikKelas,
                'tgl_kenaikan' => $request->tgl_kenaikan, 
                'tinggal_di_Kelas' => $request->tinggal_di_kelas,
                'alasan_tidak_naik' => $request->alasan_tidak_naik
            ]);
    
            if ($idMapelJurusan) {
                for ($i = 0; $i < count($idMapelJurusan); $i++) {
                    $idNM = 'NM'.$RaportId.'-'.$idMapelJurusan[$i];
                    $nilaiMapel = Http::put("{$this->api_url}/nilai-mapel/{$idNM}", [
                        'idMapelJurusan' => $idMapelJurusan[$i],
                        'RaportId' => $RaportId,
                        'nilai_pengetahuan' => (int)$nilai_pengetahuan[$i],
                        'nilai_keterampilan' => (int)$nilai_keterampilan[$i],
                        'nilai_us_teori' => (int)$nilai_us_teori[$i],
                        'nilai_us_praktek' => (int)$nilai_us_praktek[$i],
                        'nilai_ukk_teori' => (int)$nilai_ukk_teori[$i],
                        'nilai_ukk_praktek' => (int)$nilai_ukk_praktek[$i],
                    ]);
                }
            }
    
            $response->throw();
    
            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Update Rekap Nilai',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengupdate data rekap nilai dengan NIS : $request->nis_siswa"
            
            ]);

            return redirect('rekap-nilai/'.$request->nis_siswa)->with('success', 'Rekap nilai berhasil diupdate.');
        
        } else {

            return redirect('/tambah-nilai')->with('warning', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }


    }


    public function storeTambahNilaiMapel(Request $request) {

        abort_if(Gate::denies('wali kelas'), 403);

        $nis = $request->nis_siswa;

        $siswaExist = Http::get("{$this->api_url}/siswa/{$nis}");

        if ($nis) {

            $message = json_decode($siswaExist)->message;
        
        } else {

            $message = json_decode($siswaExist);

        }

        if ($message == 'Displaying siswa with nis : ' . $nis) {

            $isNaik = '';

            if ($request->isNaik == 'true') {

                $isNaik = true;

            } elseif($request->isNaik == 'false') {

                $isNaik = false;
            }

             
            $RaportId = 'RPT' . $request->nis_siswa . '-' . $request->semester;
            $idMapelJurusan = $request->idMapelJurusan;
            $nilai_pengetahuan = $request->nilai_pengetahuan;
            $nilai_keterampilan = $request->nilai_keterampilan;
            $kkm = $request->kkm;
            $nilai_us_teori = $request->nilai_us_teori;
            $nilai_us_praktek = $request->nilai_us_praktek;
            $nilai_ukk_teori = $request->nilai_ukk_teori;
            $nilai_ukk_praktek = $request->nilai_ukk_praktek;
            $nilai_akm = $request->nilai_akm;


            // RaportId check
            $getRaport = Http::get("{$this->api_url}/raport/$RaportId");

            if (json_decode($getRaport)->message == 'Displaying raport with id '.$RaportId) {
                
                return redirect(url()->previous())->with('warning', 'Raport dengan Id tersebut sudah terdaftar.');
            
            }

            $response = Http::post("{$this->api_url}/raport", [
                'nis_siswa' => $request->nis_siswa,
                'semester' => (int)$request->semester,
                'thn_ajaran' => (int)$request->thn_ajaran,
                'sakit' => (int)$request->sakit,
                'ijin' => (int)$request->ijin,
                'alpa' => (int)$request->alpa,
                'isNaik' => $isNaik,
                'naikKelas' => $request->naikKelas,
                'tgl_kenaikan' => $request->tgl_kenaikan, 
                'tinggal_di_Kelas' => $request->tinggal_di_kelas,
                'alasan_tidak_naik' => $request->alasan_tidak_naik
            ]);

            if ($idMapelJurusan) {
                for ($i = 0; $i < count($idMapelJurusan); $i++) {
                    $nilaiMapel = Http::post("{$this->api_url}/nilai-mapel", [
                        'idMapelJurusan' => $idMapelJurusan[$i],
                        'RaportId' => $RaportId,
                        'nilai_pengetahuan' => (int)$nilai_pengetahuan[$i],
                        'nilai_keterampilan' => (int)$nilai_keterampilan[$i],
                        'nilai_us_teori' => (int)$nilai_us_teori[$i],
                        'nilai_us_praktek' => (int)$nilai_us_praktek[$i],
                        'nilai_ukk_teori' => (int)$nilai_ukk_teori[$i],
                        'nilai_ukk_praktek' => (int)$nilai_ukk_praktek[$i],
                    ]);
                }
            }

            $response->throw();

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
            
                'activityName' => 'Create Rekap Nilai',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama menambah data rekap nilai dengan NIS : $request->nis_siswa"
            
            ]);

            return redirect('rekap-nilai/'.$request->nis_siswa)->with('success', 'Rekap nilai baru ditambahkan.');
        
        } else {
            
            return redirect('/tambah-nilai')->with('warning', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }
    }


    public function deleteNilaiMapel($RaportId) {

        abort_if(Gate::denies('wali kelas'), 403);

        Http::delete("{$this->api_url}/raport/{$RaportId}");

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Update Rekap Nilai',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama menghapus data rekap nilai dengan id : $RaportId"
        
        ]);

        return redirect()->back()->with('success', 'Rekap nilai berhasil dihapus.');

    }



    public function viewAlumni(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

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

        $response = Http::get("{$this->api_url}/dashboard/alumni/get?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

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


    public function exportAlumniPDF(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        $dibuatTglDari = $request->dibuatTglDari;
        $dibuatTglKe = $request->dibuatTglKe;

        $tahun_dari = Carbon::parse($dibuatTglDari)->translatedFormat('Y');
        $tahun_ke = Carbon::parse($dibuatTglDari)->translatedFormat('Y');

        $response = Http::get("{$this->api_url}/dashboard/alumni/get?dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

        $pdf = PDF::loadView('induk.pdf.alumni', [
            'alumni' => json_decode($response)->data->rows,
            'dibuatTglDari' => $tahun_dari,
            'dibuatTglKe' => $tahun_ke
        ])->setPaper('A4_PLUS_PAPER', 'potrait');

        $dataalumni = 'data_alumni_tahun_'.$tahun_dari.'-'.$tahun_ke.'.pdf';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Data Alumni',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data alumni dengan tipe file PDF."
        
        ]);

        return $pdf->download($dataalumni);

    }

    
    public function printAlumni(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        $dibuatTglDari = $request->dibuatTglDari;
        $dibuatTglKe = $request->dibuatTglKe;

        $tahun_dari = Carbon::parse($dibuatTglDari)->translatedFormat('Y');
        $tahun_ke = Carbon::parse($dibuatTglDari)->translatedFormat('Y');

        $response = Http::get("{$this->api_url}/dashboard/alumni/get?dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

        return view('induk.pdf.alumni', [
            'alumni' => json_decode($response)->data->rows,
            'dibuatTglDari' => $tahun_dari,
            'dibuatTglKe' => $tahun_ke
        ]);

    }


    public function exportAlumniExcel(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        ob_end_clean();
        ob_start();

        $dibuatTglDari = $request->dibuatTglDari;
        $dibuatTglKe = $request->dibuatTglKe;

        $tahun_dari = Carbon::parse($dibuatTglDari)->translatedFormat('Y');
        $tahun_ke = Carbon::parse($dibuatTglDari)->translatedFormat('Y');

        $dataalumni = 'data_alumni_tahun_'.$tahun_dari.'-'.$tahun_ke.'.xlsx';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Data Alumni',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data alumni dengan tipe file excel."
        
        ]);
        
        return Excel::download(new AlumniExport, $dataalumni);

    }


    /* API SISWA */

    public function getAllSiswa(Request $request)
    {

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

        $response = Http::get("{$this->api_url}/siswa?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");

        if ($response->successful()) {
            
            if(json_decode($response)->data->rows == []) {

                return view('induk.show-all', [
                    'status' => 'Pencarian tidak ditemukan!',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'Data Induk',
                    'active' => 'data-induk',
                ]);

            } else {


                return view('induk.show-all', [
                    'siswa' => json_decode($response)->data->rows,
                    'status' => 'success',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'Data Induk',
                    'active' => 'data-induk',
                ]);

            }


        } else {

            return view('induk.show-all', [
                'response' => $response,
                'status' => 'error',
                'title' => 'Data Induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }
    }

    public function getJurusan() {
        return view('induk.select-jurusan', [
            'title' => 'Pilih Jurusan',
            'active' => 'data-induk'
        ]);
    }

    public function getAngkatan(Request $request) {
        return view('induk.select-angkatan', [
            'title' => 'Pilih Angkatan',
            'active' => 'data-induk',
            'jurusan' => $request->jurusan
        ]);
    }


    public function getSiswaByJurusanKelas(Request $request) 
    {

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


        $response = Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}");


        if ($response->successful()) {
            
            if(json_decode($response)->data->rows == []) {
                
                return view('induk.show-all', [
                    'status' => 'Pencarian tidak ditemukan!',
                    'jurusan' => $request->jurusan,
                    'kelas' => $request->kelas,
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'Data Induk',
                    'active' => 'data-induk',
                ]);

            } else {

                return view('induk.show-all', [
                    'siswa' => json_decode($response)->data->rows,
                    'status' => 'success',
                    'jurusan' => $request->jurusan,
                    'kelas' => $request->kelas,
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'Data Induk',
                    'active' => 'data-induk',
                ]);

            }

            

        } else {

            return view('induk.show-all', [
                'response' => $response,
                'status' => 'error',
                'title' => 'Data Induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }

    }


    public function exportDataIndukPDF(Request $request) {

        abort_if(Gate::denies('tata usaha'), 403);

        $response = Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}??page=1&perPage=100");

        $pdf = PDF::loadView('induk.pdf.data-induk', [
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'siswa' => json_decode($response)->data->rows
        ])->setPaper('A4_PLUS_PAPER', 'potrait');

        $jurusan = $request->jurusan;
        $kelas = $request->kelas;

        $daftarnama = 'daftar_nama_buku_induk_'.$kelas.$jurusan.'.pdf';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
            'activityName' => 'Export Data Induk',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data induk dengan tipe file PDF."
        ]);

        return $pdf->download($daftarnama);

    }


    public function printDataInduk(Request $request) {

        abort_if(Gate::denies('tata usaha'), 403);

        $response = Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}??page=1&perPage=100");

        return view('induk.pdf.data-induk', [
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'siswa' => json_decode($response)->data->rows
        ]);

    }


    public function exportDataIndukExcel() {

        abort_if(Gate::denies('tata usaha'), 403);

        ob_end_clean();
        ob_start();

        $daftarnama = 'daftar_nama_buku_induk_'.date('Y-m-d_H-i-s').'.xlsx';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Data Induk',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data induk dengan tipe file excel."
        
        ]);

        return Excel::download(new DataIndukExport, $daftarnama);
        
    }

    public function exportDetailDataIndukExcel(Request $request) {

        abort_if(Gate::denies('tata usaha'), 403);

        ob_end_clean();
        ob_start();

        $detailsiswa = 'daftar_detail_nama_buku_induk_'.date('Y-m-d_H-i-s').'.xlsx';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Detail Data Induk',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport detail data induk dengan tipe file excel."
        
        ]);

        return Excel::download(new DetailDataIndukExport($request->nis), $detailsiswa);
        
    }


    public function getSiswa(Request $request)
    {

        $prevURL = URL::previous();

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");

        if ($response->successful()) {

            // Parse siswa birthdate
            $getSiswaBirthDate = json_decode($response)->result->tgl_lahir;
            $tgl_lahir_siswa = Carbon::parse($getSiswaBirthDate)->translatedFormat('l d F Y');
            
            // initialize variables for createdAt & updatedAt
            $createdAt = '';
            $updatedAt = '';

            // Parse createdAt & updatedAt
            if (! empty(json_decode($response)->result->createdAt)) {
                $createdAt = Carbon::parse(json_decode($response)->result->createdAt)->translatedFormat('l d F Y');
            }
            if (! empty(json_decode($response)->result->updatedAt)) {
                $updatedAt = Carbon::parse(json_decode($response)->result->updatedAt)->diffForHumans();
            }

            return view('induk.show-detail', [
                'title' => 'Data Siswa',
                'active' => 'data-induk',
                'status' => 'success',
                'siswa' => json_decode($response)->result,
                'updatedAt' => $updatedAt,
                'createdAt' => $createdAt,
                'tgl_lahir_siswa' => $tgl_lahir_siswa,
                'prevURL' => $prevURL
            ]);
        } else {

            return view('induk.show-detail', [
                'title' => 'Data Siswa',
                'active' => 'data-induk',
                'status' => 'error',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }
    }


    public function getRaportSiswa(Request $request) {

        abort_if(Gate::allows('kesiswaan'), 403);

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");


        if ($response->successful()) {
            
            return view('rekap-nilai.show-rekap-nilai', [
                'title' => 'Rekap Nilai',
                'active' => 'data-induk',
                'status' => 'success',
                'siswa' => json_decode($response)->result,
            ]);

        } else {

            return view('induk.show-detail', [
                'title' => 'Data Siswa',
                'active' => 'data-induk',
                'status' => 'error',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }
    }


    public function printRekapNilai(Request $request) {

        abort_if(Gate::allows('kesiswaan'), 403);

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");
        $nis = json_decode($response)->result->nis_siswa;
        $jurusanSiswa = json_decode($response)->result->kelas->JurusanId;
        $mapel = Http::get("{$this->api_url}/mapel-jurusan/get/by-jurusan/$jurusanSiswa");
        
        $raportId = "RPT{$nis}";

        $raport01 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-1");
        $raport02 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-2");
        $raport03 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-3");
        $raport04 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-4");
        $raport05 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-5");
        $raport06 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-6");

        /* return json_decode($raport01)->rows; */



        return view('rekap-nilai.pdf.rekap-nilai', [
            'siswa' => json_decode($response)->result,
            'mapel' => json_decode($mapel),
            'raport01' => json_decode($raport01)->rows,
            'raport02' => json_decode($raport02)->rows,
            'raport03' => json_decode($raport03)->rows,
            'raport04' => json_decode($raport04)->rows,
            'raport05' => json_decode($raport05)->rows,
            'raport06' => json_decode($raport06)->rows,
        ]);

    }

    public function exportRekapNilaiPDF(Request $request) {

        abort_if(Gate::allows('kesiswaan'), 403);

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");
        $nis = json_decode($response)->result->nis_siswa;
        $jurusanSiswa = json_decode($response)->result->kelas->JurusanId;
        $mapel = Http::get("{$this->api_url}/mapel-jurusan/get/by-jurusan/$jurusanSiswa");


        $raportId = "RPT{$nis}";

        $raport01 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-1");
        $raport02 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-2");
        $raport03 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-3");
        $raport04 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-4");
        $raport05 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-5");
        $raport06 = Http::get("{$this->api_url}/nilai-mapel/get-by/{$raportId}-6");

        /* return json_decode($raport01)->rows; */


        $pdf = PDF::loadView('rekap-nilai.pdf.rekap-nilai', [
            'siswa' => json_decode($response)->result,
            'raport1' => json_decode($response)->result->raport[0],
            'mapel' => json_decode($mapel),
            'raport01' => json_decode($raport01)->rows,
            'raport02' => json_decode($raport02)->rows,
            'raport03' => json_decode($raport03)->rows,
            'raport04' => json_decode($raport04)->rows,
            'raport05' => json_decode($raport05)->rows,
            'raport06' => json_decode($raport06)->rows,
        ])->setPaper('A4_PLUS_PAPER', 'landscape');

        $nama = json_decode($response)->result->nama_siswa;

        $rekapnilai = 'rekap_nilai_siswa_'.$nama.'.pdf';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Rekap Nilai',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data rekap nilai dengan tipe file PDF."
        
        ]);
        
        return $pdf->download($rekapnilai);

    }

    public function exportRekapNilaiExcel(Request $request) {

        abort_if(Gate::allows('kesiswaan'), 403);

        ob_end_clean();
        ob_start();

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");

        $nama = json_decode($response)->result->nama_siswa;

        $rekapnilai = 'rekap_nilai_siswa_'.$nama.'.xlsx';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Rekap Nilai',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data rekap nilai dengan tipe file excel."
        
        ]);

        return Excel::download(new RekapNilaiExport, $rekapnilai);

    }


    public function createSiswa()
    {

        abort_if(Gate::denies('tata usaha'), 403);
     
        $kelas = Http::get("{$this->api_url}/kelas");

        $prevURL = parse_url(url()->previous(), PHP_URL_PATH);
        $prevURLwithParams = URL::previous();

        return view('induk.create', [
            'title' => 'Create Siswa',
            'active' => 'data-induk',
            'kelas' => json_decode($kelas),
            'prevURL' => $prevURL,
            'prevURLwithParams' => $prevURLwithParams
        ]);
    }

    public function storeSiswa(Request $request)
    {
        
        abort_if(Gate::denies('tata usaha'), 403);

        // validasi nis siswa jika sudah ada
        $nis = $request->nis;


        $siswaExist = Http::get("{$this->api_url}/siswa/{$nis}");

        if ($nis) {

            $message = json_decode($siswaExist)->message;
        
        } else {

            $message = json_decode($siswaExist);

        }

        if ($request->isAlumni === "true") {

            $isAlumni = true;

        } else {

            $isAlumni = false;
        }


        if ($message == 'Displaying siswa with nis : ' . $nis) {

            return redirect('/tambah-data')->with('warning', 'Siswa dengan NIS tersebut sudah terdaftar.');
        
        } else {

            $request->validate([
                'nis' => 'required|max:10',
                'nisn' => 'required|max:10',
                'nama' => 'required|max:100',
            ]);


            $fileName = '';


            if ($file = $request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = uniqid() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/foto';
                $file->move($destinationPath, $fileName);
            }


            $response = Http::post("{$this->api_url}/siswa", [
                'nis_siswa' => $request->nis,
                'nisn_siswa' => $request->nisn,
                'nama_siswa' => $request->nama,
                'KelasId' =>  $request->diterima_di_kelas,
                'email_siswa' => $request->email,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'no_ijazah_smk' => $request->nomor_ijazah_smk,
                'no_ijazah_smp' => $request->nomor_ijazah_smp,
                'tgl_ijazah_smk' => $request->tanggal_ijazah_smk,
                'no_skhun_smp' => $request->nomor_skhun,
                'thn_skhun_smp' => $request->tahun_skhun,
                'thn_ijazah_smp' => $request->tahun_ijazah_smp,
                'tgl_diterima' => $request->tgl_masuk,
                'semester_diterima' => (int)$request->semester,
                'diterima_di_kelas' => $request->diterima_di_kelas,
                'alamat_siswa' => $request->alamat_siswa,
                'sekolah_asal' => $request->nama_sekolah_asal,
                'alamat_sekolah_asal' => $request->alamat_sekolah_asal,
                'anak_ke' => (int)$request->anak_ke,
                'status' => $request->status,
                'keterangan_lain' => $request->keterangan_lain,
                'no_telp_siswa' => $request->no_telp,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'alamat_ortu' => $request->alamat_ortu,
                'no_telp_ortu' => $request->no_telp_ortu,
                'email_ortu' =>  $request->email_ortu,
                'nama_wali' => $request->nama_wali,
                'alamat_wali' => $request->alamat_wali,
                'no_telp_wali' => $request->no_telp_wali,
                'pekerjaan_wali' => $request->pekerjaan_wali,
                'tgl_meninggalkan_sekolah' => $request->tgl_meninggalkan_sekolah,
                'alasan_meninggalkan_sekolah' => $request->alasan_meninggalkan_sekolah,
                'foto' => $fileName,
                'berat_badan' => (int)$request->berat_badan,
                'tinggi_badan' => (int)$request->tinggi_badan,
                'lingkar_kepala' => (int)$request->lingkar_kepala,
                'golongan_darah' => $request->golongan_darah,
                'tgl_masuk' => $request->tgl_masuk,
                'isAlumni' => $isAlumni,
            ]);


            $response->throw();

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
                'activityName' => 'Create Data Siswa',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama membuat data siswa baru dengan NIS : $request->nis"
            ]);

            return redirect($request->prevURLwithParams)->with('success', 'Data berhasil ditambahkan.');
        }
    }


    public function editSiswa($nis)
    {

        abort_if(Gate::denies('tata usaha'), 403);

        $prevURL = parse_url(url()->previous(), PHP_URL_PATH);
        $prevURLwithParams = URL::previous();

        $response = Http::get("{$this->api_url}/siswa/{$nis}");

        $kelas = Http::get("{$this->api_url}/kelas");

        if ($response->successful()) {
            return view('induk.edit', [
                'title' => 'Edit siswa',
                'active' => 'data-induk',
                'kelas' => json_decode($kelas),
                'siswa' => json_decode($response)->result,
                'status' => 'success',
                'prevURL' => $prevURL,
                'prevURLwithParams' => $prevURLwithParams
            ]);
        } else {
            return view('induk.edit', [
                'title' => 'Edit di',
                'active' => 'data-induk',
                'status' => 'error',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }


    public function updateSiswa(Request $request, $nis)
    {

        abort_if(Gate::denies('tata usaha'), 403);

        if ($request->file('foto')) {
            if ($file = $request->hasFile('foto')) {

                if ($request->oldImage) {
                    File::delete('foto/' . $request->oldImage);
                }

                $file = $request->file('foto');
                $fileName = uniqid() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/foto';
                $file->move($destinationPath, $fileName);
            }
        } else {
            $fileName = $request->oldImage;
        }

        $isAlumni = filter_var($request->isAlumni, FILTER_VALIDATE_BOOLEAN);

        $response = Http::put("{$this->api_url}/siswa/{$nis}", [
            'nis_siswa' => $request->nis,
            'nisn_siswa' => $request->nisn,
            'nama_siswa' => $request->nama,
            'KelasId' =>  $request->diterima_di_kelas,
            'email_siswa' => $request->email,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'no_ijazah_smk' => $request->nomor_ijazah_smk,
            'no_ijazah_smp' => $request->nomor_ijazah_smp,
            'tgl_ijazah_smk' => $request->tanggal_ijazah_smk,
            'no_skhun_smp' => $request->nomor_skhun,
            'thn_skhun_smp' => $request->tahun_skhun,
            'thn_ijazah_smp' => $request->tahun_ijazah_smp,
            'tgl_diterima' => $request->tgl_masuk,
            'semester_diterima' => (int)$request->semester,
            'diterima_di_kelas' => $request->diterima_di_kelas,
            'alamat_siswa' => $request->alamat_siswa,
            'sekolah_asal' => $request->nama_sekolah_asal,
            'alamat_sekolah_asal' => $request->alamat_sekolah_asal,
            'anak_ke' => (int)$request->anak_ke,
            'status' => $request->status,
            'keterangan_lain' => $request->keterangan_lain,
            'no_telp_siswa' => $request->no_telp,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'alamat_ortu' => $request->alamat_ortu,
            'no_telp_ortu' => $request->no_telp_ortu,
            'email_ortu' =>  $request->email_ortu,
            'nama_wali' => $request->nama_wali,
            'alamat_wali' => $request->alamat_wali,
            'no_telp_wali' => $request->no_telp_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'tgl_meninggalkan_sekolah' => $request->tgl_meninggalkan_sekolah,
            'alasan_meninggalkan_sekolah' => $request->alasan_meninggalkan_sekolah,
            'foto' => $fileName,
            'berat_badan' => (int)$request->berat_badan,
            'tinggi_badan' => (int)$request->tinggi_badan,
            'lingkar_kepala' => (int)$request->lingkar_kepala,
            'golongan_darah' => $request->golongan_darah,
            'isAlumni' => $isAlumni,
        ]);

        $response->throw();

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
            'activityName' => 'Update Data Siswa',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengupdate data siswa dengan NIS : $request->nis"
        ]);

        return redirect("{$request->prevURLwithParams}")->with('success', 'Data berhasil diubah.');

    }

    public function deleteSiswa(Request $request, $nis)
    {

        abort_if(Gate::denies('tata usaha'), 403);

        /* Delete foto siswa jika memiliki foto */
        $siswa = Http::get("{$this->api_url}/siswa/{$nis}"); // get siswa with current nis
        $fotoSiswa = json_decode($siswa)->result->foto;


        if ($fotoSiswa) {
            File::delete('foto/' . $fotoSiswa);
        }

        /* Delete siswa sesuai dengan nis yang direquest */
        Http::delete("{$this->api_url}/siswa/{$nis}");

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
            'activityName' => 'Delete Data Siswa',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama menghapus data siswa dengan NIS : $request->nis"
        ]);

        return redirect("{$request->prevURLwithParams}")->with('success', 'Siswa berhasil dihapus.');
    }


    public function importDataSiswa(Request $request) {

        abort_if(Gate::denies('tata usaha'), 403);
        
        $this->validate($request, [
            'uploaded_file' => 'required|file|mimes:xls,xlsx'
        ]);

        $the_file = $request->file('uploaded_file');


        try{
            $spreadsheet  = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 2, $row_limit );
            $column_range = range( 'AQ', $column_limit );
            $startcount   = 2;
            
            foreach ( $row_range as $row ) {
                $response = Http::post("{$this->api_url}/siswa", [
                    'nis_siswa'                   => $sheet->getCell( 'A' . $row )->getValue(),
                    'nisn_siswa'                  => $sheet->getCell( 'B' . $row )->getValue(),
                    'nama_siswa'                  => $sheet->getCell( 'C' . $row )->getValue(),
                    'KelasId'                     => $sheet->getCell( 'D' . $row )->getValue(),
                    'email_siswa'                 => $sheet->getCell( 'E' . $row )->getValue(),
                    'tmp_lahir'                   => $sheet->getCell( 'F' . $row )->getValue(),
                    'tgl_lahir'                   => $sheet->getCell( 'G' . $row )->getValue(),
                    'jenis_kelamin'               => $sheet->getCell( 'H' . $row )->getValue(),
                    'agama'                       => $sheet->getCell( 'I' . $row )->getValue(),
                    'no_ijazah_smk'               => $sheet->getCell( 'J' . $row )->getValue(),
                    'no_ijazah_smp'               => $sheet->getCell( 'K' . $row )->getValue(),
                    'tgl_ijazah_smk'              => $sheet->getCell( 'L' . $row )->getValue(),
                    'no_skhun_smp'                => $sheet->getCell( 'M' . $row )->getValue(),
                    'thn_skhun_smp'               => $sheet->getCell( 'N' . $row )->getValue(),
                    'thn_ijazah_smp'              => $sheet->getCell( 'O' . $row )->getValue(),
                    'tgl_diterima'                => $sheet->getCell( 'P' . $row )->getValue(),
                    'semester_diterima'           => $sheet->getCell( 'Q' . $row )->getValue(),
                    'diterima_di_kelas'           => $sheet->getCell( 'R' . $row )->getValue(),
                    'alamat_siswa'                => $sheet->getCell( 'S' . $row )->getValue(),
                    'sekolah_asal'                => $sheet->getCell( 'T' . $row )->getValue(),
                    'alamat_sekolah_asal'         => $sheet->getCell( 'U' . $row )->getValue(),
                    'anak_ke'                     => $sheet->getCell( 'V' . $row )->getValue(),
                    'status'                      => $sheet->getCell( 'W' . $row )->getValue(),
                    'keterangan_lain'             => $sheet->getCell( 'X' . $row )->getValue(),
                    'no_telp_siswa'               => $sheet->getCell( 'Y' . $row )->getValue(),
                    'nama_ayah'                   => $sheet->getCell( 'Z' . $row )->getValue(),
                    'nama_ibu'                    => $sheet->getCell( 'AA' . $row )->getValue(),
                    'alamat_ortu'                 => $sheet->getCell( 'AB' . $row )->getValue(),
                    'no_telp_ortu'                => $sheet->getCell( 'AC' . $row )->getValue(),
                    'email_ortu'                  => $sheet->getCell( 'AD' . $row )->getValue(),
                    'nama_wali'                   => $sheet->getCell( 'AE' . $row )->getValue(),
                    'alamat_wali'                 => $sheet->getCell( 'AF' . $row )->getValue(),
                    'no_telp_wali'                => $sheet->getCell( 'AG' . $row )->getValue(),
                    'pekerjaan_wali'              => $sheet->getCell( 'AH' . $row )->getValue(),
                    'tgl_meninggalkan_sekolah'    => $sheet->getCell( 'AI' . $row )->getValue(),
                    'alasan_meninggalkan_sekolah' => $sheet->getCell( 'AJ' . $row )->getValue(),
                    'foto'                        => $sheet->getCell( 'AK' . $row )->getValue(),
                    'berat_badan'                 => $sheet->getCell( 'AL' . $row )->getValue(),
                    'tinggi_badan'                => $sheet->getCell( 'AM' . $row )->getValue(),
                    'lingkar_kepala'              => $sheet->getCell( 'AN' . $row )->getValue(),
                    'golongan_darah'              => $sheet->getCell( 'AO' . $row )->getValue(),
                    'tgl_masuk'                   => $sheet->getCell( 'AP' . $row )->getValue(),
                    'isAlumni'                    => $sheet->getCell( 'AQ' . $row )->getValue(),
                ]);
                $startcount++;
            }
            
            $response->throw();

            $user = Auth::user();

            Http::post("{$this->api_url}/history", [
                'activityName' => 'Import Data Siswa',
                'activityAuthor' => "$user->nama",
                'activityDesc' => "$user->nama mengimport data siswa dengan tipe file excel."
            ]);
            
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->with('error','There was a problem uploading the data!');
        }

        return back()->with('success','Great! Data has been successfully imported.');

    }


    public function exportDataSiswaPDF(Request $request) {

        abort_if(Gate::denies('tata usaha'), 403);

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");

        $getSiswaBirthDate = json_decode($response)->result->tgl_lahir;
        $tgl_lahir_siswa = Carbon::parse($getSiswaBirthDate)->translatedFormat('l d F Y');


        $pdf = PDF::loadView('induk.pdf.data-induk-detail', [
            'siswa' => json_decode($response)->result,
            'tgl_lahir_siswa' => $tgl_lahir_siswa,
        ])->setPaper('A4_PLUS_PAPER', 'potrait');

        $nama = json_decode($response)->result->nama_siswa;

        $datasiswa = 'data_induk_'.$nama.'.pdf';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
            'activityName' => 'Export Data Siswa',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data siswa dengan tipe file PDF."
        ]);

        return $pdf->download($datasiswa);

    }


    public function printDataSiswa(Request $request) {

        abort_if(Gate::denies('tata usaha'), 403);

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");

        $getSiswaBirthDate = json_decode($response)->result->tgl_lahir;
        $tgl_lahir_siswa = Carbon::parse($getSiswaBirthDate)->translatedFormat('l d F Y');

        return view('induk.pdf.data-induk-detail', [
            'siswa' => json_decode($response)->result,
            'tgl_lahir_siswa' => $tgl_lahir_siswa,
        ]);

    }


    /* API MUTASI */

    public function getAllMutasiKeluar(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);
        
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
                'title' => 'Data Siswa Keluar',
                'active' => 'rekap-siswa',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }
    }

    public function getAllMutasiMasuk(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

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
                'title' => 'Data Siswa Masuk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }

    }

    public function createMutasiKeluar() {

        abort_if(Gate::denies('kesiswaan'), 403);

        $kelas = Http::get("{$this->api_url}/kelas");

        $prevURL = URL::previous();

        return view('mutasi.create-mutasi-keluar', [
            'title' => 'Create Mutasi Keluar',
            'active' => 'rekap-siswa',
            'kelas' => json_decode($kelas),
            'prevURL' => $prevURL,
        ]);
    }


    public function createMutasiMasuk() {

        $kelas = Http::get("{$this->api_url}/kelas");

        $prevURL = URL::previous();

        return view('mutasi.create-mutasi-masuk', [
            'title' => 'Create Mutasi Masuk',
            'active' => 'rekap-siswa',
            'kelas' => json_decode($kelas),
            'prevURL' => $prevURL,
        ]);
    }


    public function storeMutasiKeluar(Request $request) {

        abort_if(Gate::denies('kesiswaan'), 403);

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


            if ($response->successful() || $response2->successfull()) {

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



    public function storeMutasiMasuk(Request $request) {

        abort_if(Gate::denies('kesiswaan'), 403);

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



    public function editMutasiKeluar(Request $request, $id) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        $response = Http::get("{$this->api_url}/mutasi/{$id}");

        $prevURL = URL::previous();

        if ($response->successful()) {

            $kelas = Http::get("{$this->api_url}/kelas");

            return view('mutasi.edit-mutasi-keluar', [
                'title' => 'Edit Mutasi Keluar',
                'active' => 'rekap-siswa',
                'mutasi' => json_decode($response)->result,
                'status' => 'success',
                'kelas' => json_decode($kelas),
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

    
    public function editMutasiMasuk(Request $request, $id) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        $response = Http::get("{$this->api_url}/mutasi/{$id}");

        $prevURL = URL::previous();

        if ($response->successful()) {

            $kelas = Http::get("{$this->api_url}/kelas");

            return view('mutasi.edit-mutasi-masuk', [
                'title' => 'Edit Mutasi Masuk',
                'active' => 'rekap-siswa',
                'mutasi' => json_decode($response)->result,
                'status' => 'success',
                'kelas' => json_decode($kelas),
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


    public function updateMutasiKeluar(Request $request, $id) {

        abort_if(Gate::denies('rekap-siswa'), 403);

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

    public function updateMutasiMasuk(Request $request, $id) {

        abort_if(Gate::denies('rekap-siswa'), 403);

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

    
    public function deleteMutasiKeluar($id) {

        abort_if(Gate::denies('kesiswaan'), 403);

        // validasi apakah id valid atau tidak
        $mutasiExist = Http::get("{$this->api_url}/mutasi/{$id}");

        $sk_mutasi = json_decode($mutasiExist)->sk_mutasi;

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

    public function deleteMutasiMasuk($id) {

        abort_if(Gate::denies('kesiswaan'), 403);

        // validasi apakah id valid atau tidak
        $mutasiExist = Http::get("{$this->api_url}/mutasi/{$id}");

        $sk_mutasi = json_decode($mutasiExist)->sk_mutasi;

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

        abort_if(Gate::denies('rekap-siswa'), 403);

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


    public function exportMutasiKeluarExcel(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        ob_end_clean();
        ob_start();

        $tgl_keluar_dari = $request->tgl_keluar_dari;
        $tgl_keluar_ke = $request->tgl_keluar_ke;

        $laporan = 'laporan_mutasi_keluar_'.$tgl_keluar_dari.'_'.$tgl_keluar_ke.'.xlsx';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Mutasi Keluar',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data mutasi keluar dengan tipe file excel."
        
        ]);

        return Excel::download(new MutasiKeluarExport, $laporan);
        
    }


    public function exportMutasiMasukPDF(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        $tgl_masuk_dari = $request->tgl_masuk_dari;
        $tgl_masuk_ke = $request->tgl_masuk_ke;

        $response = Http::get("{$this->api_url}/mutasi/siswa-masuk?tgl_masuk_dari={$tgl_masuk_dari}&tgl_masuk_ke={$tgl_masuk_ke}");

        $pdf = PDF::loadView('mutasi.pdf.mutasi-masuk', [
            'mutasi' => json_decode($response)->data->rows,
            'tgl_masuk_dari' => $request->tgl_masuk_dari,
            'tgl_masuk_ke' => $request->tgl_masuk_ke
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


    public function exportMutasiKeluarPDF(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        $tgl_keluar_dari = $request->tgl_keluar_dari;
        $tgl_keluar_ke = $request->tgl_keluar_ke;

        $response = Http::get("{$this->api_url}/mutasi/siswa-keluar?tgl_keluar_dari={$tgl_keluar_dari}&tgl_keluar_ke={$tgl_keluar_ke}");

        $pdf = PDF::loadView('mutasi.pdf.mutasi-keluar', [
            'mutasi' => json_decode($response)->data->rows,
            'tgl_keluar_dari' => $request->tgl_keluar_dari,
            'tgl_keluar_ke' => $request->tgl_keluar_ke
        ])->setPaper('A4_PLUS_PAPER', 'potrait');

        $laporan = 'laporan_mutasi_keluar_'.$tgl_keluar_dari.'_'.$tgl_keluar_ke.'.pdf';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Mutasi Keluar',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data mutasi keluar dengan tipe file PDF."
        
        ]);

        return $pdf->download($laporan);

    }


    public function printMutasiMasuk(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        $tgl_masuk_dari = $request->tgl_masuk_dari;
        $tgl_masuk_ke = $request->tgl_masuk_ke;

        $response = Http::get("{$this->api_url}/mutasi/siswa-masuk?tgl_masuk_dari={$tgl_masuk_dari}&tgl_masuk_ke={$tgl_masuk_ke}");

        return view('mutasi.pdf.mutasi-masuk', [
            'mutasi' => json_decode($response)->data->rows,
            'tgl_masuk_dari' => $request->tgl_masuk_dari,
            'tgl_masuk_ke' => $request->tgl_masuk_ke
        ]);

    }


    public function printMutasiKeluar(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        $tgl_keluar_dari = $request->tgl_keluar_dari;
        $tgl_keluar_ke = $request->tgl_keluar_ke;

        $response = Http::get("{$this->api_url}/mutasi/siswa-keluar?tgl_keluar_dari={$tgl_keluar_dari}&tgl_keluar_ke={$tgl_keluar_ke}");

        return view('mutasi.pdf.mutasi-keluar', [
            'mutasi' => json_decode($response)->data->rows,
            'tgl_keluar_dari' => $request->tgl_keluar_dari,
            'tgl_keluar_ke' => $request->tgl_keluar_ke
        ]);

    }


    public function rekapJumlahSiswa() {

        abort_if(Gate::allows('wali kelas'), 403);

        $semuaKelas = Http::get("{$this->api_url}/kelas/siswa-per-kelas/all");
        $kelas10 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/10");
        $kelas11 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/11");
        $kelas12 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/12");

        if ($semuaKelas->successful()) {

            return view('rekap-siswa.data-rekap-jumlah-siswa', [
                'title' => 'Data Rekap Siswa',
                'active' => 'rekap-siswa',
                'semua_kelas' => json_decode($semuaKelas)->result,
                'kelas10' => json_decode($kelas10)->result,
                'kelas11' => json_decode($kelas11)->result,
                'kelas12' => json_decode($kelas12)->result,
            ]);

        } else {

            return view('induk.show-all', [
                'response' => $semuaKelas,
                'status' => 'error',
                'title' => 'Data Induk',
                'active' => 'rekap-siswa',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }


    public function exportRekapJumlahPDF() {

        abort_if(Gate::allows('wali kelas'), 403);

        $semuaKelas = Http::get("{$this->api_url}/kelas/siswa-per-kelas/all");
        $kelas10 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/10");
        $kelas11 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/11");
        $kelas12 = Http::get("{$this->api_url}/kelas/siswa-per-kelas/12");

        $pdf = PDF::loadView('rekap-siswa.pdf.rekap-jumlah-siswa', [
            'semua_kelas' => json_decode($semuaKelas)->result,
            'kelas10' => json_decode($kelas10)->result,
            'kelas11' => json_decode($kelas11)->result,
            'kelas12' => json_decode($kelas12)->result
        ])->setPaper('A4_PLUS_PAPER', 'landscape');

        $datajumlah = 'data_rekap_jumlah_siswa_'.date('Y-m-d_H-i-s').'.pdf';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Rekap Jumlah Siswa',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data rekap jumlah siswa dengan tipe file PDF."
        
        ]);

        return $pdf->download($datajumlah);

    }
    
    
    public function printRekapJumlah() {

        abort_if(Gate::allows('wali kelas'), 403);

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

    
    public function exportRekapJumlahExcel() {

        abort_if(Gate::allows('wali kelas'), 403);

        ob_end_clean();
        ob_start();

        $datajumlah = 'data_rekap_jumlah_siswa_'.date('Y-m-d_H-i-s').'.xlsx';

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Export Rekap Jumlah Siswa',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama mengexport data rekap jumlah siswa dengan tipe file excel."
        
        ]);
        
        return Excel::download(new JumlahSiswaExport, $datajumlah);

    }


    /* API LIVESEARCH (TESTING) */
    public function indexLiveSearch(Request $request) 
    {
        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/siswa?page={$page}&perPage={$perPage}");

        return view('livesearch', [
            'title' => 'Live Search',
            'active' => 'livesearch',
            'siswa' => json_decode($response)->data->rows
        ]);
    }


    /* API FOR TESTING REQUEST */   
    public function getRequest(Request $request) 
    {
        return $request;
    }


    public function search(Request $request)
    {
        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/siswa?page={$page}&perPage={$perPage}");

        $output = "";
        $siswa = collect(json_decode($response)->data->rows)->where('nama_siswa','LIKE','%'.$request->search.'%')
        ->orWhere('alamat_siswa','LIKE','%'.$request->search.'%')
        ->orWhere('KelasId','LIKE','%'.$request->search.'%')
        ->get();

        foreach($siswa as $s)
        {
            $output.=
            '<tr>
            
            <td class="py-3"> '.$s->nis_siswa.' </td>
            <td class="py-3"> '.$s->nama_siswa.' </td>
            <td class="py-3"> '.$s->KelasId.' </td>

            </tr>';

        }

        return response($output);
    }

}
