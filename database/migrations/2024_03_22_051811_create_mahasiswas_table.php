<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama');
            $table->string('jenjang_pendidikan');
            $table->string('kota_universitas');
            $table->string('nama_universitas');
            $table->string('fakultas');
            $table->string('program_studi');
            $table->string('nomor_induk_mahasiswa');
            $table->string('jenis_kelamin');
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->date('magang_dimulai');
            $table->date('magang_berakhir');
            $table->text('anggota_kelompok');
            $table->enum('status', ['pengajuan terkirim', 'pengajuan dilihat', 'surat balasan dibuat', 'surat balasan tersedia', 'ditolak'])->default('pengajuan terkirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};