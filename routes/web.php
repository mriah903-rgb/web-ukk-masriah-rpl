<?php

use Illuminate\Support\Facades\Route;


// =========================================================
// CONTROLLER PUBLIC
// =========================================================

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\OsisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


// =========================================================
// CONTROLLER ADMIN
// =========================================================

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminOsisController;


/*
|--------------------------------------------------------------------------
| ROUTE PUBLIC / PENGUNJUNG
|--------------------------------------------------------------------------
*/


// =========================================================
// BERANDA
// =========================================================

Route::get('/', [HomeController::class, 'index'])
    ->name('beranda');

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/home/beranda', [HomeController::class, 'index'])
    ->name('home.beranda');


// =========================================================
// BERITA
// =========================================================

Route::get('/berita', [BeritaController::class, 'index'])
    ->name('berita.index');

Route::get('/berita/{slug}', [BeritaController::class, 'show'])
    ->name('berita.show');


// =========================================================
// EKSTRAKURIKULER
// =========================================================

Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'publik'])
    ->name('ekstrakurikuler.index');

Route::get('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'show'])
    ->name('ekstrakurikuler.show');


// =========================================================
// GALERI
// =========================================================

Route::get('/galeri', [GaleriController::class, 'publik'])
    ->name('galeri.index');

Route::get('/galeri/{id}', [GaleriController::class, 'show'])
    ->name('galeri.show');


// =========================================================
// GURU
// =========================================================

Route::get('/guru', [GuruController::class, 'publik'])
    ->name('guru.index');

Route::get('/guru/{guru}', [GuruController::class, 'show'])
    ->name('guru.show');


// =========================================================
// JURUSAN
// =========================================================

Route::get('/jurusan', [JurusanController::class, 'publik'])
    ->name('jurusan.index');

Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])
    ->name('jurusan.show');


// =========================================================
// PROFIL SEKOLAH
// =========================================================

Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])
    ->name('profil-sekolah');


// =========================================================
// OSIS PUBLIC
// =========================================================

Route::get('/osis', [OsisController::class, 'index'])
    ->name('osis.index');

Route::get('/osis/{osi}', [OsisController::class, 'show'])
    ->name('osis.show');


// =========================================================
// AUTHENTICATION
// =========================================================


// ---------------------------------------------------------
// LOGIN
// ---------------------------------------------------------

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'proses'])
    ->name('login.proses');


// ---------------------------------------------------------
// LOGOUT
// ---------------------------------------------------------

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


// ---------------------------------------------------------
// REGISTER
// ---------------------------------------------------------

Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');



