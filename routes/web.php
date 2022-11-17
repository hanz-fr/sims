<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ROUTE USER */
Route::middleware(['auth:web', 'revalidate'])->group(function () {

    /* MAIN DASHBOARD */

    Route::get('/', [ApiController::class, 'mainDashboard']);


    /* ROUTE SISWA */

    Route::get('/data-induk-siswa', [ApiController::class, 'getAllSiswa']);
    Route::get('/detail/{nis}', [ApiController::class, 'getSiswa']);
    Route::get('/tambah-data', [ApiController::class, 'createSiswa']);
    Route::get('/edit-siswa/{nis}', [ApiController::class, 'editSiswa']);

    Route::post('/api/siswa', [ApiController::class, 'storeSiswa']);
    Route::put('/api/siswa/update/{nis}', [ApiController::class, 'updateSiswa']);
    Route::delete('/api/siswa/delete/{nis}', [ApiController::class, 'deleteSiswa']);

    Route::get('/data-siswa-pdf/{nis}', [ApiController::class, 'exportDataSiswaPDF']);
    Route::get('/data-siswa-print/{nis}', [ApiController::class, 'printDataSiswa']);

    Route::get('/data-induk-pdf', [ApiController::class, 'exportDataIndukPDF']);
    Route::get('/data-induk-pdf/{jurusan}/{kelas}', [ApiController::class, 'exportDataIndukPDF']);

    Route::get('/data-induk-print', [ApiController::class, 'printDataInduk']);
    Route::get('/data-induk-print/{jurusan}/{kelas}', [ApiController::class, 'printDataInduk']);
    
    Route::get('/data-induk-excel', [ApiController::class, 'exportDataIndukExcel']);
    Route::get('/data-induk-excel/{jurusan}/{kelas}', [ApiController::class, 'exportDataIndukExcel']);
    Route::get('/detail-data-induk/{nis}', [ApiController::class, 'exportDetailDataIndukExcel']);

    Route::get('/get-request', [ApiController::class, 'getRequest']);


    /* ROUTE MUTASI */

    // siswa-keluar
    Route::get('/siswa-keluar', [ApiController::class, 'getAllMutasiKeluar']);
    Route::get('/create-mutasi-keluar', [ApiController::class, 'createMutasiKeluar']);
    Route::get('/edit-mutasi-keluar/{id}', [ApiController::class, 'editMutasiKeluar']);

    Route::post('/api/mutasi-keluar/store', [ApiController::class, 'storeMutasiKeluar']);
    Route::put('/api/mutasi-keluar/update/{id}', [ApiController::class, 'updateMutasiKeluar']);
    Route::delete('/api/mutasi-keluar/delete/{id}', [ApiController::class, 'deleteMutasiKeluar']);

    Route::get('/mutasi-keluar-excel', [ApiController::class, 'exportMutasiKeluarExcel']);
    Route::get('/mutasi-keluar-pdf', [ApiController::class, 'exportMutasiKeluarPDF']);
    Route::get('/mutasi-keluar-print', [ApiController::class, 'printMutasiKeluar']);

    // siswa-masuk
    Route::get('/siswa-masuk', [ApiController::class, 'getAllMutasiMasuk']);
    Route::get('/create-mutasi-masuk', [ApiController::class, 'createMutasiMasuk']);
    Route::get('/edit-mutasi-masuk/{id}', [ApiController::class, 'editMutasiMasuk']);

    Route::get('/mutasi-masuk-excel', [ApiController::class, 'exportMutasiMasukExcel']);
    Route::get('/mutasi-masuk-pdf', [ApiController::class, 'exportMutasiMasukPDF']);
    Route::get('/mutasi-masuk-print', [ApiController::class, 'printMutasiMasuk']);


    Route::post('/api/mutasi-masuk/store', [ApiController::class, 'storeMutasiMasuk']);
    Route::put('/api/mutasi-masuk/update/{id}', [ApiController::class, 'updateMutasiMasuk']);
    Route::delete('/api/mutasi-masuk/delete/{id}', [ApiController::class, 'deleteMutasiMasuk']);


     /* REKAP NILAI */

    Route::get('/rekap-nilai/{nis}', [ApiController::class, 'getRaportSiswa']);
    Route::get('/tambah-nilai/{nis}', [ApiController::class, 'viewTambahNilaiMapel']);
    Route::get('/edit-rekap-nilai/{RaportId}', [ApiController::class, 'editRekapNilai']);
    Route::post('/api/raport/tambah-nilai', [ApiController::class, 'storeTambahNilaiMapel']);
    Route::put('/api/raport/update-nilai', [ApiController::class, 'storeUpdateNilaiMapel']);
    Route::delete('/api/raport/delete/{RaportId}', [ApiController::class, 'deleteNilaiMapel']);
    

    /* REKAP DATA SISWA */

    Route::get('/rekap-jumlah-siswa', [ApiController::class, 'rekapJumlahSiswa']);

    Route::get('/rekap-jumlah-siswa-pdf', [ApiController::class, 'exportRekapJumlahPDF']);
    Route::get('/rekap-jumlah-siswa-print', [ApiController::class, 'printRekapJumlah']);
    Route::get('/rekap-jumlah-siswa-excel', [ApiController::class, 'exportRekapJumlahExcel']);

    /* GET DATA INDUK BY JURUSAN */

    Route::get('/data-induk-siswa/{jurusan}/{kelas}', [ApiController::class, 'getSiswaByJurusanKelas']);


    /* JURUSAN */

    Route::get('/jurusan', [ApiController::class, 'getJurusan']);


    /* ANGKATAN */

    Route::get('/angkatan', [ApiController::class, 'getAngkatan']);


    /* ALUMNI */

    Route::get('/data-alumni', [ApiController::class, 'viewAlumni']);
    Route::get('/alumni-pdf', [ApiController::class, 'exportAlumniPDF']);
    Route::get('/alumni-print', [ApiController::class, 'printAlumni']);
    Route::get('/alumni-excel', [ApiController::class, 'exportAlumniExcel']);


    /* REKAP SISWA */

    Route::get('/rekap-siswa', [ApiController::class, 'rekapSiswaDashboard']);


    /* DATA TIDAK NAIK KELAS */

    Route::get('/data-tidak-naik', [ApiController::class, 'siswaTidakNaik']);

    Route::get('/data-tidak-naik-excel', [ApiController::class, 'exportDataTidakNaikExcel']);
    Route::get('/data-tidak-naik-pdf', [ApiController::class, 'exportDataTidakNaikPDF']);
    Route::get('/data-tidak-naik-print', [ApiController::class, 'printDataTidakNaik']);


    /* PROFILE */
    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::get('/edit-profile', [UserController::class, 'edit']);
    Route::post('/update-profile/{id}', [UserController::class, 'update']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
});




/* ROUTE SUPER ADMIN */
Route::middleware(['auth:admin', 'revalidate'])->group(function () {

    /* ADMIN DASHBOARD */
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'active' => 'admin'
        ]);
    })->name('admin.dashboard');

    // DATABASE DASHBOARD
    Route::get('/database', function () {
        return view('admin.dashboard-database', [
            'title' => 'Database',
            'active' => 'database'
        ]);
    });
    
    /* ACCOUNT MANAGEMENT */
    Route::resource('account', AccountController::class);
    
    /* ADMIN KELAS */
    Route::get('/all-kelas', function () {
        return view('admin.kelas.show-all-kelas', [
            'title' => 'List Semua Kelas',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-kelas', function () {
        return view('admin.kelas.detail-kelas', [
            'title' => 'Detail Kelas',
            'active' => 'database'
        ]);
    });

    Route::get('/tambah-kelas-admin', function () {
        return view('admin.kelas.tambah-kelas-admin', [
            'title' => 'Tambah Kelas Baru',
            'active' => 'database'
        ]);
    });

    Route::get('/edit-kelas-admin', function () {
        return view('admin.kelas.edit-kelas-admin', [
            'title' => 'Edit Kelas',
            'active' => 'database'
        ]);
    });


    /* 
    APEL JURUSAN */
    Route::get('/mata-pelajaran-jurusan', function () {
        return view('admin.mapel-jurusan.mapel-jurusan', [
            'title' => 'Mata Pelajaran',
            'active' => 'database'
        ]);
    });


    /* DETAIL MAPEL JURUSAN */
    Route::get('/detail-mata-pelajaran-jurusan', function () {
        return view('admin.mapel-jurusan.detail-mapel-jurusan', [
            'title' => 'Mata Pelajaran',
            'active' => 'database'
        ]);
    });


    /* CREATE MAPEL JURUSAN */
    Route::get('/create-mata-pelajaran-jurusan', function () {
        return view('admin.mapel-jurusan.create-mapel-jurusan', [
            'title' => 'Create Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    /* EDIT MAPEL JURUSAN */
    Route::get('/edit-mata-pelajaran-jurusan', function () {
        return view('admin.mapel-jurusan.edit-mapel-jurusan', [
            'title' => 'Edit Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    // RAPOR
    Route::get('/rapor', function () {
        return view('admin.raport.rapor', [
            'title' => 'Rapor',
            'active' => 'database'
        ]);
    });

    // DETAIL RAPOR
    Route::get('/detail-rapor', function () {
        return view('admin.raport.detail-rapor', [
            'title' => 'Detail Rapor',
            'active' => 'database'
        ]);
    });

    // EDIT RAPOR
    Route::get('/edit-rapor', function () {
        return view('admin.raport.edit-rapor', [
            'title' => 'Edit Rapor',
            'active' => 'database'
        ]);
    });

    // CREATE RAPOR
    Route::get('/create-rapor', function () {
        return view('admin.raport.create-rapor', [
            'title' => 'Create Rapor',
            'active' => 'database'
        ]);
    });

    // NILAI MAPEL
    Route::get('/nilai-mapel', function () {
        return view('admin.nilai-mapel.show-nilai-mapel', [
            'title' => 'Nilai Mapel',
            'active' => 'database'
        ]);
    });

    // DETAIL NILAI MAPEL
    Route::get('/detail-nilai-mapel', function () {
        return view('admin.nilai-mapel.detail-nilai-mapel', [
            'title' => 'Detail Nilai Mapel',
            'active' => 'database'
        ]);
    });
    // CREATE NILAI MAPEL
    Route::get('/create-nilai-mapel', function () {
        return view('admin.nilai-mapel.create-nilai-mapel', [
            'title' => 'Create Nilai Mapel',
            'active' => 'database'
        ]);
    });
    // EDIT NILAI MAPEL
    Route::get('/edit-nilai-mapel', function () {
        return view('admin.nilai-mapel.edit-nilai-mapel', [
            'title' => 'Edit Nilai Mapel',
            'active' => 'database'
        ]);
    });


    /* SHOW ALL JURUSAN */
    Route::get('/show-jurusan', function () {
        return view('admin.jurusan.show-jurusan', [
            'title' => 'Jurusan',
            'active' => 'database'
        ]);
    });


    /* SHOW JURUSAN DETAIL */
    Route::get('/show-detail-jurusan', function () {
        return view('admin.jurusan.show-detail-jurusan', [
            'title' => 'Detail Jurusan',
            'active' => 'database'
        ]);
    });


    /* CREATE JURUSAN */
    Route::get('/create-show-jurusan', function () {
        return view('admin.jurusan.create-show-jurusan', [
            'title' => 'Create Jurusan',
            'active' => 'database'
        ]);
    });

    /* ALL SISWA */
    Route::get('/all-siswa', function () {
        return view('admin.siswa.all-siswa-admin', [
            'title' => 'Data Seluruh Siswa',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-siswa-admin', function () {
        return view('admin.siswa.detail-siswa-admin', [
            'title' => 'Detail Siswa',
            'active' => 'database'
        ]);
    });

    Route::get('/add-siswa-admin', function () {
        return view('admin.siswa.add-siswa-admin', [
            'title' => 'Tambah Siswa',
            'active' => 'database'
        ]);
    });

    // ALL MAPEL
    Route::get('/all-mata-pelajaran', function () {
        return view('admin.all-mapel.all-mapel', [
            'title' => 'Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    // DETAIL ALL MAPEL
    Route::get('/detail-all-mata-pelajaran', function () {
        return view('admin.all-mapel.detail-all-mapel', [
            'title' => 'Detail Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    // CREATE ALL MAPEL
    Route::get('/create-all-mata-pelajaran', function () {
        return view('admin.all-mapel.create-all-mapel', [
            'title' => 'Create Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    // UPDATE ALL MAPEL
    Route::get('/edit-all-mata-pelajaran', function () {
        return view('admin.all-mapel.edit-all-mapel', [
            'title' => 'Edit Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    // MUTASI
    Route::get('/data-mutasi', function () {
        return view('admin.mutasi.show-all-mutasi', [
            'title' => 'Data Mutasi',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-mutasi-keluar', function () {
        return view('admin.mutasi.detail-keluar', [
            'title' => 'Detail Mutasi Keluar',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-mutasi-masuk', function () {
        return view('admin.mutasi.detail-masuk', [
            'title' => 'Detail Mutasi Masuk',
            'active' => 'database'
        ]);
    });

    Route::get('/add-mutasi-keluar', function () {
        return view('admin.mutasi.create-keluar', [
            'title' => 'Add Mutasi Keluar',
            'active' => 'database'
        ]);
    });

    Route::get('/add-mutasi-masuk', function () {
        return view('admin.mutasi.create-masuk', [
            'title' => 'Add Mutasi Masuk',
            'active' => 'database'
        ]);
    });

    Route::get('/edit-mutasi-keluar', function () {
        return view('admin.mutasi.edit-keluar', [
            'title' => 'Edit Mutasi Keluar',
            'active' => 'database'
        ]);
    });

    Route::get('/edit-mutasi-masuk', function () {
        return view('admin.mutasi.edit-masuk', [
            'title' => 'Edit Mutasi Masuk',
            'active' => 'database'
        ]);
    });

    /* LIVE SEARCH TEST */
    Route::get('/live-search-test', [ApiController::class, 'indexLiveSearch']);

    Route::get('/search', [ApiController::class, 'search']);
});

    /* ADMIN LOGIN */
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/login-admin', [AdminController::class, 'handleLogin']);
    Route::get('/admin/logout', [AdminController::class, 'logout']);


// ROUTE USER SIMS (LOGIN & REGISTER)
Route::get('/register', [UserController::class, 'registration']);
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/registeruser', [UserController::class, 'register']);
Route::post('/loginuser', [UserController::class, 'authenticate']);
Route::get('/signout', [UserController::class, 'signOut']);

Route::get('/forgot-password', [UserController::class, 'showForgetPasswordForm']);
Route::post('/forget-password', [UserController::class, 'submitForgetPasswordForm']);
Route::get('/reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('reset.password');
Route::post('/reset-password', [UserController::class, 'submitResetPasswordForm'])->name('update.password');
