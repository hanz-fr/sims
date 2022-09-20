<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Http;

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

Route::get('/detail', function () {
    return view('di-detail', [
        'title' => 'Data Siswa',
        'active' => 'data-induk'
    ]);
});

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

Route::get('/data-induk-siswa', function () {
    return view('data-induk', [
        'title' => 'Data Induk Siswa',
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

Route::get('/testurl', function() {
    return view('plswork', [
        'title' => 'Data Tidak Naik Kelas',
        'active' => 'data-induk'
    ]);
});

Route::get('/api/siswa', [ApiController::class, 'index']);
Route::get('/api/siswa/create', [ApiController::class, 'create']);
Route::post('/api/siswa', [ApiController::class, 'store']);

Route::get('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'login']);

Route::get('/register-success', [UserController::class, 'registersc']);

Route::post('/registeruser', [UserController::class, 'registeruser']);

Route::post('/loginuser', [UserController::class, 'loginuser']);