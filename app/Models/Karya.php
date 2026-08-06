<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;

    protected $table = 'karyas';

    protected $fillable = [
        'judul',
        'kategori',
        'penulis',
        'deskripsi',
        'file_pdf',
        'cover', // Cukup gunakan cover
    ];
}