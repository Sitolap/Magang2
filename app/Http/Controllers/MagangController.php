<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as DomPDF;

class MagangController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pemagang = Mahasiswa::where('user_id', $user->id)->first();

        if ($pemagang) {
            // Jika pengguna sudah mendaftar
            return view('user.status_pengajuan', compact('pemagang'));
        } else {
            // Jika pengguna baru dan belum mendaftar
            return view('user.kategori');
        }

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
        return view('user.status_pengajuan', compact('pemagang', 'progress', 'status', 'id'));

    }


    // AdminController.php

    public function accept($id)
    {
        
        try {
            $pemagang = Mahasiswa::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
        }
        $pemagang->status = 'diterima';
        $pemagang->save();

        $pdf =  DomPDF::loadView('user.surat_balasan', ['pemagang' => $pemagang]);

        // Simpan file PDF ke storage
        $path = storage_path('app/public/surat_balasan_' . $pemagang->id . '.pdf');
        $pdf->save($path);
        return redirect()->route('user.surat_balasan', ['id' => $pemagang->id])->with('success', 'Status pemagang telah diubah menjadi Diterima.');
    }

    public function reject($id)
    {
        $pemagang = Mahasiswa::findOrFail($id);
        $pemagang->status = 'ditolak';
        $pemagang->save();

        return redirect()->back()->with('success', 'Status pemagang telah diubah menjadi Pengajuan Magang Anda Ditolak.');
    }

    public function show()
    {
        return view('user.show');
    }
    public function nilai()
    {
        return view('user.sertifikat_nilai');
    }

    public function suratBalasan($id)
    {
        $pemagang = Mahasiswa::findOrFail($id);
        return view('user.surat_balasan', compact('pemagang'));
    }

    public function downloadSuratBalasan($id)
    {
        $pemagang = Mahasiswa::findOrFail($id);
        $pdf =  DomPDF::loadView('user.surat_balasan', compact('pemagang'));

        return $pdf->download('surat_balasan_' . $pemagang->id . '.pdf');
    }

}