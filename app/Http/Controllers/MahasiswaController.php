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
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id(); // Mendapatkan user_id pengguna yang saat ini diautentikasi

        Mahasiswa::create($data);
        // Mahasiswa::create([
        //     'nama' => $request->nama,
        //     'jenjang_pendidikan' => $request->jenjang_pendidikan,
        //     'kota_universitas' => $request->kota_universitas,
        //     'nama_universitas' => $request->nama_universitas,
        //     'fakultas' => $request->fakultas,
        //     'program_studi' => $request->program_studi,
        //     'nomor_induk_mahasiswa' => $request->nomor_induk_mahasiswa,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'email' => $request->email,
        //     'no_telepon' => $request->no_telepon,
        //     'magang_dimulai' => $request->magang_dimulai,
        //     'magang_berakhir' => $request->magang_berakhir,
        //     'anggota_kelompok' => $request->anggota_kelompok,
        // ]);

        return redirect()->route('berhasil');
    }

    function dokumen()
    {
        return view('mahasiswa.dokumen');
    }
}