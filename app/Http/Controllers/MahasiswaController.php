<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    function index()
    {
        $regencies = Regency::orderBy('name')->get();
        return view('mahasiswa.mahasiswa', compact('regencies'));
    }

    function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'jenjang_pendidikan' => 'required',
            'kota_universitas' => 'required',
            'nama_universitas' => 'required',
            'fakultas' => 'required',
            'program_studi' => 'required',
            'nomor_induk_mahasiswa' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'magang_dimulai' => 'required|date',
            'magang_berakhir' => 'required|date',
            'anggota_kelompok' => 'required',
            'penempatan' => 'nullable|string|max:255'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id(); // Mendapatkan user_id pengguna yang saat ini diautentikasi

        // Proses data anggota kelompok sebelum disimpan ke database
        // Proses data anggota kelompok sebelum disimpan ke database

        Mahasiswa::create($data);


        return redirect()->route('berhasil');
    }

    function dokumen()
    {
        return view('mahasiswa.dokumen');
    }
}