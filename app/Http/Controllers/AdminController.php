<?php

namespace App\Http\Controllers;

use Laracsv\Export;
use App\Models\File;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\PemagangExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
{
    public function index()
    {
        $pemagang = Mahasiswa::paginate(3);

        return view('admin.pengajuan-magang', compact('pemagang'));
    }

    public function detail($id)
    {
        $pemagang = Mahasiswa::find($id);
        if (!$pemagang) {
            return redirect()->back()->with('error', 'Pemagang tidak ditemukan.');
        }
        $files = File::where('user_id', $id)->get();
        return view('admin.detail', compact('pemagang', 'files'));
    }

    public function detail_terima($id)
    {
        $pemagang = Mahasiswa::find($id);
        return view('admin.detail-terima', compact('pemagang'));
    }

    public function updatePenempatanPenugasan(Request $request, $id)
    {
        $request->validate([
            'penempatan' => 'required|string|max:255',
            'penugasan' => 'required|string|max:255',
        ]);

        $pemagang = Mahasiswa::findOrFail($id);

        if ($request->hasFile('surat_balasan')) {
            $pemagang->surat_balasan = $request->file('surat_balasan')->store('documents', 'public');
        }

        if ($request->hasFile('id_card')) {
            $pemagang->id_card = $request->file('id_card')->store('documents', 'public');
        }

        if ($request->hasFile('sertifikat')) {
            $pemagang->sertifikat = $request->file('sertifikat')->store('documents', 'public');
        }

        if ($request->hasFile('surat_keterangan')) {
            $pemagang->surat_keterangan = $request->file('surat_keterangan')->store('documents', 'public');
        }

        $pemagang->penempatan = $request->input('penempatan');
        $pemagang->penugasan = $request->input('penugasan');
        $pemagang->save();

        return redirect()->back()->with('success', 'Dokumen berhasil diunggah dan informasi diperbarui.');


    }
    public function pemagang()
    {
        $pemagang = Mahasiswa::where('status', 'diterima')->get();
        return view('admin.daftar-pemagang', compact('pemagang'));
    }

    public function updateStatus(Request $request, $id)
    {
        $applicant = Mahasiswa::find($id);
        $applicant->status = $request->status;
        $applicant->save();

        if ($request->status == 'surat balasan tersedia') {
            // Logic to upload the response letter
            $applicant->response_document = $request->file('response_document')->store('responses');
            $applicant->save();
        }

        return redirect()->route('detail', $id);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $pemagang = Mahasiswa::where('nama', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('nama_universitas', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('anggota_kelompok', 'LIKE', "%{$searchTerm}%")
                            ->paginate(3);

        return view('admin.pengajuan-magang', compact('pemagang'));
    }
    public function search_terima(Request $request)
    {
        $searchTerm = $request->input('search');

        $pemagang = Mahasiswa::where('nama', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('nama_universitas', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('penempatan', 'LIKE', "%{$searchTerm}%")
                            ->paginate(3);

        return view('admin.detail-terima', compact('pemagang'));
    }

    public function sortir(Request $request)
    {
        $sortBy = $request->input('sort_by');

        switch ($sortBy) {
            case 'nama_asc':
                $pemagang = Mahasiswa::orderBy('nama', 'asc')->paginate(3);
                break;
            case 'nama_desc':
                $pemagang = Mahasiswa::orderBy('nama', 'desc')->paginate(3);
                break;
            case 'instansi_asc':
                $pemagang = Mahasiswa::orderBy('instansi', 'asc')->paginate(3);
                break;
            case 'instansi_desc':
                $pemagang = Mahasiswa::orderBy('instansi', 'desc')->paginate(3);
                break;
            case 'tanggal_asc':
                $pemagang = Mahasiswa::orderBy('created_at', 'asc')->paginate(3);
                break;
            case 'tanggal_desc':
                $pemagang = Mahasiswa::orderBy('created_at', 'desc')->paginate(3);
                break;
            default:
                $pemagang = Mahasiswa::paginate(3);
                break;
        }


        return view('admin.pengajuan-magang', compact('pemagang'));
    }

    public function download()
    {
        $pemagang = Mahasiswa::all();
        $csvExporter = new Export();
        $csvExporter->build($pemagang, ['nama', 'nama_universitas', 'anggota_kelompok', 'created_at'])->download();
    }

    public function magang()
    {
        $count = Mahasiswa::count();
        return view('admin.dashboard-admin', compact('count'));
    }

    public function edit($id)
    {
        $pemagang = Mahasiswa::findOrFail($id);
        return view('admin.detail-terima', compact('pemagang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penempatan' => 'required|string|max:255',
            'penugasan' => 'required|string|max:255',
        ]);

        $pemagang = Mahasiswa::findOrFail($id);

        if ($request->hasFile('surat_balasan')) {
            $pemagang->surat_balasan = $request->file('surat_balasan')->store('documents', 'public');
        }

        if ($request->hasFile('id_card')) {
            $pemagang->id_card = $request->file('id_card')->store('documents', 'public');
        }

        if ($request->hasFile('sertifikat')) {
            $pemagang->sertifikat = $request->file('sertifikat')->store('documents', 'public');
        }

        if ($request->hasFile('surat_keterangan')) {
            $pemagang->surat_keterangan = $request->file('surat_keterangan')->store('documents', 'public');
        }

        $pemagang->penempatan = $request->input('penempatan');
        $pemagang->penugasan = $request->input('penugasan');
        $pemagang->save();

        return redirect()->back()->with('success', 'Dokumen berhasil diunggah dan informasi diperbarui.');
    }


}