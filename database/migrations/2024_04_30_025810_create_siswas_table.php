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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama');
            $table->string('jenjang_pendidikan');
            $table->string('kota_sekolah');
            $table->string('nama_sekolah');
            $table->string('jurusan');
            $table->string('jenis_kelamin');
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->date('magang_dimulai');
            $table->date('magang_berakhir');
            $table->text('anggota_kelompok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};