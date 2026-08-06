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
    Schema::create('perpusnas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_layanan'); // Contoh: Ipusnas, E-Resources
        $table->string('url_link');      // Alamat website Perpusnas
        $table->text('deskripsi')->nullable();
        $table->string('logo')->nullable();
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpusnas');
    }
};
