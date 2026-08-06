<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpusnas extends Model
{
    use HasFactory;

    protected $table = 'perpusnas';
    protected $fillable = [
        'nama_layanan',
        'url_link',
        'deskripsi',
        'logo'
    ];
}