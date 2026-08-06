<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('karyas', function (Blueprint $table) {
            // Menambahkan kolom cover setelah kolom deskripsi
            $table->string('cover')->nullable()->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('karyas', function (Blueprint $table) {
            $table->dropColumn('cover');
        });
    }
};