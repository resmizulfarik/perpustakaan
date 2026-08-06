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
    Schema::create('prestasis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_siswa');
        $table->string('kelas');
        $table->string('judul_prestasi'); // Contoh: Juara 1 Lomba Baca Puisi
        $table->string('tingkat'); // Contoh: Nasional, Provinsi, atau Sekolah
        $table->date('tanggal_dicapai');
        $table->string('foto_sertifikat');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
