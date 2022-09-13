<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/detail', function () {
    return view('di-detail');
});

Route::get('/di-jurusan', function () {
    return view('pilih-jurusan', [
        'title' => 'Pilih Jurusan',
    ]);
});

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/rgsuccess', [UserController::class, 'rgsuccess'])->name('rgsuccess');

Route::post('/registeruser', [UserController::class, 'registeruser'])->name('registeruser');