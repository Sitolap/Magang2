<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function create()
    {
        return view('user.dokumen');
    }

    public function store(Request $request)
    {
        $request->validate([
            'surat_pengantar' => 'required|file|mimes:pdf',
            'cv' => 'required|file|mimes:pdf',
            'portofolio' => 'required|file|mimes:pdf',
            'transkrip_nilai' => 'required|file|mimes:pdf',
            'pas_foto' => 'required|file|mimes:jpeg,png,jpg',
        ], [
            'surat_pengantar.required' => 'Surat Pengantar Harus Berbentuk PDF',
            'cv.required' => 'CV Harus Berbentuk PDF',
            'portofolio.required' => 'Portofolio Harus Berbentuk PDF',
            'transkrip_nilai.required' => 'Transkrip Nilai Harus Berbentuk PDF',
            'pas_foto.required' => 'Pas Foto Harus Berbentuk jpeg, png, atau jpg'
        ]);

        $files = $request->only(['surat_pengantar', 'cv', 'portofolio', 'transkrip_nilai', 'pas_foto']);
        $userID = Auth::id();

        foreach ($files as $key => $file) {
            if ($file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                File::create([
                    'user_id' => $userID,
                    'name' => $fileName,
                    'file_path' => 'uploads/' . $fileName,
                    'file_type' => $key
                ]);
            }
        }

        return redirect()->route('dokumen_kirim');
    }

    public function file($id)
    {
        $files = File::where('user_id', $id)->get();
        return view('admin.detail', compact('files'));
    }
}