<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
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
        return view('data-rekap-siswa', [
            'title' => 'Data Rekap Siswa',
            'active' => 'rekap-siswa'
        ]);
    });
    

    /* DATA TIDAK NAIK KELAS */

    Route::get('/data-tidak-naik', function () {
        return view('data-tidak-naik', [
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

Route::middleware(['admin'])->group(function() {

    /* SHOW ALL KELAS */
    Route::get('/all-kelas', function () {
        return view('admin.kelas.all-kelas', [
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
    Route::get('/admin', function () {
        return view('admin.login', [
            'title' => 'Admin Login',
            'active' => 'admin'
        ]);
    });
    
    
    /* ADMIN DASHBOARD */
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'active' => 'admin'
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
        return view('all-siswa-admin', [
            'title' => 'Data Seluruh Siswa',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-siswa-admin', function () {
        return view('detail-siswa-admin', [
            'title' => 'Detail Siswa',
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