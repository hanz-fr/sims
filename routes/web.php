<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;

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


/* ROUTE SISWA */

Route::get('/data-induk-siswa', [ApiController::class, 'getAllSiswa']);
Route::get('/detail/{nis}', [ApiController::class, 'getSiswa']);
Route::get('/tambah-data', [ApiController::class, 'createSiswa']);
Route::get('/edit-siswa/{nis}', [ApiController::class, 'editSiswa']);

Route::post('/api/siswa', [ApiController::class, 'storeSiswa']);
Route::put('/api/siswa/update/{nis}', [ApiController::class, 'updateSiswa']);
Route::delete('/api/siswa/delete/{nis}', [ApiController::class, 'deleteSiswa']);


/* ROUTE MUTASI */

Route::get('/siswa-keluar', [ApiController::class, 'getAllMutasi']);
Route::get('/create-mutasi', [ApiController::class, 'createMutasi']);
Route::get('/edit-mutasi/{id}', [ApiController::class, 'editMutasi']);

Route::post('/api/mutasi/store', [ApiController::class, 'storeMutasi']);
Route::put('/api/mutasi/update/{id}', [ApiController::class, 'updateMutasi']);
Route::delete('/api/mutasi/delete/{id}', [ApiController::class, 'deleteMutasi']);

/* ROUTE KELAS */

Route::get('/all-kelas', function () {
    return view('all-kelas', [
        'title' => 'List Semua Kelas',
        'active' => 'data-induk'
    ]);
});

Route::get('/detail-kelas', function () {
    return view('detail-kelas', [
        'title' => 'Detail Kelas',
        'active' => 'data-induk'
    ]);
});

Route::get('/', function () {
    return view('dashboard-main', [
        'title' => 'Dashboard',
        'active' => 'dashboard-main'
    ]);
});

Route::get('/jurusan', function () {
    return view('pilih-jurusan', [
        'title' => 'Pilih Jurusan',
        'active' => 'data-induk'
    ]);
});

Route::get('/angkatan', function () {
    return view('pilih-angkatan', [
        'title' => 'Pilih Angkatan',
        'active' => 'data-induk'
    ]);
});

Route::get('/data-alumni', function () {
    return view('data-alumni', [
        'title' => 'Data Alumni',
        'active' => 'data-induk'
    ]);
});

Route::get('/rekap-nilai', function () {
    return view('rekap-nilai', [
        'title' => 'Rekap Nilai',
        'active' => 'data-induk'
    ]);
});

Route::get('/siswa-masuk', function () {
    return view('siswa-masuk', [
        'title' => 'Data Siswa Masuk',
        'active' => 'data-induk'
    ]);
});

Route::get('/rekap-siswa', function () {
    return view('data-rekap-siswa', [
        'title' => 'Data Rekap Siswa',
        'active' => 'rekap-siswa'
    ]);
});

Route::get('/rekap-jumlah-siswa', function () {
    return view('data-rekap-jumlah-siswa', [
        'title' => 'Data Rekap Siswa',
        'active' => 'rekap-siswa'
    ]);
});
 
Route::get('/data-tidak-naik', function () {
    return view('data-tidak-naik', [
        'title' => 'Data Tidak Naik Kelas',
        'active' => 'data-induk'
    ]);
});

Route::get('/profile', function () {
    return view('profil-user', [
        'title' => 'Profile'
    ]);
});

Route::get('/profile', [UserController::class, 'show']);

Route::get('/testurl', function() {
    return view('plswork', [
        'title' => 'Data Tidak Naik Kelas',
        'active' => 'data-induk'
    ]);
});

/* ROUTE ADMIN */
Route::get('/admin', function () {
    return view('login-admin', [
        'title' => 'Admin Login',
        'active' => 'admin'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard-admin', [
        'title' => 'Dashboard Admin',
        'active' => 'admin'
    ]);
});

Route::get('/manage-user', function () {
    return view('manage-user', [
        'title' => 'Manage User SIMS',
        'active' => 'account'
    ]);
});

Route::get('/mata-pelajaran-jurusan', function () {
    return view('mapel-jurusan', [
        'title' => 'Mata Pelajaran',
        'active' => 'database'
    ]);
});

Route::get('/create-mata-pelajaran-jurusan', function () {
    return view('create-mapel-jurusan', [
        'title' => 'Mata Pelajaran',
        'active' => 'database'
    ]);
});

Route::get('/show-detail', function () {
    return view('account-detail', [
        'title' => 'Account Details',
        'active' => 'account'
    ]);
});

Route::get('/edit-account', function () {
    return view('edit-account', [
        'title' => 'Edit Account',
        'active' => 'account'
    ]);
});

Route::get('/create-account', function () {
    return view('create-account', [
        'title' => 'Create Account',
        'active' => 'account'
    ]);
});

Route::get('/show-jurusan', function () {
    return view('show-jurusan', [
        'title' => 'Jurusan',
        'active' => 'database'
    ]);
});

Route::get('/show-detail-jurusan', function () {
    return view('show-detail-jurusan', [
        'title' => 'Detail Jurusan',
        'active' => 'database'
    ]);
});

Route::get('/live-search-test', [ApiController::class, 'indexLiveSearch']);

Route::get('/search', [ApiController::class, 'search']);


Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register-success', [UserController::class, 'registersc']);
Route::post('/registeruser', [UserController::class, 'registeruser']);
Route::post('/loginuser', [UserController::class, 'loginuser']);
Route::get('/profile', [UserController::class, 'show']);
Route::get('/edit-profile', [UserController::class, 'edit']);
Route::post('/update-profile', [UserController::class, 'update']);

Route::middleware(['auth', 'user-access:tata usaha'])->group(function () {
  
});
  
Route::middleware(['auth', 'user-access:kesiswaan'])->group(function () {
  
});
  
Route::middleware(['auth', 'user-access:kurikulum'])->group(function () {
  
});

Route::middleware(['auth', 'user-access:wali kelas'])->group(function () {
  
});