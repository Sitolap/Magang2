<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

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
    public function pemagang()
    {
        $mahasiswa = Mahasiswa::where('status', 'diterima')->get();
        return view('admin.daftar-pemagang', compact('mahasiswa'));
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

        $pemagangs = Mahasiswa::where('nama', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('nama_universitas', 'LIKE', "%{$searchTerm}%")
                            ->paginate(3);

        return view('admin.pengajuan-magang', compact('pemagangs'));
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

    public function magang()
    {
        $count = Mahasiswa::count();
        return view('admin.dashboard-admin', compact('count'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penempatan' => 'nullable|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->penempatan = $request->penempatan;
        $mahasiswa->save();

        return redirect()->route('pemagang')->with('success', 'Penempatan updated successfully.');
    }
}