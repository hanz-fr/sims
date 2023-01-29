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
    

    /* GET DATA INDUK BY JURUSAN */

    Route::get('/data-induk-siswa/{jurusan}/{kelas}', [ApiController::class, 'getSiswaByJurusanKelas']);


    // CRUD //
    Route::post('/api/siswa', [ApiController::class, 'storeSiswa']);
    Route::put('/api/siswa/update/{nis}', [ApiController::class, 'updateSiswa']);
    Route::delete('/api/siswa/delete/{nis}', [ApiController::class, 'deleteSiswa']);

    Route::post('/api/siswa/import', [ApiController::class, 'importDataSiswa']);

    Route::get('/data-siswa-pdf/{nis}', [ApiController::class, 'exportDataSiswaPDF'])->name('siswa.pdf');
    Route::get('/data-siswa-print/{nis}', [ApiController::class, 'printDataSiswa'])->name('siswa.print');

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

    Route::post('/api/mutasi-masuk/store', [ApiController::class, 'storeMutasiMasuk']);
    Route::put('/api/mutasi-masuk/update/{id}', [ApiController::class, 'updateMutasiMasuk']);
    Route::delete('/api/mutasi-masuk/delete/{id}', [ApiController::class, 'deleteMutasiMasuk']);

    Route::get('/mutasi-masuk-excel', [ApiController::class, 'exportMutasiMasukExcel']);
    Route::get('/mutasi-masuk-pdf', [ApiController::class, 'exportMutasiMasukPDF']);
    Route::get('/mutasi-masuk-print', [ApiController::class, 'printMutasiMasuk']);


     /* REKAP NILAI */

    Route::get('/rekap-nilai/{nis}', [ApiController::class, 'getRaportSiswa']);
    Route::get('/tambah-nilai/{nis}', [ApiController::class, 'viewTambahNilaiMapel']);
    Route::get('/edit-rekap-nilai/{RaportId}', [ApiController::class, 'editRekapNilai']);
    Route::post('/api/raport/tambah-nilai', [ApiController::class, 'storeTambahNilaiMapel']);
    Route::put('/api/raport/update-nilai', [ApiController::class, 'storeUpdateNilaiMapel']);
    Route::delete('/api/raport/delete/{RaportId}', [ApiController::class, 'deleteNilaiMapel']);

    Route::get('/rekap-nilai-excel/{nis}', [ApiController::class, 'exportRekapNilaiExcel']);
    Route::get('/rekap-nilai-print/{nis}', [ApiController::class, 'printRekapNilai']);
    Route::get('/rekap-nilai-pdf/{nis}', [ApiController::class, 'exportRekapNilaiPDF']);
    

    /* REKAP DATA SISWA */

    Route::get('/rekap-jumlah-siswa', [ApiController::class, 'rekapJumlahSiswa']);

    Route::get('/rekap-jumlah-siswa-pdf', [ApiController::class, 'exportRekapJumlahPDF']);
    Route::get('/rekap-jumlah-siswa-print', [ApiController::class, 'printRekapJumlah']);
    Route::get('/rekap-jumlah-siswa-excel', [ApiController::class, 'exportRekapJumlahExcel']);


    /* JURUSAN SISWA*/

    Route::get('/jurusan', [ApiController::class, 'getJurusan']);

    
    /* ANGKATAN SISWA */

    Route::get('/angkatan', [ApiController::class, 'getAngkatan']);


    /* ALUMNI */

    Route::get('/data-alumni', [ApiController::class, 'viewAlumni']);
    Route::get('/data-alumni/all', [ApiController::class, 'viewAlumni']);

    Route::get('/alumni-pdf', [ApiController::class, 'exportAlumniPDF']);
    Route::get('/alumni-print', [ApiController::class, 'printAlumni']);
    Route::get('/alumni-excel', [ApiController::class, 'exportAlumniExcel']);

    Route::get('/select-jurusan-alumni', [ApiController::class, 'selectJurusanAlumni']);
    Route::get('/select-angkatan-alumni', [ApiController::class, 'selectAngkatanAlumni']);


    /* REKAP SISWA */

    Route::get('/rekap-siswa', [ApiController::class, 'rekapSiswaDashboard']);


    /* DATA TIDAK NAIK KELAS */

    Route::get('/data-tidak-naik', [ApiController::class, 'siswaTidakNaik']);

    Route::get('/data-tidak-naik-excel', [ApiController::class, 'exportDataTidakNaikExcel']);
    Route::get('/data-tidak-naik-pdf', [ApiController::class, 'exportDataTidakNaikPDF']);
    Route::get('/data-tidak-naik-print', [ApiController::class, 'printDataTidakNaik']);


    /* PROFILE */

    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update/{id}', [UserController::class, 'update']);


    /* CHANGE PASSWORD */

    Route::post('/change-password', [UserController::class, 'changePassword']);


    /* EMAIL VERIFICATION */

    Route::get('/email/verify/{token}', [UserController::class, 'verifyAccount'])->name('user.verify');
    Route::post('/send-email/{id}', [UserController::class, 'sendVerifyAccount'])->name('user.resend');
    // Route::post('/email/verify/{id}', [UserController::class, 'sendVerifyAccount']);
    // Route::get('/email/verify-after/{token}', [UserController::class, 'verifyAccountAfter'])->name('account.verify');


    /* HISTORY PAGE */

    Route::get('/history', [ApiController::class, 'viewHistory'])->name('history');   
    Route::get('/history/my', [ApiController::class, 'viewMyHistory'])->name('myHistory');
    Route::get('/history/search', [ApiController::class, 'viewHistoryNew'])->name('historyNew');


    /* HELP CENTER */

    Route::get('/help', [ApiController::class, 'viewHelpCenter'])->name('help-center');
    Route::get('/help/general', [ApiController::class, 'viewGeneralHelp']);

});




