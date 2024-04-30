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
            'surat_pengantar' => 'Surat Pengantar Harus Berbentuk PDF',
            'cv' => 'CV Harus Berbentuk PDF',
            'portofolio' => 'Portofolio Harus Berbentuk PDF',
            'transkrip_nilai' => 'Format file Harus Berbentuk PDF',
            'pas_foto.required' => 'Pas Foto Harus Berbentuk jpeg,png,jpg'
        ]);

        $files = $request->only(['surat_pengantar', 'cv', 'portofolio', 'transkrip_nilai', 'pas_foto']);
        $userID = Auth::id();

        foreach ($files as $key => $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName);

            File::create([
                'user_id' => $userID,
                'name' => $fileName,
                'file_path' => $filePath,
                'file_type' => $key
            ]);
        }

        return redirect()->route('dokumen_kirim');
    }
}