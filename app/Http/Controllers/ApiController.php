<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{

    /* GLOBAL VARIABLES */
    public function __construct()
    {
        $this->api_url = 'https://05c0-114-79-49-73.ap.ngrok.io'; // Ganti link NGROK disini

    }

    /* API SISWA */

    public function getAllSiswa(Request $request)
    {

        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/siswa?page={$page}&perPage={$perPage}");

        if ($response->successful()) {
            
            return view('data-induk', [
                'siswa' => json_decode($response)->data->rows,
                'status' => 'success',
                'response' => json_decode($response),
                'total' => json_decode($response)->data->count,
                'title' => 'data-induk',
                'active' => 'data-induk',
            ]);

        } else {

            return view('data-induk', [
                'response' => $response,
                'status' => 'error',
                'title' => 'data-induk',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }
    }


    public function getSiswa(Request $request)
    {

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");

        if ($response->successful()) {
            $kelasSiswa = json_decode($response)->result->KelasId;

            $getKelasDetail = Http::get("{$this->api_url}/kelas/{$kelasSiswa}");
            $jurusanSiswa = json_decode($getKelasDetail)->result->jurusan;

            // Parse siswa birthdate
            $getSiswaBirthDate = json_decode($response)->result->tgl_lahir;
            $tgl_lahir_siswa = Carbon::parse($getSiswaBirthDate)->translatedFormat('l d F Y');
            
            return view('di-detail', [
                'title' => 'Data Siswa',
                'active' => 'detail-siswa',
                'status' => 'success',
                'siswa' => json_decode($response)->result,
                'jurusan_siswa' => $jurusanSiswa,
                'tgl_lahir_siswa' => $tgl_lahir_siswa
            ]);
        } else {
            return view('di-detail', [
                'title' => 'Data Siswa',
                'active' => 'detail-siswa',
                'status' => 'error',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }

    public function createSiswa()
    {

        $kelas = Http::get("{$this->api_url}/kelas");

        return view('input-di', [
            'title' => 'backend-test',
            'active' => 'backend-test',
            'kelas' => json_decode($kelas),
        ]);
    }

    public function storeSiswa(Request $request)
    {

        // validasi nis siswa jika sudah ada
        $nis = $request->nis;

        $siswaExist = Http::get("{$this->api_url}/siswa/{$nis}");

        if ($nis) {

            $message = json_decode($siswaExist)->message;
        
        } else {

            $message = json_decode($siswaExist);

        }


        if ($message == 'Displaying siswa with nis : ' . $nis) {

            return redirect('/tambah-data')->with('error', 'Siswa dengan NIS tersebut sudah terdaftar.');
        } else {

            $request->validate([
                'nis' => 'required|max:10',
                'nisn' => 'required|max:10',
                'nama' => 'required|max:100',
            ]);


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
                'KelasId' =>  $request->kelas,
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
                'berat_badan' => null,
                'tinggi_badan' => null,
                'lingkar_kepala' => null,
                'tgl_masuk' => null,
                'isAlumni' => false,
            ]);

            $response->throw();

            return redirect('/data-induk-siswa?perPage=10');
        }
    }


    public function editSiswa(Request $request, $nis)
    {

        $response = Http::get("{$this->api_url}/siswa/{$nis}");

        $kelas = Http::get("{$this->api_url}/kelas");

        if ($response->successful()) {
            return view('edit-di', [
                'title' => 'Edit siswa',
                'active' => 'edit-siswa',
                'kelas' => json_decode($kelas),
                'siswa' => json_decode($response)->result,
                'status' => 'success'
            ]);
        } else {
            return view('edit-di', [
                'title' => 'Edit di',
                'active' => 'edit-siswa',
                'status' => 'error',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);
        }
    }


    public function updateSiswa(Request $request, $nis)
    {

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



        $response = Http::put("{$this->api_url}/siswa/{$nis}", [
            'nis_siswa' => $request->nis,
            'nisn_siswa' => $request->nisn,
            'nama_siswa' => $request->nama,
            'KelasId' =>  $request->kelas,
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
            'berat_badan' => null,
            'tinggi_badan' => null,
            'lingkar_kepala' => null,
            'tgl_masuk' => null,
            'isAlumni' => false,
        ]);

        $response->throw();

        return redirect('/data-induk-siswa?perPage=10')->with('success', 'Siswa updated successfully.');
    }

    public function deleteSiswa($nis)
    {

        /* Delete foto siswa jika memiliki foto */
        $siswa = Http::get("{$this->api_url}/siswa/{$nis}"); // get siswa with current nis
        $fotoSiswa = json_decode($siswa)->result->foto;

        if ($fotoSiswa) {
            File::delete('foto/' . $fotoSiswa);
        }

        /* Delete siswa sesuai dengan nis yang direquest */
        Http::delete("{$this->api_url}/siswa/{$nis}");


        return redirect('/data-induk-siswa?perPage=10')->with('success', 'Siswa deleted successfully.');
    }


    /* API MUTASI */

    public function getAllMutasi(Request $request) {
        
        $page = $request->page;
        $perPage = $request->perPage;

        $response = Http::get("{$this->api_url}/mutasi?page={$page}&perPage={$perPage}");

        if ($response->successful()) {
            
            return view('siswa-keluar', [
                'mutasi' => json_decode($response)->data->rows,
                'status' => 'success',
                'response' => json_decode($response),
                'total' => json_decode($response)->data->count,
                'title' => 'Data Siswa Keluar',
                'active' => 'data-induk'
            ]);

        } else {

            return view('siswa-keluar', [
                'response' => $response,
                'status' => 'error',
                'title' => 'Data Siswa Keluar',
                'active' => 'data-induk',
                'message' => 'Halaman yang kamu cari tidak dapat ditemukan :('
            ]);

        }
    }

    // public function search(Request $request)
    // {
    //     $output = "";
    //     $anggota = Anggota::where('nama','LIKE','%'.$request->search.'%')->orwhere('alamat','LIKE','%'.$request->search.'%')->get();

    //     foreach($anggota as $a)
    //     {
    //         $output.=
    //         '<tr>
            
    //         <td class="py-3"> '.$a->nomor_kartu.' </td>
    //         <td class="py-3"> '.$a->nama.' </td>
    //         <td class="py-3"> '.$a->alamat.' </td>

    //         </tr>';

    //     }

    //     return response($output);
    // }

}