/* ROUTE SUPER ADMIN */
Route::group(['prefix' => 'admin', 'middleware' => ['is_admin'] , ['revalidate']], function () {


    /* DASHBOARD */

    Route::get('/', [ApiController::class, 'adminDashboard']);


    /* KELAS */

    Route::get('/kelas', [AdminController::class, 'viewAllKelas']);
    Route::get('/kelas/create', [AdminController::class, 'createKelas']);
    Route::post('/kelas/store', [AdminController::class, 'storeKelas']);
    Route::get('/kelas/edit/{id}', [AdminController::class, 'editKelas']);
    Route::put('/kelas/update/{id}', [AdminController::class, 'updateKelas']);
    Route::get('/kelas/show/{id}', [AdminController::class, 'viewKelas']);
    Route::delete('/kelas/delete/{id}', [AdminController::class, 'deleteKelas']);


    /* ACCOUNT MANAGEMENT */

    Route::resource('/account', AccountController::class);


    /* JURUSAN */

    Route::get('/jurusan',[AdminController::class, 'viewAllJurusan']);
    Route::get('/detail-jurusan/{id}', [AdminController::class, 'viewJurusan']);
    Route::get('/jurusan/create', [AdminController::class, 'createJurusan']);
    Route::get('/jurusan/edit/{id}', [AdminController::class, 'editJurusan']);

    Route::post('/jurusan/store', [AdminController::class, 'storeJurusan']);
    Route::put('/jurusan/update/{id}', [AdminController::class, 'updateJurusan']);
    Route::delete('/jurusan/delete/{id}', [AdminController::class, 'deleteJurusan']);
    
    /* MAPEL */

    Route::get('/mata-pelajaran', [AdminController::class, 'viewAllMapel'])->name('view-all-mapel');
    Route::get('/detail-mata-pelajaran/{id}', [AdminController::class, 'viewDetailMapel']);
    Route::get('/mata-pelajaran/create', [AdminController::class, 'createMapel']);
    Route::get('/mata-pelajaran/edit/{id}', [AdminController::class, 'editMapel']);

    Route::post('/mata-pelajaran/store', [AdminController::class, 'storeMapel']);
    Route::put('/mata-pelajaran/update/{id}', [AdminController::class, 'updateMapel']);
    Route::delete('/mata-pelajaran/delete/{id}', [AdminController::class, 'deleteMapel']);


    /* MAPEL JURUSAN */
    Route::get('/mapel-jurusan', [AdminController::class, 'viewAllMapelJurusan']);

    Route::get('/detail-mapel-jurusan', function () {
        return view('admin.mapel-jurusan.detail-mapel-jurusan', [
            'title' => 'Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    Route::get('/mapel-jurusan/create', function () {
        return view('admin.mapel-jurusan.create-mapel-jurusan', [
            'title' => 'Create Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    Route::get('/mapel-jurusan/edit', function () {
        return view('admin.mapel-jurusan.edit-mapel-jurusan', [
            'title' => 'Edit Mata Pelajaran',
            'active' => 'database'
        ]);
    });


    /* LIVE SEARCH TEST */
    Route::get('/live-search-test', [ApiController::class, 'indexLiveSearch']);

    Route::get('/search', [ApiController::class, 'search']);
});


/* ROUTE USER SIMS (LOGIN & REGISTER) */

Route::get('/register', [UserController::class, 'registration'])->name('register.form');
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/registeruser', [UserController::class, 'register']);
Route::post('/loginuser', [UserController::class, 'authenticate']);
Route::get('/signout', [UserController::class, 'signOut']);


/* FORGOT PASSWORD */

Route::get('/forgot-password', [UserController::class, 'showForgetPasswordForm']);
Route::post('/forget-password', [UserController::class, 'submitForgetPasswordForm']);
Route::get('/reset-password/{token}/edit', [UserController::class, 'showResetPasswordForm'])->name('reset.password');
Route::patch('/reset-password', [UserController::class, 'submitResetPasswordForm'])->name('update.password');
