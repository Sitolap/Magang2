<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MagangController extends Controller
{
    public function index()
    {
        return view('kategori');
    }

    public function status(Request $request, $id)
    {
        $pemagang = Mahasiswa::find(1);
        $progress = 0;
        $status = 'Pengajuan Terkirim';

        if ($pemagang->status === 'pengajuan_dilihat') {
            $progress = 25;
            $status = 'Pengajuan Dilihat';
        } elseif ($pemagang->status === 'surat_balasan_dibuat') {
            $progress = 50;
            $status = 'Surat Balasan Dibuat';
        } elseif ($pemagang->status === 'surat_balasan_tersedia') {
            $progress = 75;
            $status = 'Surat Balasan Tersedia';
        } elseif ($pemagang->status === 'diterima') {
            $progress = 100;
            $status = 'Pendaftaran Selesai';
        } elseif ($pemagang->status === 'ditolak') {
            $progress = 0;
            $status = 'Pendaftaran Ditolak';
        }
        return view('user.status_pengajuan', compact('pemagang', 'progress', 'status'));

    }

    // AdminController.php

public function accept($id)
{
    $pemagang = Mahasiswa::findOrFail(1);
    $pemagang->status = 'surat balasan dibuat';
    $pemagang->save();

    return redirect()->back()->with('success', 'Status pemagang telah diubah menjadi Surat Balasan Dibuat.');
}

public function reject($id)
{
    $pemagang = Mahasiswa::findOrFail(1);
    $pemagang->status = 'ditolak';
    $pemagang->save();

    return redirect()->back()->with('success', 'Status pemagang telah diubah menjadi Pengajuan Magang Anda Ditolak.');
}


}