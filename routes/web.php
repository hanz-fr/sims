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

/* Route::get('/siswa-masuk', function () {
    return view('siswa-masuk', [
        'title' => 'Data Siswa Masuk',
        'active' => 'data-induk'
    ]);
}); */

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

Route::get('/detail-mata-pelajaran-jurusan', function () {
    return view('detail-mapel-jurusan', [
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

// ROUTE USER
Route::get('/register', [UserController::class, 'registration']);
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/registeruser', [UserController::class, 'register']);
Route::post('/loginuser', [UserController::class, 'authenticate']);
Route::get('/signout', [UserController::class, 'signOut']);

// profile
Route::get('/profile', [UserController::class, 'show'])->name('profile');
Route::get('/edit-profile', [UserController::class, 'edit']);
Route::post('/update-profile/{id}', [UserController::class, 'update']);
Route::post('/change-password', [UserController::class, 'changePassword']);