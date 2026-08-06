<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     * Secara default Laravel akan mencari tabel 'beritas'.
     */
    protected $table = 'beritas';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignable).
     * Ini penting agar fungsi Berita::create() di Controller tidak error.
     */
    protected $fillable = [
        'judul',  // Menyimpan judul berita
        'isi',    // Menyimpan narasi atau konten berita
        'gambar', // Menyimpan nama file gambar yang diupload
    ];

    /**
     * Jika Anda ingin field created_at tampil dengan format Indonesia (opsional).
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d M Y');
    }
}