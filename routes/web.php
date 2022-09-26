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

Route::get('/', function () {
    return view('dashboard-main', [
        'title' => 'Dashboard',
        'active' => 'dashboard-main'
    ]);
});

Route::get('/detail/{nis}', [ApiController::class, 'show']);

Route::get('/jurusan', function () {
    return view('pilih-jurusan', [
        'title' => 'Pilih Jurusan',
        'active' => 'data-induk'
    ]);
});

Route::get('/tambah-data', function () {
    return view('input-di', [
        'title' => 'Tambah Data Induk Siswa',
        'active' => 'data-induk'
    ]);
});

Route::get('/update-data', function () {
    return view('update-di', [
        'title' => 'Update Data Induk Siswa',
        'active' => 'data-induk'
    ]);
});

Route::get('/data-induk-siswa', [ApiController::class, 'index']);

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


Route::get('/siswa-keluar', function () {
    return view('siswa-keluar', [
        'title' => 'Data Siswa Keluar',
        'active' => 'data-induk'
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
        'title' => 'Profile',
        'active' => ' '
    ]);
});

Route::get('/profile', [UserController::class, 'show']);

Route::get('/testurl', function() {
    return view('plswork', [
        'title' => 'Data Tidak Naik Kelas',
        'active' => 'data-induk'
    ]);
});

Route::get('/admin', function () {
    return view('login-admin', [
        'title' => 'Admin Login'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard-admin', [
        'title' => 'Dashboard Admin'
    ]);
});

// Route::get('/api/siswa', [ApiController::class, 'index']);
Route::get('/api/siswa/create', [ApiController::class, 'create']);
Route::post('/api/siswa', [ApiController::class, 'store']);

Route::get('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register-success', [UserController::class, 'registersc']);

Route::post('/registeruser', [UserController::class, 'registeruser']);

Route::post('/loginuser', [UserController::class, 'loginuser']);

Auth::routes();
  

Route::middleware(['auth', 'user-access:tata usaha'])->group(function () {
  
});
  
Route::middleware(['auth', 'user-access:kesiswaan'])->group(function () {
  
});
  
Route::middleware(['auth', 'user-access:kurikulum'])->group(function () {
  
});

Route::middleware(['auth', 'user-access:wali kelas'])->group(function () {
  
});