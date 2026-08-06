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
        Schema::table('buku_terbarus', function (Blueprint $table) {
            // Menambahkan kolom 'jumlah' dengan nilai bawaan 0 setelah kolom 'deskripsi'
            $table->integer('jumlah')->default(0)->after('deskripsi'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buku_terbarus', function (Blueprint $table) {
            // Menghapus kembali kolom jumlah jika migration di-rollback
            $table->dropColumn('jumlah');
        });
    }
};