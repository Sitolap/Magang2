<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller

{
    function index()
    {
        $regencies = Regency::orderBy('name')->get();
        return view('siswa.siswa', compact('regencies'));
    }

    function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'jenjang_pendidikan' => 'required',
            'kota_sekolah' => 'required',
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'magang_dimulai' => 'required|date',
            'magang_berakhir' => 'required|date',
            'anggota_kelompok'  => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id(); // Mendapatkan user_id pengguna yang saat ini diautentikasi

        Siswa::create($data);


        return redirect()->route('berhasil');
    }

    function dokumen()
    {
        return view('siswa.dokumen');
    }
}