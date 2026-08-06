<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PojokSeni extends Model
{
    use HasFactory;

    protected $table = 'pojok_senis';
    protected $fillable = ['penulis', 'judul', 'kelas', 'sinopsis', 'cover'];
}