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
    Route::get('/kategori-magang', [MagangController::class, 'index'])->name('kategori-magang');
    Route::get('/surat-balasan', [MagangController::class, 'balasan'])->name('balasan');
    Route::get('/nilai', [MagangController::class, 'nilai'])->name('nilai');
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
    Route::get('/pemagang/{pemagang}/detail', [AdminController::class, 'detail'])->name('detail');
    Route::post('/admin/internship-applications/{pemagang}/update-status', [AdminController::class, 'updateStatus'])->name('admin.pemagang.update-status');
    Route::get('/mahasiswa/search', [AdminController::class, 'search'])->name('mahasiswa.search');
    Route::get('/pemagang/sortir', [AdminController::class, 'sortir'])->name('pemagang.sortir');
    Route::get('/admin/files/{id}', [FileController::class, 'file'])->name('admin.files');
    Route::post('/admin/pemagang/{id}/accept', [MagangController::class, 'accept'])->name('admin.pemagang.accept');
    Route::post('/admin/pemagang/{id}/reject', [MagangController::class, 'reject'])->name('admin.pemagang.reject');
    Route::get('pemagang/{id}', [MagangController::class, 'show'])->name('pemagang.show');
    Route::get('/pemagang/surat-balasan/{id}', [MagangController::class, 'suratBalasan'])->name('user.surat_balasan');
    Route::get('/pemagang/download-surat-balasan/{id}', [MagangController::class, 'downloadSuratBalasan'])->name('admin.download_surat_balasan');
    Route::get('/mahasiswas/{id}/edit', [AdminController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/mahasiswas/{id}', [AdminController::class, 'update'])->name('pengajuan.update');

    // Route::get('/dashboard', [AdminController::class, 'magang']);



});

Auth::routes();









// Route::get('/detail', function () {
//     return view('admin/detail')->name('detail');
// });

Route::get('/detail-terima', function () {
    return view('admin/detail-terima')->name('detail.terima');
});