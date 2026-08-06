<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Membuat tabel bernama pengunjungs
        Schema::create('pengunjungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengunjung');
            $table->string('status')->nullable(); // Misal: Siswa, Guru, Umum
            $table->timestamps(); // Ini wajib karena menghasilkan kolom created_at untuk grafik bulanan
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengunjungs');
    }
};