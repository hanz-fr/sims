<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RekapNilaiExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class RekapNilaiController extends Controller
{
    

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
    }


    /* View Rekap Nilai */
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


    /* Print Rekap Nilai */
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


    /* Export Rekap Nilai PDF */
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


    /* Export Rekap Nilai Excel */
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
    

    /* Create Rekap Nilai */
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


    /* Edit Rekap Nilai */
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

    
    /* Update Rekap Nilai */
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

            } elseif($request->isNaik == 'null') {

                $isNaik = null;

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
                'activityDesc' => "$user->nama mengupdate data rekap nilai siswa dengan NIS : $request->nis_siswa"
            
            ]);

            return redirect('rekap-nilai/'.$request->nis_siswa)->with('success', 'Rekap nilai berhasil diupdate.');
        
        } else {

            return redirect('/tambah-nilai')->with('warning', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }


    }


    /* Store Rekap Nilai */
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

            } elseif($request->isNaik == 'null') {

                $isNaik = null;

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
                'activityDesc' => "$user->nama menambah data rekap nilai siswa dengan NIS : $request->nis_siswa"
            
            ]);

            return redirect('rekap-nilai/'.$request->nis_siswa)->with('success', 'Rekap nilai baru ditambahkan.');
        
        } else {
            
            return redirect('/tambah-nilai')->with('warning', 'Siswa dengan NIS tersebut tidak terdaftar.');

        }
    }


    /* Delete Rekap Nilai */
    public function deleteNilaiMapel($RaportId) {

        abort_if(Gate::denies('wali kelas'), 403);

        Http::delete("{$this->api_url}/raport/{$RaportId}");

        $user = Auth::user();

        Http::post("{$this->api_url}/history", [
        
            'activityName' => 'Delete Rekap Nilai',
            'activityAuthor' => "$user->nama",
            'activityDesc' => "$user->nama menghapus data rekap nilai dengan id : $RaportId"
        
        ]);

        return redirect()->back()->with('success', 'Rekap nilai berhasil dihapus.');

    }

}
