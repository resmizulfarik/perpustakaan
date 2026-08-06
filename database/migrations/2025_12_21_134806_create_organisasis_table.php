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
    Schema::create('organisasis', function (Blueprint $table) {
        $table->id();
        $table->string('nama');      // Nama personil
        $table->string('jabatan');   // Contoh: Kepala Perpustakaan
        $table->string('foto')->nullable(); // Nama file foto
        $table->integer('urutan')->default(0); // Untuk mengatur posisi atas/bawah
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasis');
    }
};
