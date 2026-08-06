<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fiksis', function (Blueprint $table) {
            // Mengubah nama kolom dan menjadikannya nullable (boleh kosong)
            $table->renameColumn('file_pdf', 'file_gambar')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('fiksis', function (Blueprint $table) {
            $table->renameColumn('file_gambar', 'file_pdf');
        });
    }
};