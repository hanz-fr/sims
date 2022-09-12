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
    return view('dashboard-main');
});

Route::get('/detail', function () {
    return view('di-detail');
});

Route::get('/asal', function () {
    return view('ini-asal-asalan');
});

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/registeruser', [UserController::class, 'registeruser'])->name('registeruser');