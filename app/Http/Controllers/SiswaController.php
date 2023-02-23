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
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\User;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class SiswaController extends Controller
{

    /* GLOBAL VARIABLES */
    public function __construct()
    {

        $this->api_url = '127.0.0.1:3000'; // Ganti link NGROK disini


        $this->sims_url = 'http://127.0.0.1:8000'; // SIMS URL
    
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
        $thn_ajaran = $request->thn_ajaran;

        $response = Http::get("{$this->api_url}/siswa?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}&thn_ajaran={$thn_ajaran}"); 
        $total = json_decode(Http::get("{$this->api_url}/siswa"))->data->count;
        
        if ($response->successful()) {
            
            if(json_decode($response)->data->rows == []) {

                return view('induk.show-all', [
                    'status' => 'Pencarian tidak ditemukan!',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'total_siswa' => $total,
                    'title' => 'Data Induk',
                    'active' => 'data-induk',
                ]);

            } else {


                return view('induk.show-all', [
                    'siswa' => json_decode($response)->data->rows,
                    'status' => 'success',
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'total_siswa' => $total,
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

        $jurusan = Http::get("{$this->api_url}/jurusan?perPage=1000");
        $total_siswa = Http::get("{$this->api_url}/jurusan/count-siswa/");

        return view('induk.select-jurusan', [
            'title' => 'Pilih Jurusan',
            'active' => 'data-induk',
            'jurusan' => json_decode($jurusan)->data->rows,
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
        $thn_ajaran = $request->thn_ajaran;
        $angkatan = $request->angkatan;

        $response = Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}?page={$page}&perPage={$perPage}&search={$search}&nis_siswa={$nis_siswa}&nisn_siswa={$nisn_siswa}&nama_siswa={$nama_siswa}&jenis_kelamin={$jenis_kelamin}&KelasId={$KelasId}&sort_by={$sort_by}&sort={$sort}&dibuatTglDari={$dibuatTglDari}&dibuatTglKe={$dibuatTglKe}&thn_ajaran={$thn_ajaran}&angkatan={$angkatan}");
        $total = json_decode(Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}?page={$page}&perPage={$perPage}&angkatan={$angkatan}"))->data->count; 

        if ($response->successful()) {
            
            if(json_decode($response)->data->rows == []) {
                
                return view('induk.show-all', [
                    'status' => 'Pencarian tidak ditemukan!',
                    'jurusan' => $request->jurusan,
                    'kelas' => $request->kelas,                    
                    'response' => json_decode($response),
                    'total' => json_decode($response)->data->count,
                    'total_siswa' => $total,
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
                    'total_siswa' => $total,
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

        abort_if(Gate::denies('manage-induk'), 403);

        $response = Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}?page={$request->page}&perPage={$request->perPage}&search={$request->search}&nis_siswa={$request->nis_siswa}&nisn_siswa={$request->nisn_siswa}&nama_siswa={$request->nama_siswa}&jenis_kelamin={$request->jenis_kelamin}&KelasId={$request->KelasId}&sort_by={$request->sort_by}&sort={$request->sort}&dibuatTglDari={$request->dibuatTglDari}&dibuatTglKe={$request->dibuatTglKe}&thn_ajaran={$request->thn_ajaran}&angkatan={$request->angkatan}");

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

        abort_if(Gate::denies('manage-induk'), 403);

        $response = Http::get("{$this->api_url}/siswa/{$request->jurusan}/{$request->kelas}?page={$request->page}&perPage={$request->perPage}&search={$request->search}&nis_siswa={$request->nis_siswa}&nisn_siswa={$request->nisn_siswa}&nama_siswa={$request->nama_siswa}&jenis_kelamin={$request->jenis_kelamin}&KelasId={$request->KelasId}&sort_by={$request->sort_by}&sort={$request->sort}&dibuatTglDari={$request->dibuatTglDari}&dibuatTglKe={$request->dibuatTglKe}&thn_ajaran={$request->thn_ajaran}&angkatan={$request->angkatan}");

        return view('induk.pdf.data-induk', [
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'siswa' => json_decode($response)->data->rows
        ]);

    }


    public function exportDataIndukExcel(Request $request) {

        abort_if(Gate::denies('manage-induk'), 403);

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

        abort_if(Gate::denies('manage-induk'), 403);

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

        $lama_siswa_sekolah = Http::get("{$this->api_url}/dbquery/function/lama-siswa-sekolah?nis_siswa=$nis");


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

            if (json_decode($lama_siswa_sekolah)->status === 'success') {

                return view('induk.show-detail', [
                    'title' => 'Data Siswa',
                    'active' => 'data-induk',
                    'status' => 'success',
                    'siswa' => json_decode($response)->result,
                    'updatedAt' => $updatedAt,
                    'createdAt' => $createdAt,
                    'tgl_lahir_siswa' => $tgl_lahir_siswa,
                    'prevURL' => $prevURL,
                    'lama_siswa_sekolah' => json_decode($lama_siswa_sekolah)->results[0]->lama_siswa_sekolah,
                ]);

            } else {

                return view('induk.show-detail', [
                    'title' => 'Data Siswa',
                    'active' => 'data-induk',
                    'status' => 'success',
                    'siswa' => json_decode($response)->result,
                    'updatedAt' => $updatedAt,
                    'createdAt' => $createdAt,
                    'tgl_lahir_siswa' => $tgl_lahir_siswa,
                    'prevURL' => $prevURL,
                    'lama_siswa_sekolah' => '(?)',
                ]);

            }
            

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

        abort_if(Gate::denies('manage-induk'), 403);
     
        $kelas = Http::get("{$this->api_url}/kelas?perPage=1000");

        $prevURL = parse_url(url()->previous(), PHP_URL_PATH);
        $prevURLwithParams = URL::previous();

        return view('induk.create', [
            'title' => 'Create Siswa',
            'active' => 'data-induk',
            'kelas' => json_decode($kelas)->data->rows,
            'prevURL' => $prevURL,
            'prevURLwithParams' => $prevURLwithParams
        ]);
    }

    public function storeSiswa(Request $request)
    {
        abort_if(Gate::denies('manage-induk'), 403);

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
                'KelasId' =>  $request->KelasId,
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
                'thn_ajaran' => $request->thn_ajaran,
                'angkatan' => (int)$request->angkatan,
                'status_siswa' => $request->status_siswa,
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

        abort_if(Gate::denies('manage-induk'), 403);

        $prevURL = parse_url(url()->previous(), PHP_URL_PATH);
        $prevURLwithParams = URL::previous();

        $response = Http::get("{$this->api_url}/siswa/{$nis}");

        $kelas = Http::get("{$this->api_url}/kelas?perPage=1000");

        if ($response->successful()) {
            return view('induk.edit', [
                'title' => 'Edit siswa',
                'active' => 'data-induk',
                'kelas' => json_decode($kelas)->data->rows,
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

        abort_if(Gate::denies('manage-induk'), 403);

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
            'KelasId' =>  $request->KelasId,
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
            'thn_ajaran' => $request->thn_ajaran,
            'angkatan' => (int)$request->angkatan,
            'status_siswa' => $request->status_siswa,
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

        // DB::select(
        //     'call PostHistory', 

        // )

        return redirect("{$request->prevURLwithParams}")->with('success', 'Data berhasil diubah.');

    }


    public function deleteSiswa(Request $request, $nis)
    {

        abort_if(Gate::denies('manage-induk'), 403);

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


    public function downloadImport() {

        ob_end_clean();
        ob_start();

        $file = public_path('download/import_siswa.xlsx');

        return response()->download($file);
    }


    public function importDataSiswa(Request $request) {

        abort_if(Gate::denies('manage-induk'), 403);
        
        $this->validate($request, [
            'uploaded_file' => 'required|file|mimes:xls,xlsx'
        ]);

        $the_file = $request->file('uploaded_file');


        try {
            $spreadsheet  = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 6, $row_limit );
            $column_range = range( 'B', $column_limit );
            $startcount   = 6;
            
            foreach ( $row_range as $row ) {
    
                        $response = Http::post("{$this->api_url}/siswa", [
                            'nis_siswa'                   => $sheet->getCell( 'B' . $row )->getValue(),
                            'nisn_siswa'                  => $sheet->getCell( 'C' . $row )->getValue(),
                            'nama_siswa'                  => $sheet->getCell( 'D' . $row )->getValue(),
                            'KelasId'                     => $sheet->getCell( 'E' . $row )->getValue(),
                            'email_siswa'                 => $sheet->getCell( 'F' . $row )->getValue(),
                            'no_telp_siswa'               => $sheet->getCell( 'G' . $row )->getValue(),
                            'alamat_siswa'                => $sheet->getCell( 'H' . $row )->getValue(),
                            'tmp_lahir'                   => $sheet->getCell( 'I' . $row )->getValue(),
                            'tgl_lahir'                   => $sheet->getCell( 'J' . $row )->getValue(),
                            'jenis_kelamin'               => $sheet->getCell( 'K' . $row )->getValue(),
                            'agama'                       => $sheet->getCell( 'L' . $row )->getValue(),
                            'anak_ke'                     => $sheet->getCell( 'M' . $row )->getValue(),
                            'status'                      => $sheet->getCell( 'N' . $row )->getValue(),
                            'no_ijazah_smp'               => $sheet->getCell( 'O' . $row )->getValue(),
                            'thn_ijazah_smp'              => $sheet->getCell( 'P' . $row )->getValue(),
                            'no_skhun_smp'                => $sheet->getCell( 'Q' . $row )->getValue(),
                            'thn_skhun_smp'               => $sheet->getCell( 'R' . $row )->getValue(),
                            'sekolah_asal'                => $sheet->getCell( 'S' . $row )->getValue(),
                            'alamat_sekolah_asal'         => $sheet->getCell( 'T' . $row )->getValue(),
                            'diterima_di_kelas'           => $sheet->getCell( 'U' . $row )->getValue(),
                            'semester_diterima'           => $sheet->getCell( 'V' . $row )->getValue(),
                            'tgl_diterima'                => $sheet->getCell( 'W' . $row )->getValue(),
                            'status_siswa'                => $sheet->getCell( 'X' . $row )->getValue(),
                            'no_ijazah_smk'               => $sheet->getCell( 'Y' . $row )->getValue(),
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
                            'berat_badan'                 => $sheet->getCell( 'AK' . $row )->getValue(),
                            'tinggi_badan'                => $sheet->getCell( 'AL' . $row )->getValue(),
                            'lingkar_kepala'              => $sheet->getCell( 'AM' . $row )->getValue(),
                            'golongan_darah'              => $sheet->getCell( 'AN' . $row )->getValue(),
                            'isAlumni'                    => $sheet->getCell( 'AO' . $row )->getValue(),
                            'angkatan'                    => $sheet->getCell( 'AP' . $row )->getValue()
                        ]);

                        $startcount++;
    
                        // $response->throw();
                }

                if (json_decode($response)->status === 'error') {

                    return back()->with('warning', 'Terdapat kesalahan, periksa kembali file anda');
                            
                } else {
    
                    $user = Auth::user();
        
                    Http::post("{$this->api_url}/history", [
                        'activityName' => 'Import Data Siswa',
                        'activityAuthor' => "$user->nama",
                        'activityDesc' => "$user->nama mengimport data siswa dengan tipe file excel."
                    ]);

                    return back()->with('success','Great! Data has been successfully imported.');
    
                }
                            
        } catch (Exception $e) {

            $error_code = $e->errorInfo[1];
            return back()->with('error','There was a problem uploading the data!');

        }


    }


    public function exportDataSiswaPDF(Request $request) {

        abort_if(Gate::denies('manage-induk'), 403);

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

        abort_if(Gate::denies('manage-induk'), 403);

        $nis = $request->nis;

        $response = Http::get("{$this->api_url}/siswa/{$nis}");

        $getSiswaBirthDate = json_decode($response)->result->tgl_lahir;
        $tgl_lahir_siswa = Carbon::parse($getSiswaBirthDate)->translatedFormat('l d F Y');

        return view('induk.pdf.data-induk-detail', [
            'siswa' => json_decode($response)->result,
            'tgl_lahir_siswa' => $tgl_lahir_siswa,
        ]);

    }

}
