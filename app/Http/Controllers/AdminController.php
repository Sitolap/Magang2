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
        $pemagangs = Mahasiswa::paginate(3);

        return view('admin.pengajuan-magang', compact('pemagangs'));
    }

    public function detail($id)
    {
        $pemagang = Mahasiswa::find($id);
        $files = File::where('user_id', $id)->get();
        return view('admin.detail', compact('pemagang', 'files'));
    }
    public function pemagang()
    {
        return view('admin.daftar-pemagang');
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
                $pemagangs = Mahasiswa::orderBy('nama', 'asc')->paginate(3);
                break;
            case 'nama_desc':
                $pemagangs = Mahasiswa::orderBy('nama', 'desc')->paginate(3);
                break;
            case 'instansi_asc':
                $pemagangs = Mahasiswa::orderBy('instansi', 'asc')->paginate(3);
                break;
            case 'instansi_desc':
                $pemagangs = Mahasiswa::orderBy('instansi', 'desc')->paginate(3);
                break;
            case 'tanggal_asc':
                $pemagangs = Mahasiswa::orderBy('created_at', 'asc')->paginate(3);
                break;
            case 'tanggal_desc':
                $pemagangs = Mahasiswa::orderBy('created_at', 'desc')->paginate(3);
                break;
            default:
                $pemagangs = Mahasiswa::paginate(3);
                break;
        }


        return view('admin.pengajuan-magang', compact('pemagangs'));
    }
}