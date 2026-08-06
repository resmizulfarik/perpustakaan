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
        // MEMODIFIKASI TABEL USERS (Menambahkan kolom kunci di sini)
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('buku_terbaru_id')
                  ->after('staff_id') // Ditaruh setelah kolom staff_id
                  ->nullable()
                  ->constrained('buku_terbarus')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['buku_terbaru_id']);
            $table->dropColumn('buku_terbaru_id');
        });
    }
};
