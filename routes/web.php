<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstansiController;
use App\Http\Controllers\Admin\PenerimaanController;
use App\Http\Controllers\Admin\BerkasController;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', [MainController::class, 'index'])->name('home');

// Auth
Route::get('masuk', [AuthController::class, 'index'])->name('masuk');
Route::post('prosesMasuk', [AuthController::class, 'prosesMasuk'])->name('prosesMasuk');
Route::get('daftar', [AuthController::class, 'daftar'])->name('daftar');
Route::post('prosesDaftar', [AuthController::class, 'prosesDaftar'])->name('prosesDaftar');
Route::get('keluar', [AuthController::class, 'keluar'])->name('keluar');

// Google Auth
Route::get('/auth/google-login', [AuthController::class, 'googleLogin'])->name('googleLogin');
Route::get('/auth/google-callback', [AuthController::class, 'googleHandleCallback'])->name('googleCallback');

// Admin
Route::middleware(['checkLogin:admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Instansi
    Route::get('/instansi', [InstansiController::class, 'index'])->name('instansiIndex');
    Route::post('/instansi', [InstansiController::class, 'store'])->name('instansiStore');
    Route::patch('/instansi/{id}', [InstansiController::class, 'update'])->name('instansiUpdate');
    Route::delete('/instansi/{id}', [InstansiController::class, 'destroy'])->name('instansiDestroy');

    // Penerimaan
    Route::get('/penerimaan', [PenerimaanController::class, 'index'])->name('penerimaanIndex');
    Route::post('/penerimaan', [PenerimaanController::class, 'store'])->name('penerimaanStore');
    Route::patch('/penerimaan/{id}', [PenerimaanController::class, 'update'])->name('penerimaanUpdate');
    Route::delete('/penerimaan/{id}', [PenerimaanController::class, 'destroy'])->name('penerimaanDestroy');

    // Berkas
    Route::get('/berkas', [BerkasController::class, 'index'])->name('berkasIndex');
    Route::post('/berkas/{id}', [BerkasController::class, 'buatPengumuman'])->name('buatPengumuman');

    // Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('adminIndex');
    Route::post('/admin', [AdminController::class, 'store'])->name('adminStore');
    Route::patch('/admin/{id}', [AdminController::class, 'update'])->name('adminUpdate');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('adminDestroy');
});

Route::middleware(['checkLogin:karyawan'])->get('upload', [MainController::class, 'upload'])->name('upload');
Route::middleware(['checkLogin:karyawan'])->get('penerima', [MainController::class, 'penerima'])->name('penerima');
Route::get('instansi', [MainController::class, 'instansi'])->name('instansi');
Route::middleware(['checkLogin:karyawan'])->get('pengumuman', [MainController::class, 'pengumuman'])->name('pengumuman');

Route::middleware(['checkLogin:karyawan'])->post('upload', [MainController::class, 'uploadBerkas'])->name('uploadBerkas');

