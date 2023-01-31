<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HelpCentreController;
use App\Http\Controllers\RekapNilaiController;
use App\Http\Controllers\MutasiMasukController;
use App\Http\Controllers\MapelJurusanController;
use App\Http\Controllers\MutasiKeluarController;
use App\Http\Controllers\SiswaTidakNaikController;
use App\Http\Controllers\RekapJumlahSiswaController;

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

    Route::get('/', [DashboardController::class, 'mainDashboard']);


    /* ROUTE SISWA */

    Route::get('/data-induk-siswa', [SiswaController::class, 'getAllSiswa']);
    Route::get('/detail/{nis}', [SiswaController::class, 'getSiswa']);
    Route::get('/tambah-data', [SiswaController::class, 'createSiswa']);
    Route::get('/edit-siswa/{nis}', [SiswaController::class, 'editSiswa']);
    

    /* GET DATA INDUK BY JURUSAN */

    Route::get('/data-induk-siswa/{jurusan}/{kelas}', [SiswaController::class, 'getSiswaByJurusanKelas']);


    // CRUD //
    Route::post('/api/siswa', [SiswaController::class, 'storeSiswa']);
    Route::put('/api/siswa/update/{nis}', [SiswaController::class, 'updateSiswa']);
    Route::delete('/api/siswa/delete/{nis}', [SiswaController::class, 'deleteSiswa']);

    Route::post('/api/siswa/import', [SiswaController::class, 'importDataSiswa']);

    Route::get('/data-siswa-pdf/{nis}', [SiswaController::class, 'exportDataSiswaPDF'])->name('siswa.pdf');
    Route::get('/data-siswa-print/{nis}', [SiswaController::class, 'printDataSiswa'])->name('siswa.print');

    Route::get('/data-induk-pdf', [SiswaController::class, 'exportDataIndukPDF']);
    Route::get('/data-induk-pdf/{jurusan}/{kelas}', [SiswaController::class, 'exportDataIndukPDF']);

    Route::get('/data-induk-print', [SiswaController::class, 'printDataInduk']);
    Route::get('/data-induk-print/{jurusan}/{kelas}', [SiswaController::class, 'printDataInduk']);
    
    Route::get('/data-induk-excel', [SiswaController::class, 'exportDataIndukExcel']);
    Route::get('/data-induk-excel/{jurusan}/{kelas}', [SiswaController::class, 'exportDataIndukExcel']);
    Route::get('/detail-data-induk/{nis}', [SiswaController::class, 'exportDetailDataIndukExcel']);

    Route::get('/get-request', [SiswaController::class, 'getRequest']);


    /* ROUTE MUTASI */

    // siswa-keluar
    Route::get('/siswa-keluar', [MutasiKeluarController::class, 'getAllMutasiKeluar']);
    Route::get('/create-mutasi-keluar', [MutasiKeluarController::class, 'createMutasiKeluar']);
    Route::get('/edit-mutasi-keluar/{id}', [MutasiKeluarController::class, 'editMutasiKeluar']);

    Route::post('/api/mutasi-keluar/store', [MutasiKeluarController::class, 'storeMutasiKeluar']);
    Route::put('/api/mutasi-keluar/update/{id}', [MutasiKeluarController::class, 'updateMutasiKeluar']);
    Route::delete('/api/mutasi-keluar/delete/{id}', [MutasiKeluarController::class, 'deleteMutasiKeluar']);

    Route::get('/mutasi-keluar-excel', [MutasiKeluarController::class, 'exportMutasiKeluarExcel']);
    Route::get('/mutasi-keluar-pdf', [MutasiKeluarController::class, 'exportMutasiKeluarPDF']);
    Route::get('/mutasi-keluar-print', [MutasiKeluarController::class, 'printMutasiKeluar']);

    
    // siswa-masuk
    Route::get('/siswa-masuk', [MutasiMasukController::class, 'getAllMutasiMasuk']);
    Route::get('/create-mutasi-masuk', [MutasiMasukController::class, 'createMutasiMasuk']);
    Route::get('/edit-mutasi-masuk/{id}', [MutasiMasukController::class, 'editMutasiMasuk']);

    Route::post('/api/mutasi-masuk/store', [MutasiMasukController::class, 'storeMutasiMasuk']);
    Route::put('/api/mutasi-masuk/update/{id}', [MutasiMasukController::class, 'updateMutasiMasuk']);
    Route::delete('/api/mutasi-masuk/delete/{id}', [MutasiMasukController::class, 'deleteMutasiMasuk']);

    Route::get('/mutasi-masuk-excel', [MutasiMasukController::class, 'exportMutasiMasukExcel']);
    Route::get('/mutasi-masuk-pdf', [MutasiMasukController::class, 'exportMutasiMasukPDF']);
    Route::get('/mutasi-masuk-print', [MutasiMasukController::class, 'printMutasiMasuk']);


     /* REKAP NILAI */

    Route::get('/rekap-nilai/{nis}', [RekapNilaiController::class, 'getRaportSiswa']);
    Route::get('/tambah-nilai/{nis}', [RekapNilaiController::class, 'viewTambahNilaiMapel']);
    Route::get('/edit-rekap-nilai/{RaportId}', [RekapNilaiController::class, 'editRekapNilai']);
    Route::post('/api/raport/tambah-nilai', [RekapNilaiController::class, 'storeTambahNilaiMapel']);
    Route::put('/api/raport/update-nilai', [RekapNilaiController::class, 'storeUpdateNilaiMapel']);
    Route::delete('/api/raport/delete/{RaportId}', [RekapNilaiController::class, 'deleteNilaiMapel']);

    Route::get('/rekap-nilai-excel/{nis}', [RekapNilaiController::class, 'exportRekapNilaiExcel']);
    Route::get('/rekap-nilai-print/{nis}', [RekapNilaiController::class, 'printRekapNilai']);
    Route::get('/rekap-nilai-pdf/{nis}', [RekapNilaiController::class, 'exportRekapNilaiPDF']);
    

    /* REKAP DATA SISWA */

    Route::get('/rekap-jumlah-siswa', [RekapJumlahSiswaController::class, 'rekapJumlahSiswa']);

    Route::get('/rekap-jumlah-siswa-pdf', [RekapJumlahSiswaController::class, 'exportRekapJumlahPDF']);
    Route::get('/rekap-jumlah-siswa-print', [RekapJumlahSiswaController::class, 'printRekapJumlah']);
    Route::get('/rekap-jumlah-siswa-excel', [RekapJumlahSiswaController::class, 'exportRekapJumlahExcel']);


    /* JURUSAN SISWA*/

    Route::get('/jurusan', [SiswaController::class, 'getJurusan']);

    
    /* ANGKATAN SISWA */

    Route::get('/angkatan', [SiswaController::class, 'getAngkatan']);


    /* ALUMNI */

    Route::get('/data-alumni', [AlumniController::class, 'viewAlumni']);
    Route::get('/data-alumni/all', [AlumniController::class, 'viewAlumni']);

    Route::get('/alumni-pdf', [AlumniController::class, 'exportAlumniPDF']);
    Route::get('/alumni-print', [AlumniController::class, 'printAlumni']);
    Route::get('/alumni-excel', [AlumniController::class, 'exportAlumniExcel']);

    Route::get('/select-jurusan-alumni', [AlumniController::class, 'selectJurusanAlumni']);
    Route::get('/select-angkatan-alumni', [AlumniController::class, 'selectAngkatanAlumni']);


    /* REKAP SISWA */

    Route::get('/rekap-siswa', [DashboardController::class, 'rekapSiswaDashboard']);


    /* DATA TIDAK NAIK KELAS */

    Route::get('/data-tidak-naik', [SiswaTidakNaikController::class, 'siswaTidakNaik']);

    Route::get('/data-tidak-naik-excel', [SiswaTidakNaikController::class, 'exportDataTidakNaikExcel']);
    Route::get('/data-tidak-naik-pdf', [SiswaTidakNaikController::class, 'exportDataTidakNaikPDF']);
    Route::get('/data-tidak-naik-print', [SiswaTidakNaikController::class, 'printDataTidakNaik']);


    /* PROFILE */

    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update/{id}', [UserController::class, 'update']);


    /* CHANGE PASSWORD */

    Route::post('/change-password', [UserController::class, 'changePassword']);


    /* EMAIL VERIFICATION */

    Route::get('/email/verify/{token}', [UserController::class, 'verifyAccount'])->name('user.verify');
    Route::post('/send-email/{id}', [UserController::class, 'sendVerifyAccount'])->name('user.resend');


    /* HISTORY PAGE */

    Route::get('/history', [HistoryController::class, 'viewHistory'])->name('history');   
    Route::get('/history/my', [HistoryController::class, 'viewMyHistory'])->name('myHistory');
    Route::get('/history/search', [HistoryController::class, 'viewHistoryNew'])->name('historyNew');


    /* HELP CENTER */

    Route::get('/help', [HelpCentreController::class, 'viewHelpCenter'])->name('help-center');
    Route::get('/help/general', [HelpCentreController::class, 'viewGeneralHelp']);

});




