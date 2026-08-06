<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanduanOpac extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'panduan_opacs';

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'langkah_langkah'
    ];
}