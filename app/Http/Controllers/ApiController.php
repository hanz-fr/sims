<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\DataIndukExport;
use App\Exports\MutasiMasukExport;
use App\Exports\MutasiKeluarExport;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{

    /* GLOBAL VARIABLES */
    public function __construct()
    {
        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


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
                'jumlahSiswaX' =>  json_decode($response)->jumlahSiswaX->count,
                'jumlahSiswaXI' =>  json_decode($response)->jumlahSiswaXI->count,
                'jumlahSiswaXII' =>  json_decode($response)->jumlahSiswaXII->count,
                'jumlahSiswaAKL' => json_decode($response)->jumlahSiswaAKL->count,
                'jumlahSiswaDKV' => json_decode($response)->jumlahSiswaDKV->count,
                'jumlahSiswaMPLB' => json_decode($response)->jumlahSiswaMPLB->count,
                'jumlahSiswaPM' => json_decode($response)->jumlahSiswaPM->count,
                'jumlahSiswaPPLG' => json_decode($response)->jumlahSiswaPPLG->count,
                'jumlahSiswaTJKT' => json_decode($response)->jumlahSiswaTJKT->count,
            ]);
        } else {
            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'data-induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }

    public function rekapSiswaDashboard() {

        $response = Http::get("{$this->api_url}/dashboard");

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
                'jumlahSiswaXII' => json_decode($response)->jumlahSiswaXII->count
            ]);

        } else {

            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'data-induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }

    }

    public function siswaTidakNaik(Request $request) {

        abort_if(Gate::allows('wali kelas'), 403);

        $search = $request->search;
        $response = Http::get("{$this->api_url}/dashboard/siswa-tidak-naik?search={$search}");


        if ($response->successful()) {

            if(json_decode($response)->result->rows == []) {

                return view('rekap-siswa.data-tidak-naik', [
                    'title' => 'Data Tidak Naik Kelas',
                    'active' => 'data-induk',                
                ]);

            } else {

                return view('rekap-siswa.data-tidak-naik', [
                    'title' => 'Data Tidak Naik Kelas',
                    'active' => 'data-induk',
                    'siswa' => json_decode($response)->result->rows
                ]);

            }

        } else {

            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'data-induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }

    public function viewTambahNilaiMapel($nis) {

        abort_if(Gate::denies('wali kelas'), 403);

        $siswa = Http::get("{$this->api_url}/siswa/{$nis}");
        $jurusanSiswa = json_decode($siswa)->result->kelas->JurusanId;
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
            ]); 

        } else {

            return redirect('/data-induk-siswa')->with('warning', 'Siswa dengan NIS tersebut tidak terdaftar.');
        }
    }


    public function editRekapNilai($RaportId) {

        abort_if(Gate::denies('wali kelas'), 403);

        $raport = Http::get("{$this->api_url}/raport/{$RaportId}");
        $nis_siswa = json_decode($raport)->result->nis_siswa;
        $siswa = Http::get("{$this->api_url}/siswa/{$nis_siswa}");
        $jurusanSiswa = json_decode($siswa)->result->kelas->JurusanId;
        $mapel = Http::get("{$this->api_url}/mapel-jurusan/get/by-jurusan/$jurusanSiswa"); // get mapel by jurusan siswa

        if (isset(json_decode($raport)->status)) {
    
            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'data-induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        } else {
            return view('rekap-nilai.edit-rekap-nilai', [
                'title' => 'Edit Rekap Nilai',
                'active' => 'data-induk',
                'siswa' =>  json_decode($siswa)->result,
                'mapel' => json_decode($mapel),
                'raport' => json_decode($raport)->result,
                'nilaiMapel' => json_decode($raport)->result->NilaiMapel,
            ]);
        }
    }

    
    public function storeUpdateNilaiMapel(Request $request) {

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
                        'kkm' => (int)$kkm[$i],
                        'nilai_us_teori' => (int)$nilai_us_teori[$i],
                        'nilai_us_praktek' => (int)$nilai_us_praktek[$i],
                        'nilai_ukk_teori' => (int)$nilai_ukk_teori[$i],
                        'nilai_ukk_praktek' => (int)$nilai_ukk_praktek[$i],
                        'nilai_akm' => (int)$nilai_akm[$i],
                    ]);
                }
            }
    
            $response->throw();
    
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
                        'kkm' => (int)$kkm[$i],
                        'nilai_us_teori' => (int)$nilai_us_teori[$i],
                        'nilai_us_praktek' => (int)$nilai_us_praktek[$i],
                        'nilai_ukk_teori' => (int)$nilai_ukk_teori[$i],
                        'nilai_ukk_praktek' => (int)$nilai_ukk_praktek[$i],
                        'nilai_akm' => (int)$nilai_akm[$i],
                    ]);
                }
            }

            $response->throw();


            return redirect('rekap-nilai/'.$request->nis_siswa)->with('success', 'Rekap nilai baru ditambahkan.');
        
        } else {
            
            return redirect('/tambah-nilai')->with('warning', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }
    }


    public function deleteNilaiMapel($RaportId) {

        abort_if(Gate::denies('wali kelas'), 403);

        Http::delete("{$this->api_url}/raport/{$RaportId}");

        return redirect()->back()->with('success', 'Rekap nilai berhasil dihapus.');

    }



    public function viewAlumni(Request $request) {

        $search = $request->search;

        $response = Http::get("{$this->api_url}/dashboard/alumni/get?search={$search}");;

        if($response->successful()) {

            if (json_decode($response)->result == []) {

                return view('induk.show-alumni', [
                    'title' => 'Data Alumni',
                    'active' => 'data-induk',
                    'status' => 'error'
                ]);

            } else {

                return view('induk.show-alumni', [
                    'title' => 'Data Alumni',
                    'active' => 'data-induk',
                    'alumni' => json_decode($response)->result
                ]);

            }


        } else {
            return view('induk.show-all', [
                'status' => 'error',
                'title' => 'data-induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }

    // public function exportAlumniPDF() {

    //     $response = Http::get("{$this->api_url}/dashboard/alumni");

    //     $pdf = PDF::loadView('induk.pdf.alumni', [
    //         'alumni' => json_decode($response)->result
    //     ]);

    //     return $pdf->download('alumni.pdf');

    // }

    // public function printAlumni() {

    //     $response = Http::get("{$this->api_url}/");

    //     return view('induk.pdf.alumni', [
    //         'alumni' => json_decode($response)
    //     ]);

    // }


    /* API SISWA */

    public function getAllSiswa(Request $request)
    {

        $page = $request->page;
        $perPage = $request->perPage;
        $search = $request->search;

        $response = Http::get("{$this->api_url}/siswa?page={$page}&perPage={$perPage}&search={$search}");

        if ($response->successful()) {
            
            if(json_decode($response)->data->rows == []) {

                return view('induk.show-all', [
                    'status' => 'Pencarian tidak ditemukan!',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'data-induk',
                    'active' => 'data-induk',
                ]);

            } else {


                return view('induk.show-all', [
                    'siswa' => json_decode($response)->data->rows,
                    'status' => 'success',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'data-induk',
                    'active' => 'data-induk',
                ]);

            }


        } else {

            return view('induk.show-all', [
                'response' => $response,
                'status' => 'error',
                'title' => 'data-induk',
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

        $response = Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}?page={$page}&perPage={$perPage}&search={$search}");


        if ($response->successful()) {
            
            if(json_decode($response)->data->rows == []) {
                
                return view('induk.show-all', [
                    'status' => 'Pencarian tidak ditemukan!',
                    'jurusan' => $request->jurusan,
                    'kelas' => $request->kelas,
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'title' => 'data-induk',
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
                    'title' => 'data-induk',
                    'active' => 'data-induk',
                ]);

            }

            

        } else {

            return view('induk.show-all', [
                'response' => $response,
                'status' => 'error',
                'title' => 'data-induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }

    }


    public function exportDataIndukPDF(Request $request) {

        $response = Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}??page=1&perPage=100");

        $pdf = PDF::loadView('induk.pdf.data-induk', [
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'siswa' => json_decode($response)->data->rows
        ]);

        $daftarnama = 'daftar_nama_buku_induk_'.date('Y-m-d_H-i-s').'.pdf';

        return $pdf->download($daftarnama);

    }


    public function printDataInduk(Request $request) {

        $response = Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}??page=1&perPage=100");

        return view('induk.pdf.data-induk', [
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'siswa' => json_decode($response)->data->rows
        ]);

    }


    public function exportDataIndukExcel() {

        ob_end_clean();
        ob_start();

        $daftarnama = 'daftar_nama_buku_induk_'.date('Y-m-d_H-i-s').'.xlsx';

        return Excel::download(new DataIndukExport, $daftarnama);
        
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
            

            return view('induk.show-detail', [
                'title' => 'Data Siswa',
                'active' => 'data-induk',
                'status' => 'success',
                'siswa' => json_decode($response)->result,
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

            return redirect($request->prevURLwithParams)->with('success', 'Data berhasil ditambahkan.');

            /* // klo url sebelumnya data-induk, bakal redirect ke data-induk lagi
            if($request->prevURL === "/data-induk"){

                return redirect('/data-induk-siswa?perPage=10')->with('success', 'Siswa created successfully.');

            // klo url nya selain data-induk, bakal redirect ke data-induk by jurusan
            } else {

                return redirect(Session('page_jurusan'))->with('success', 'Siswa created successfully.');
            } */
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

        return redirect("{$request->prevURLwithParams}")->with('success', 'Data berhasil diubah.');

        /* // klo url sebelumnya data-induk, bakal redirect ke data-induk lagi
        if($request->prevURL === "{$this->sims_url}/data-induk-siswa?perPage=10"){

            return redirect('/data-induk-siswa?perPage=10')->with('success', 'Siswa updated successfully.');
            
        // klo url nya selain data-induk, bakal redirect ke data-induk by jurusan
        } else {
            
            return redirect(Session('page_jurusan'))->with('success', 'Siswa updated successfully.');
        } */

    }

    public function deleteSiswa(Request $request, $nis)
    {

        /* Delete foto siswa jika memiliki foto */
        $siswa = Http::get("{$this->api_url}/siswa/{$nis}"); // get siswa with current nis
        $fotoSiswa = json_decode($siswa)->result->foto;


        if ($fotoSiswa) {
            File::delete('foto/' . $fotoSiswa);
        }

        /* Delete siswa sesuai dengan nis yang direquest */
        Http::delete("{$this->api_url}/siswa/{$nis}");

        return redirect("{$request->prevURLwithParams}")->with('success', 'Siswa berhasil dihapus.');

        /* // klo url sebelumnya data-induk, bakal redirect ke data-induk lagi
        if($request->prevURL === "{$this->sims_url}/data-induk-siswa?perPage=10"){

            return redirect('/data-induk-siswa?perPage=10')->with('success', 'Siswa deleted successfully.');
            
        // klo url nya selain data-induk, bakal redirect ke data-induk by jurusan
        } else {
            
            return redirect(Session('page_jurusan'))->with('success', 'Siswa deleted successfully.');
        } */
    }


    /* API MUTASI */

    public function getAllMutasiKeluar(Request $request) {

        abort_if(Gate::denies('rekap-siswa'), 403);
        
        $page = $request->page;
        $perPage = $request->perPage;
        $search = $request->search;

        $response = Http::get("{$this->api_url}/mutasi/siswa-keluar?page={$page}&perPage={$perPage}&search={$search}");

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

        $response = Http::get("{$this->api_url}/mutasi/siswa-masuk?page={$page}&perPage={$perPage}&search={$search}");


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

        abort_if(Gate::denies('rekap-siswa'), 403);

        $kelas = Http::get("{$this->api_url}/kelas");

        return view('mutasi.create-mutasi-keluar', [
            'title' => 'Create Mutasi Keluar',
            'active' => 'rekap-siswa',
            'kelas' => json_decode($kelas),
        ]);
    }


    public function createMutasiMasuk() {

        $kelas = Http::get("{$this->api_url}/kelas");

        return view('mutasi.create-mutasi-masuk', [
            'title' => 'Create Mutasi Masuk',
            'active' => 'rekap-siswa',
            'kelas' => json_decode($kelas),
        ]);
    }


    public function storeMutasiKeluar(Request $request) {

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

            if ($response->successful()) {
                return redirect('/siswa-keluar')->with('success', 'Mutasi created successfully.');
            } 

            if ($response->clientError()) {
                return redirect('/create-mutasi-keluar')->with('error-mutasi', 'Mutasi dengan NIS tersebut sudah terdaftar.');
            }


        } else {

            return redirect('/create-mutasi-keluar')->with('error', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }

    }



    public function storeMutasiMasuk(Request $request) {

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
                return redirect('/siswa-masuk')->with('success', 'Mutasi created successfully.');
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

        if ($response->successful()) {

            $kelas = Http::get("{$this->api_url}/kelas");

            return view('mutasi.edit-mutasi-keluar', [
                'title' => 'Edit Mutasi Keluar',
                'active' => 'rekap-siswa',
                'mutasi' => json_decode($response)->result,
                'status' => 'success',
                'kelas' => json_decode($kelas)
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

        if ($response->successful()) {

            $kelas = Http::get("{$this->api_url}/kelas");

            return view('mutasi.edit-mutasi-masuk', [
                'title' => 'Edit Mutasi Masuk',
                'active' => 'rekap-siswa',
                'mutasi' => json_decode($response)->result,
                'status' => 'success',
                'kelas' => json_decode($kelas)
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
    
            $response->throw();

            return redirect('/siswa-keluar')->with('success', 'Mutasi updated successfully.');
    
        } else {
            
            return redirect("/edit-mutasi/{$id}")->with('error', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }
    }

    public function updateMutasiMasuk(Request $request, $id) {

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
                'pindah_dari' => $request->pindah_dari,
                'diterima_di_kelas' => $request->diterima_di_kelas,
                'alasan_mutasi' => $request->alasan_mutasi,
                'tgl_mutasi' => $request->tgl_mutasi,
                'sk_mutasi' => $request->sk_mutasi
            ]);
    
            $response->throw();

            return redirect('/siswa-masuk')->with('success', 'Mutasi updated successfully.');
    
        } else {
            
            return redirect("/edit-mutasi-masuk/{$id}")->with('error', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }
    }

    
    public function deleteMutasiKeluar($id) {

        abort_if(Gate::denies('rekap-siswa'), 403);

        // validasi apakah id valid atau tidak
        $mutasiExist = Http::get("{$this->api_url}/mutasi/{$id}");

        if (json_decode($mutasiExist)->message) {

            Http::delete("{$this->api_url}/mutasi/{$id}");

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

        abort_if(Gate::denies('rekap-siswa'), 403);

        // validasi apakah id valid atau tidak
        $mutasiExist = Http::get("{$this->api_url}/mutasi/{$id}");

        if (json_decode($mutasiExist)->message) {

            Http::delete("{$this->api_url}/mutasi/{$id}");

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


    public function exportMutasiMasukExcel() {

        ob_end_clean();
        ob_start();

        $laporan = 'laporan_mutasi_masuk_'.date('Y-m-d_H-i-s').'.xlsx';

        return Excel::download(new MutasiMasukExport, $laporan);
        
    }


    public function exportMutasiKeluarExcel() {

        ob_end_clean();
        ob_start();

        $laporan = 'laporan_mutasi_keluar_'.date('Y-m-d_H-i-s').'.xlsx';

        return Excel::download(new MutasiKeluarExport, $laporan);
        
    }


    public function exportMutasiMasukPDF() {

        $response = Http::get("{$this->api_url}/mutasi/siswa-masuk");

        $pdf = PDF::loadView('mutasi.pdf.mutasi-masuk', [
            'mutasi' => json_decode($response)->data->rows
        ]);

        $laporan = 'laporan_mutasi_masuk_'.date('Y-m-d_H-i-s').'.pdf';

        return $pdf->download($laporan);

    }


    public function exportMutasiKeluarPDF() {

        $response = Http::get("{$this->api_url}/mutasi/siswa-keluar");

        $pdf = PDF::loadView('mutasi.pdf.mutasi-keluar', [
            'mutasi' => json_decode($response)->data->rows
        ]);

        $laporan = 'laporan_mutasi_keluar_'.date('Y-m-d_H-i-s').'.pdf';

        return $pdf->download($laporan);

    }


    public function printMutasiMasuk() {

        $response = Http::get("{$this->api_url}/mutasi/siswa-masuk");

        return view('mutasi.pdf.mutasi-masuk', [
            'mutasi' => json_decode($response)->data->rows
        ]);

    }


    public function printMutasiKeluar() {

        $response = Http::get("{$this->api_url}/mutasi/siswa-masuk");

        return view('mutasi.pdf.mutasi-keluar', [
            'mutasi' => json_decode($response)->data->rows
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
                'title' => 'data-induk',
                'active' => 'rekap-siswa',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
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
