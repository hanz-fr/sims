<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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


Route::middleware(['auth'])->group(function () {

    /* MAIN DASHBOARD */

    Route::get('/', function () {
        return view('dashboard-main', [
            'title' => 'Dashboard',
            'active' => 'dashboard-main'
        ]);
    });


    /* ROUTE SISWA */

    Route::get('/data-induk-siswa', [ApiController::class, 'getAllSiswa']);
    Route::get('/detail/{nis}', [ApiController::class, 'getSiswa']);
    Route::get('/tambah-data', [ApiController::class, 'createSiswa']);
    Route::get('/edit-siswa/{nis}', [ApiController::class, 'editSiswa']);

    Route::post('/api/siswa', [ApiController::class, 'storeSiswa']);
    Route::put('/api/siswa/update/{nis}', [ApiController::class, 'updateSiswa']);
    Route::delete('/api/siswa/delete/{nis}', [ApiController::class, 'deleteSiswa']);

    Route::get('/get-request', [ApiController::class, 'getRequest']);


    /* ROUTE MUTASI */

    // siswa-keluar
    Route::get('/siswa-keluar', [ApiController::class, 'getAllMutasiKeluar']);
    Route::get('/create-mutasi-keluar', [ApiController::class, 'createMutasiKeluar']);
    Route::get('/edit-mutasi-keluar/{id}', [ApiController::class, 'editMutasiKeluar']);

    Route::post('/api/mutasi-keluar/store', [ApiController::class, 'storeMutasiKeluar']);
    Route::put('/api/mutasi-keluar/update/{id}', [ApiController::class, 'updateMutasiKeluar']);
    Route::delete('/api/mutasi-keluar/delete/{id}', [ApiController::class, 'deleteMutasiKeluar']);

    // siswa-masuk
    Route::get('/siswa-masuk', [ApiController::class, 'getAllMutasiMasuk']);
    Route::get('/create-mutasi-masuk', [ApiController::class, 'createMutasiMasuk']);
    Route::get('/edit-mutasi-masuk/{id}', [ApiController::class, 'editMutasiMasuk']);

    Route::post('/api/mutasi-masuk/store', [ApiController::class, 'storeMutasiMasuk']);
    Route::put('/api/mutasi-masuk/update/{id}', [ApiController::class, 'updateMutasiMasuk']);
    Route::delete('/api/mutasi-masuk/delete/{id}', [ApiController::class, 'deleteMutasiMasuk']);


    /* REKAP DATA SISWA */

    Route::get('/rekap-jumlah-siswa', [ApiController::class, 'rekapJumlahSiswa']);



    /* GET DATA INDUK BY JURUSAN */

    Route::get('/jurusan', function () {
        return view('induk.select-jurusan', [
            'title' => 'Pilih Jurusan',
            'active' => 'data-induk'
        ]);
    })->middleware('kesiswaan');



    /* ANGKATAN */

    Route::get('/angkatan', function () {
        return view('induk.select-angkatan', [
            'title' => 'Pilih Angkatan',
            'active' => 'data-induk'
        ]);
    });


    /* ALUMNI */

    Route::get('/data-alumni', function () {
        return view('induk.show-alumni', [
            'title' => 'Data Alumni',
            'active' => 'data-induk'
        ]);
    });


    /* REKAP NILAI */

    Route::get('/rekap-nilai', function () {
        return view('induk.show-rekap-nilai', [
            'title' => 'Rekap Nilai',
            'active' => 'data-induk'
        ]);
    });


    /* REKAP SISWA */

    Route::get('/rekap-siswa', function () {
        return view('rekap-siswa.dashboard-rekap-siswa', [
            'title' => 'Data Rekap Siswa',
            'active' => 'rekap-siswa'
        ]);
    });


    /* DATA TIDAK NAIK KELAS */

    Route::get('/data-tidak-naik', function () {
        return view('rekap-siswa.data-tidak-naik', [
            'title' => 'Data Tidak Naik Kelas',
            'active' => 'data-induk'
        ]);
    });


    /* PROFILE */
    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::get('/edit-profile', [UserController::class, 'edit']);
    Route::post('/update-profile/{id}', [UserController::class, 'update']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
});




/* ROUTE ADMIN */

Route::middleware(['admin'])->group(function () {

    /* SHOW ALL KELAS */
    Route::get('/all-kelas', function () {
        return view('admin.kelas.show-all-kelas', [
            'title' => 'List Semua Kelas',
            'active' => 'data-induk'
        ]);
    });

    /* SHOW KELAS DETAIL */
    Route::get('/detail-kelas', function () {
        return view('admin.kelas.detail-kelas', [
            'title' => 'Detail Kelas',
            'active' => 'data-induk'
        ]);
    });

    /* ADMIN LOGIN */
    Route::get('/admin', [AdminController::class, 'index'])->name('login.admin');
    Route::post('/login-admin', [AdminController::class, 'authenticate']);

    /* ADMIN DASHBOARD */
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'active' => 'admin'
        ]);
    });

    // DATABASE DASHBOARD
    Route::get('/database', function () {
        return view('admin.dashboard-database', [
            'title' => 'Database',
            'active' => 'database'
        ]);
    });

    /* MANAGE USER */
    Route::get('/manage-user', function () {
        return view('admin.account.manage-user', [
            'title' => 'Manage User SIMS',
            'active' => 'account'
        ]);
    });


    /* MAPEL JURUSAN */
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
            'title' => 'Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    /* EDIT MAPEL JURUSAN */
    Route::get('/edit-mata-pelajaran-jurusan', function () {
        return view('admin.mapel-jurusan.edit-mapel-jurusan', [
            'title' => 'Mata Pelajaran',
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

    /* SHOW USER DETAIL */
    Route::get('/show-detail', function () {
        return view('admin.account.show-detail', [
            'title' => 'Account Details',
            'active' => 'account'
        ]);
    });


    /* EDIT USER */
    Route::get('/edit-account', function () {
        return view('admin.account.edit', [
            'title' => 'Edit Account',
            'active' => 'account'
        ]);
    });


    /* CREATE USER */
    Route::get('/create-account', function () {
        return view('admin.account.create', [
            'title' => 'Create Account',
            'active' => 'account'
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
