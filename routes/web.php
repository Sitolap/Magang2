<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('beranda');
});


Route::middleware(['auth'])->group(function ()
{
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    Route::get('/kategori-magang', [MagangController::class, 'index'])->name('kategori-magang');;
    // Mahasiswa
    Route::get('/pendaftaran-mahasiswa', [MahasiswaController::class, 'index'])->name('pendaftaran.mahasiswa');
    Route::get('/dokumen/mahasiswa', [MahasiswaController::class, 'dokumen']);
    Route::post('/pendaftaran/mahasiswa', [MahasiswaController::class, 'store']);
    // Siswa
    Route::get('/pendaftaran/siswa', [SiswaController::class, 'index']);
    Route::get('/dokumen/siswa', [SiswaController::class, 'dokumen']);
    Route::post('/pendaftaran/siswa', [SiswaController::class, 'store']);
    // status
    Route::get('/status/{id}/pengajuan', [MagangController::class, 'status'])->name('status');
    Route::patch('/update-status', [MagangController::class, 'updateStatus']);
    // File Pendaftaran
    Route::get('/file/create', [FileController::class, 'create'])->name('files.create');
    Route::view('/berhasil-input-data-siswa', 'user.kirim')->name('berhasil');
    Route::view('/berhasil-kirim-dokumen-siswa', 'user.dokumen_kirim')->name('dokumen_kirim');
    Route::post('/file', [FileController::class, 'store'])->name('files.store');
    Route::get('/file/{id}', [FileController::class, 'file']);
    // admin
    Route::get('/pengajuan-magang', [AdminController::class, 'index'])->name('pengajuan.magang');
    Route::get('/daftar-pemagang',  [AdminController::class, 'pemagang'])->name('pemagang');
    Route::get('/pemagang/{id}/detail', [AdminController::class, 'detail'])->name('detail');
    Route::post('/admin/internship-applications/{pemagang}/update-status', [AdminController::class, 'updateStatus'])->name('admin.pemagang.update-status');

});

Auth::routes();









// Route::get('/detail', function () {
//     return view('admin/detail')->name('detail');
// });

Route::get('/detail-terima', function () {
    return view('admin/detail-terima')->name('detail.terima');
});