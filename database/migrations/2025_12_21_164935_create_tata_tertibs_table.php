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
        Schema::create('tata_tertibs', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // Contoh: Tata Tertib Pengunjung atau Syarat Anggota
            $table->text('isi_aturan');  // Detail aturannya
            $table->integer('urutan')->default(1); // Untuk menyusun urutan tampilan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tata_tertibs');
    }
};
