<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $pemagangs = Mahasiswa::all();
        return view('admin.pengajuan-magang', compact('pemagangs'));
    }

    public function detail($id)
    {
        $pemagang = Mahasiswa::find($id);
        return view('admin.detail', compact('pemagang'));
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


}