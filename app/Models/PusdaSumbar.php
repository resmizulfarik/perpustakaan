<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PusdaSumbar extends Model
{
    use HasFactory;

    protected $table = 'pusda_sumbars';
    protected $fillable = [
        'nama_layanan',
        'url_link',
        'deskripsi'
    ];
}