/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
|
| Semua route di bawah ini otomatis memiliki:
|
| URL  : /admin/...
| Name : admin....
|
| dan hanya bisa diakses oleh role admin.
|
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('role:admin')
    ->group(function () {


        // =====================================================
        // DASHBOARD
        // =====================================================
    
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');


        // =====================================================
        // BERITA ADMIN
        // =====================================================
    
        Route::get('/berita', [BeritaController::class, 'adminIndex'])
            ->name('berita.index');

        Route::get('/berita/create', [BeritaController::class, 'create'])
            ->name('berita.create');

        Route::post('/berita', [BeritaController::class, 'store'])
            ->name('berita.store');

        Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])
            ->name('berita.edit');

        Route::put('/berita/{berita}', [BeritaController::class, 'update'])
            ->name('berita.update');

        Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])
            ->name('berita.destroy');


        // =====================================================
        // EKSTRAKURIKULER ADMIN
        // =====================================================
    
        Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])
            ->name('ekstrakurikuler.index');

        Route::get('/ekstrakurikuler/create', [EkstrakurikulerController::class, 'create'])
            ->name('ekstrakurikuler.create');

        Route::post('/ekstrakurikuler', [EkstrakurikulerController::class, 'store'])
            ->name('ekstrakurikuler.store');

        Route::get('/ekstrakurikuler/{ekstrakurikuler}/edit', [EkstrakurikulerController::class, 'edit'])
            ->name('ekstrakurikuler.edit');

        Route::put('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'update'])
            ->name('ekstrakurikuler.update');

        Route::delete('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'destroy'])
            ->name('ekstrakurikuler.destroy');


        // =====================================================
        // GALERI ADMIN
        // =====================================================
    
        Route::get('/galeri', [GaleriController::class, 'index'])
            ->name('galeri.index');

        Route::get('/galeri/create', [GaleriController::class, 'create'])
            ->name('galeri.create');

        Route::post('/galeri', [GaleriController::class, 'store'])
            ->name('galeri.store');

        Route::get('/galeri/{galeri}/edit', [GaleriController::class, 'edit'])
            ->name('galeri.edit');

        Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])
            ->name('galeri.update');

        Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])
            ->name('galeri.destroy');


        // =====================================================
        // GURU ADMIN
        // =====================================================
    
        Route::get('/guru', [GuruController::class, 'index'])
            ->name('guru.index');

        Route::get('/guru/create', [GuruController::class, 'create'])
            ->name('guru.create');

        Route::post('/guru', [GuruController::class, 'store'])
            ->name('guru.store');

        Route::get('/guru/{guru}/edit', [GuruController::class, 'edit'])
            ->name('guru.edit');

        Route::put('/guru/{guru}', [GuruController::class, 'update'])
            ->name('guru.update');

        Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])
            ->name('guru.destroy');


        // =====================================================
        // JURUSAN ADMIN
        // =====================================================
    
        Route::get('/jurusan', [JurusanController::class, 'index'])
            ->name('jurusan.index');

        Route::get('/jurusan/create', [JurusanController::class, 'create'])
            ->name('jurusan.create');

        Route::post('/jurusan', [JurusanController::class, 'store'])
            ->name('jurusan.store');

        Route::get('/jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])
            ->name('jurusan.edit');

        Route::put('/jurusan/{jurusan}', [JurusanController::class, 'update'])
            ->name('jurusan.update');

        Route::delete('/jurusan/{jurusan}', [JurusanController::class, 'destroy'])
            ->name('jurusan.destroy');


        // =====================================================
        // OSIS ADMIN
        // =====================================================
    
        Route::get('/osis', [AdminOsisController::class, 'index'])
            ->name('osis.index');

        Route::get('/osis/create', [AdminOsisController::class, 'create'])
            ->name('osis.create');

        Route::post('/osis', [AdminOsisController::class, 'store'])
            ->name('osis.store');

        Route::get('/osis/{osi}/edit', [AdminOsisController::class, 'edit'])
            ->name('osis.edit');

        Route::put('/osis/{osi}', [AdminOsisController::class, 'update'])
            ->name('osis.update');

        Route::delete('/osis/{osi}', [AdminOsisController::class, 'destroy'])
            ->name('osis.destroy');


        // =====================================================
        // PROFIL SEKOLAH ADMIN
        // =====================================================
    
        Route::get('/profil-sekolah', [ProfilSekolahController::class, 'adminIndex'])
            ->name('profilsekolah.index');

        Route::get('/profil-sekolah/create', [ProfilSekolahController::class, 'create'])
            ->name('profilsekolah.create');

        Route::post('/profil-sekolah', [ProfilSekolahController::class, 'store'])
            ->name('profilsekolah.store');

        Route::get('/profil-sekolah/edit', [ProfilSekolahController::class, 'edit'])
            ->name('profilsekolah.edit');

        Route::put('/profil-sekolah', [ProfilSekolahController::class, 'update'])
            ->name('profilsekolah.update');


        // =====================================================
        // BANNER ADMIN
        // =====================================================
    
        Route::get('/banner', [AdminBannerController::class, 'index'])
            ->name('banner.index');

        Route::get('/banner/create', [AdminBannerController::class, 'create'])
            ->name('banner.create');

        Route::post('/banner', [AdminBannerController::class, 'store'])
            ->name('banner.store');

        Route::get('/banner/{banner}/edit', [AdminBannerController::class, 'edit'])
            ->name('banner.edit');

        Route::put('/banner/{banner}', [AdminBannerController::class, 'update'])
            ->name('banner.update');

        Route::delete('/banner/{banner}', [AdminBannerController::class, 'destroy'])
            ->name('banner.destroy');

    });