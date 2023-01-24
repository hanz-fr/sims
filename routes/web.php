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

    /* ADMIN DASHBOARD */

    Route::get('/admin', [ApiController::class, 'adminDashboard'])->middleware('is_admin');

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
    Route::get('/edit-profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/update-profile/{id}', [UserController::class, 'update']);
    Route::post('/change-password', [UserController::class, 'changePassword']);

    Route::get('/email/verify/{id}', [UserController::class, 'sendVerifyAccount']);
    Route::get('/email/verify-after/{token}', [UserController::class, 'verifyAccountAfter'])->name('account.verify');


    /* ACCOUNT MANAGEMENT */
    Route::resource('/account', AccountController::class);


    /* HISTORY PAGE */
    Route::get('/history', [ApiController::class, 'viewHistory'])->name('history');   
    Route::get('/history/my', [ApiController::class, 'viewMyHistory'])->name('myHistory');
    Route::get('/history/search', [ApiController::class, 'viewHistoryNew'])->name('historyNew');

    /* HELP CENTER */
    Route::get('/help', [ApiController::class, 'viewHelpCenter'])->name('help-center');
    Route::get('/help/general', [ApiController::class, 'viewGeneralHelp']);

});




/* ROUTE SUPER ADMIN */
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin', 'revalidate']], function () {

    // /* ADMIN DASHBOARD */
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard', [
    //         'title' => 'Dashboard Admin SIMS',
    //         'active' => 'admin'
    //     ]);
    // })->name('admin.dashboard');


    // DATABASE DASHBOARD
    Route::get('/database', function () {
        return view('admin.dashboard-database', [
            'title' => 'Database SIMS',
            'active' => 'database'
        ]);
    });
    

    /* ACCOUNT MANAGEMENT */
    Route::delete('/manage/destroy-all', [AccountController::class, 'destroyAll'])->name('manage.destroy-all');


    /* SISWA */
    Route::get('/siswa', function () {
        return view('admin.siswa.all-siswa-admin', [
            'title' => 'Data All Siswa',
            'active' => 'database'
        ]);
    });

    Route::get('/siswa-detail', function () {
        return view('admin.siswa.detail-siswa-admin', [
            'title' => 'Detail Siswa',
            'active' => 'database'
        ]);
    });

    Route::get('/siswa/create', function () {
        return view('admin.siswa.add-siswa-admin', [
            'title' => 'Create Siswa',
            'active' => 'database'
        ]);
    });
    

    /* KELAS */
    Route::get('/kelas', function () {
        return view('admin.kelas.show-all-kelas', [
            'title' => 'List All Kelas',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-kelas', function () {
        return view('admin.kelas.detail-kelas', [
            'title' => 'Detail Kelas',
            'active' => 'database'
        ]);
    });

    Route::get('/kelas/create', function () {
        return view('admin.kelas.tambah-kelas-admin', [
            'title' => 'Create Kelas',
            'active' => 'database'
        ]);
    });

    Route::get('/kelas/edit', function () {
        return view('admin.kelas.edit-kelas-admin', [
            'title' => 'Edit Kelas',
            'active' => 'database'
        ]);
    });


    /* JURUSAN */
    Route::get('/jurusan', function () {
        return view('admin.jurusan.show-jurusan', [
            'title' => 'Jurusan',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-jurusan', function () {
        return view('admin.jurusan.show-detail-jurusan', [
            'title' => 'Detail Jurusan',
            'active' => 'database'
        ]);
    });

    Route::get('/jurusan/create', function () {
        return view('admin.jurusan.create-show-jurusan', [
            'title' => 'Create Jurusan',
            'active' => 'database'
        ]);
    });

    Route::get('/jurusan/edit', function () {
        return view('admin.jurusan.update-show-jurusan', [
            'title' => 'Edit Jurusan',
            'active' => 'database'
        ]);
    });


    // MAPEL
    Route::get('/mata-pelajaran', function () {
        return view('admin.all-mapel.all-mapel', [
            'title' => 'Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-mata-pelajaran', function () {
        return view('admin.all-mapel.detail-all-mapel', [
            'title' => 'Detail Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    Route::get('/mata-pelajaran/create', function () {
        return view('admin.all-mapel.create-all-mapel', [
            'title' => 'Create Mata Pelajaran',
            'active' => 'database'
        ]);
    });

    Route::get('/mata-pelajaran/edit', function () {
        return view('admin.all-mapel.edit-all-mapel', [
            'title' => 'Edit Mata Pelajaran',
            'active' => 'database'
        ]);
    });


    /* MAPEL JURUSAN */
    Route::get('/mapel-jurusan', function () {
        return view('admin.mapel-jurusan.mapel-jurusan', [
            'title' => 'Mata Pelajaran Jurusan',
            'active' => 'database'
        ]);
    });

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


    // MUTASI
    Route::get('/mutasi', function () {
        return view('admin.mutasi.show-all-mutasi', [
            'title' => 'Data Mutasi',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-mutasi', function () {
        return view('admin.mutasi.detail', [
            'title' => 'Detail Mutasi Keluar',
            'active' => 'database'
        ]);
    });

    Route::get('/mutasi/create', function () {
        return view('admin.mutasi.create', [
            'title' => 'Add Mutasi Keluar',
            'active' => 'database'
        ]);
    });

    Route::get('/mutasi/edit', function () {
        return view('admin.mutasi.edit', [
            'title' => 'Edit Mutasi Keluar',
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

    Route::get('/detail-rapor', function () {
        return view('admin.raport.detail-rapor', [
            'title' => 'Detail Rapor',
            'active' => 'database'
        ]);
    });

    Route::get('/rapor/edit', function () {
        return view('admin.raport.edit-rapor', [
            'title' => 'Edit Rapor',
            'active' => 'database'
        ]);
    });

    Route::get('/rapor/create', function () {
        return view('admin.raport.create-rapor', [
            'title' => 'Create Rapor',
            'active' => 'database'
        ]);
    });


    // NILAI MAPEL
    Route::get('/nilai-mapel', function () {
        return view('admin.nilai-mapel.show-nilai-mapel', [
            'title' => 'Nilai Mapel',
            'active' => 'database'
        ]);
    });

    Route::get('/detail-nilai-mapel', function () {
        return view('admin.nilai-mapel.detail-nilai-mapel', [
            'title' => 'Detail Nilai Mapel',
            'active' => 'database'
        ]);
    });

    Route::get('/nilai-mapel/create', function () {
        return view('admin.nilai-mapel.create-nilai-mapel', [
            'title' => 'Create Nilai Mapel',
            'active' => 'database'
        ]);
    });

    Route::get('/nilai-mapel/edit', function () {
        return view('admin.nilai-mapel.edit-nilai-mapel', [
            'title' => 'Edit Nilai Mapel',
            'active' => 'database'
        ]);
    });


    /* LIVE SEARCH TEST */
    Route::get('/live-search-test', [ApiController::class, 'indexLiveSearch']);

    Route::get('/search', [ApiController::class, 'search']);
});

    /* ADMIN LOGIN */
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.login');
    // Route::post('/login-admin', [AdminController::class, 'handleLogin']);
    // Route::get('/admin/logout', [AdminController::class, 'logout']);


// ROUTE USER SIMS (LOGIN & REGISTER)
Route::get('/register', [UserController::class, 'registration'])->name('register.form');
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/registeruser', [UserController::class, 'register']);
Route::post('/loginuser', [UserController::class, 'authenticate']);
Route::get('/signout', [UserController::class, 'signOut']);

Route::get('email/verify/{token}', [UserController::class, 'verifyAccount'])->name('user.verify');
Route::post('/resend-email/{id}', [UserController::class, 'resend'])->name('user.resend');


Route::get('/forgot-password', [UserController::class, 'showForgetPasswordForm']);
Route::post('/forget-password', [UserController::class, 'submitForgetPasswordForm']);
Route::get('/reset-password/{token}/edit', [UserController::class, 'showResetPasswordForm'])->name('reset.password');
Route::patch('/reset-password', [UserController::class, 'submitResetPasswordForm'])->name('update.password');
