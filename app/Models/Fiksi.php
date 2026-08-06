<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiksi extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     * Secara default Laravel akan menganggap namanya 'fiksis'.
     */
    protected $table = 'fiksis';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     * Pastikan kolom-kolom ini sesuai dengan yang ada di file Migration.
     */
    protected $fillable = [
        'judul',
        'penulis',
        'ringkasan',
        'file_gambar', // PERBAIKAN: Mengubah 'file_pdf' menjadi 'file_gambar'
    ];

    /**
     * Jika Anda ingin menambahkan logika Carbon untuk tanggal, 
     * atau relasi ke user/admin pengunggah di masa depan, 
     * Anda bisa menambahkannya di bawah sini.
     */
}