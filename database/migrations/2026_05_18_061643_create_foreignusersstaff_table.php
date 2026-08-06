<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('foreignusersstaff', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }


public function up(): void
{
    // Schema::create('foreignusersstaff', function (Blueprint $table) {
    //     $table->id();
        
    //     // Menghubungkan ke tabel users
    //     $table->foreignId('user_id')
    //           ->constrained('users')
    //           ->onDelete('cascade');

    //     // Menghubungkan ke tabel staff
    //     $table->foreignId('staff_id')
    //           ->constrained('staff')
    //           ->onDelete('cascade');

    //     $table->timestamps();
    // });

    // Mengubah tabel users yang sudah ada untuk menambahkan foreign key
        Schema::table('users', function (Blueprint $table) {
            // Mengubah tipe data staff_id menjadi foreignId yang singkron dengan tabel staff
            // nullable() digunakan agar user biasa yang bukan staff bisa bernilai NULL
            $table->foreignId('staff_id')
                  ->nullable()
                  ->change() 
                  ->constrained('staff')
                  ->onDelete('set null');
        });
}

    /**
     * Reverse the migrations.
     */
  public function down(): void
{
    // // Menghapus foreign key terlebih dahulu sebelum menghapus tabel
    // Schema::table('foreignusersstaff', function (Blueprint $table) {
    //     $table->dropForeign(['user_id']);
    //     $table->dropForeign(['staff_id']);
    // });

    // // Menghapus tabel setelah foreign key dilepas
    // Schema::dropIfExists('foreignusersstaff');

// Mengembalikan perubahan jika migrasi di-rollback
        Schema::table('users', function (Blueprint $table) {
            // Hapus foreign key terlebih dahulu
            $table->dropForeign(['staff_id']);
            
            // Kembalikan tipe data staff_id ke bentuk semula (bigInteger) jika diperlukan
            $table->bigInteger('staff_id')->change();
        });

}

};
