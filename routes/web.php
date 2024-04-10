<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('beranda');
});


Route::middleware(['auth'])->group(function ()
{
    Route::get('/kategori-magang', [MagangController::class, 'index']);
    Route::get('/pendaftaran/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/dokumen/mahasiswa', [MahasiswaController::class, 'dokumen']);
    Route::post('/pendaftaran/mahasiswa', [MahasiswaController::class, 'store']);
    Route::get('/file/create', [FileController::class, 'create'])->name('files.create');
    Route::view('/berhasil-input-data', 'user.kirim')->name('berhasil');
    Route::view('/berhasil-kirim-dokumen', 'user.dokumen_kirim')->name('dokumen_kirim');
    Route::post('/file', [FileController::class, 'store'])->name('files.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
