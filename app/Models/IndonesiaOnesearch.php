<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndonesiaOnesearch extends Model
{
    use HasFactory;

    protected $table = 'indonesia_onesearches';
    protected $fillable = [
        'nama_layanan',
        'url_link',
        'deskripsi'
    ];
}