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
    Schema::create('karyas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('penulis');
        $table->enum('kategori', ['guru', 'siswa']); // Kunci untuk memisahkan halaman
        $table->text('deskripsi')->nullable();
        $table->string('file_pdf')->nullable();
        $table->timestamps(); // Ini yang membuat kolom created_at yang dicari Laravel
    });

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyas');
    }
};