/* ROUTE SUPER ADMIN */
Route::group(['prefix' => 'admin', 'middleware' => ['is_admin'] , ['revalidate']], function () {


    /* DASHBOARD */

    Route::get('/', [DashboardController::class, 'adminDashboard']);


    /* KELAS */

    Route::get('/kelas', [KelasController::class, 'viewAllKelas']);
    Route::get('/kelas/create', [KelasController::class, 'createKelas']);
    Route::post('/kelas/store', [KelasController::class, 'storeKelas']);
    Route::get('/kelas/edit/{id}', [KelasController::class, 'editKelas']);
    Route::put('/kelas/update/{id}', [KelasController::class, 'updateKelas']);
    Route::get('/kelas/show/{id}', [KelasController::class, 'viewKelas']);
    Route::delete('/kelas/delete/{id}', [KelasController::class, 'deleteKelas']);


    /* ACCOUNT MANAGEMENT */

    Route::resource('/account', AccountController::class);


    /* JURUSAN */

    Route::get('/jurusan',[JurusanController::class, 'viewAllJurusan']);
    Route::get('/detail-jurusan/{id}', [JurusanController::class, 'viewJurusan']);
    Route::get('/jurusan/create', [JurusanController::class, 'createJurusan']);
    Route::get('/jurusan/edit/{id}', [JurusanController::class, 'editJurusan']);

    Route::post('/jurusan/store', [JurusanController::class, 'storeJurusan']);
    Route::put('/jurusan/update/{id}', [JurusanController::class, 'updateJurusan']);
    Route::delete('/jurusan/delete/{id}', [JurusanController::class, 'deleteJurusan']);
    
    /* MAPEL */

    Route::get('/mata-pelajaran', [MapelController::class, 'viewAllMapel'])->name('view-all-mapel');
    Route::get('/detail-mata-pelajaran/{id}', [MapelController::class, 'viewDetailMapel']);
    Route::get('/mata-pelajaran/create', [MapelController::class, 'createMapel']);
    Route::get('/mata-pelajaran/edit/{id}', [MapelController::class, 'editMapel']);

    Route::post('/mata-pelajaran/store', [MapelController::class, 'storeMapel']);
    Route::put('/mata-pelajaran/update/{id}', [MapelController::class, 'updateMapel']);
    Route::delete('/mata-pelajaran/delete/{id}', [MapelController::class, 'deleteMapel']);


    /* MAPEL JURUSAN */
    Route::get('/mapel-jurusan', [MapelJurusanController::class, 'viewAllMapelJurusan']);
    Route::get('/detail-mapel-jurusan/{id}', [MapelJurusanController::class, 'viewDetailMapelJurusan']);
    Route::get('/mapel-jurusan/create', [MapelJurusanController::class, 'createMapelJurusan']);
    Route::get('/mapel-jurusan/edit/{id}', [MapelJurusanController::class, 'editMapelJurusan']);
    
    Route::post('/mapel-jurusan/store', [MapelJurusanController::class, 'storeMapelJurusan']);
    Route::put('/mapel-jurusan/update/{id}', [MapelJurusanController::class, 'updateMapelJurusan']);
    Route::delete('/mapel-jurusan/delete/{id}', [MapelJurusanController::class, 'deleteMapelJurusan']);


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
