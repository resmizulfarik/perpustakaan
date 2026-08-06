<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonFiksi extends Model
{
    use HasFactory;

    // 1. Beritahu Laravel nama tabelnya
    protected $table = 'non_fiksis';

    // 2. DAFTARKAN KOLOM DI SINI (Ini solusi untuk error fillable)
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'cover',
        'file_pdf'
    ];
}