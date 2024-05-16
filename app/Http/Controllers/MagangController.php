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

    public function status($id)
    {
        $pemagang = Mahasiswa::find(2);
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
        } elseif ($pemagang->status === 'diterima' || $pemagang->status === 'ditolak') {
            $progress = 100;
            $status = 'Pendaftaran Selesai';
        }
        return view('user.status_pengajuan', compact('pemagang', 'progress', 'status'));

    }

    public function updateStatus(Request $request, $id)
    {
        $pemagang = Mahasiswa::findOrFail($id);
        $pemagang->status = $request->status;
        $pemagang->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diubah.');
    }
}