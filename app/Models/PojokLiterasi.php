<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PojokLiterasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'penulis', 
        'kelas', 
        'judul', 
        'isi', 
        'kategori', 
        'cover'
    ];
}