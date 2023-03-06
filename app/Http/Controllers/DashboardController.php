<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* API DASHBOARD */
    public function mainDashboard() {
        
        $message = ''; // greetings message
        $user = User::findOrFail(Auth::id()); // current logged in user
        $current_year = Carbon::now()->year; // current year
        $kelas = ''; // kelas walikelas
        
        if ($user->role == 4) {

            $kelas = Http::get("{$this->api_url}/kelas/get-by-walkel/$user->nip");

            if(json_decode($kelas)->status === 'error') {
                $kelas = '';
            } else {
                $kelas = json_decode($kelas)->kelas;
            }

        }

        $response = Http::get("{$this->api_url}/dashboard");
        $allJurusan = Http::get("{$this->api_url}/jurusan");
        $userHistory = json_decode(Http::get("{$this->api_url}/history/$user->nama/all?year={$current_year}"));

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $message = "Selamat Pagi";
        } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "15") {
            $message = "Selamat Siang";
        } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "15" && $time < "18") {
            $message = "Selamat Sore";
        } else
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "18") {
            $message = "Selamat Malam";
        }

        if ($response->successful()) {

            return view('dashboard.main', [
                'title' => 'Dashboard',
                'active' => 'dashboard-main',
                'message' => $message,
                'status' => '',
                'userHistory' => $userHistory,
                'kelas_walikelas' => $kelas,
                'mutasi' => json_decode($response)->mutasi->count,
                'kelas' => json_decode($response)->kelas->count,
                'siswa' => json_decode($response)->siswa->count,
                'siswaJurusan' => json_decode($response)->siswa->rows,
                'mapel' => json_decode($response)->mapel->count,
                'jurusan' => json_decode($response)->jurusan->count,
                'allJurusan' => json_decode($allJurusan)->data->rows,
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


    /* ADMIN DASHBOARD */
    public function adminDashboard() {

        abort_if(Gate::denies('admin-only'), 403);

        $message = ''; // greetings message
        $user = User::findOrFail(Auth::id()); // current logged in user
        $users = User::all();
        $tatausaha = User::where('role', 1)->count();
        $kesiswaan = User::where('role', 2)->count();
        $kurikulum = User::where('role', 3)->count();
        $walikelas = User::where('role', 4)->count();
        $current_year = Carbon::now()->year; // current year

        $total_kelas = Http::get("{$this->api_url}/kelas");
        $total_mapel = Http::get("{$this->api_url}/mapel");
        $total_mapel_jurusan = Http::get("{$this->api_url}/mapel-jurusan");
        $total_kelas = Http::get("{$this->api_url}/kelas");
        $response = Http::get("{$this->api_url}/dashboard");
        $allJurusan = Http::get("{$this->api_url}/jurusan");
        $userHistory = json_decode(Http::get("{$this->api_url}/history/$user->nama/all?year={$current_year}"));
        $allHistory = json_decode(Http::get("{$this->api_url}/history?year={$current_year}&limit=4"))->rows;
        $totalActivityPerMonth = json_decode(Http::get("{$this->api_url}/history/count/perMonth?year={$current_year}"));

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $message = "Selamat Pagi";
        } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "15") {
            $message = "Selamat Siang";
        } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "15" && $time < "18") {
            $message = "Selamat Sore";
        } else
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "18") {
            $message = "Selamat Malam";
        }


        if ($response->successful()) {

            return view('dashboard.admin-main', [
                'title' => 'Dashboard',
                'active' => 'admin-dashboard',
                'message' => $message,
                'userHistory' => $userHistory,
                'current_year' => $current_year,
                'users' => $users,
                'tatausaha' => $tatausaha,
                'kesiswaan' => $kesiswaan,
                'kurikulum' => $kurikulum,
                'walikelas' => $walikelas,
                'allHistory' => $allHistory,
                'total_mapel_jurusan' => json_decode($total_mapel_jurusan)->data->count,
                'total_kelas' => json_decode($total_kelas)->data->count,
                'total_mapel' => json_decode($total_mapel)->data->count,
                'mutasi' => json_decode($response)->mutasi->count,
                'kelas' => json_decode($response)->kelas->count,
                'siswa' => json_decode($response)->siswa->count,
                'siswaJurusan' => json_decode($response)->siswa->rows,
                'mapel' => json_decode($response)->mapel->count,
                'jurusan' => json_decode($response)->jurusan->count,
                'allJurusan' => json_decode($allJurusan)->data->rows,
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
                'totalActivityJanuary' => $totalActivityPerMonth->january,
                'totalActivityFebruary' => $totalActivityPerMonth->february,
                'totalActivityMarch' => $totalActivityPerMonth->march,
                'totalActivityApril' => $totalActivityPerMonth->april,
                'totalActivityMay' => $totalActivityPerMonth->may,
                'totalActivityJune' => $totalActivityPerMonth->june,
                'totalActivityJuly' => $totalActivityPerMonth->july,
                'totalActivityAugust' => $totalActivityPerMonth->august,
                'totalActivitySeptember' => $totalActivityPerMonth->september,
                'totalActivityOctober' => $totalActivityPerMonth->october,
                'totalActivityNovember' => $totalActivityPerMonth->november,
                'totalActivityDecember' => $totalActivityPerMonth->december,
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


    /* REKAP SISWA DASHBOARD */
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


}
