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
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->string('surat_balasan')->nullable();
            $table->string('id_card')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('surat_keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropColumn('surat_balasan');
            $table->dropColumn('id_card');
            $table->dropColumn('sertifikat');
            $table->dropColumn('surat_keterangan');
        });
    }
};