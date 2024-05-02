<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('beranda');
});


Route::middleware(['auth'])->group(function ()
{
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/kategori-magang', [MagangController::class, 'index']);
    // Mahasiswa
    Route::get('/pendaftaran/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/dokumen/mahasiswa', [MahasiswaController::class, 'dokumen']);
    Route::post('/pendaftaran/mahasiswa', [MahasiswaController::class, 'store']);
    // Siswa
    Route::get('/pendaftaran/siswa', [SiswaController::class, 'index']);
    Route::get('/dokumen/siswa', [SiswaController::class, 'dokumen']);
    Route::post('/pendaftaran/siswa', [SiswaController::class, 'store']);
    // File Pendaftaran
    Route::get('/file/create', [FileController::class, 'create'])->name('files.create');
    Route::view('/berhasil-input-data-siswa', 'user.kirim')->name('berhasil');
    Route::view('/berhasil-kirim-dokumen-siswa', 'user.dokumen_kirim')->name('dokumen_kirim');
    Route::post('/file', [FileController::class, 'store'])->name('files.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');