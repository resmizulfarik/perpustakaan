<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pojok_literasis', function (Blueprint $table) {
        $table->id();
        $table->string('penulis');
        $table->string('kelas');
        $table->string('judul');
        $table->text('isi'); // Untuk isi tulisan literasi
        $table->string('kategori'); // Contoh: Puisi, Cerpen, Artikel
        $table->string('cover')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pojok_literasis');
    }
};
