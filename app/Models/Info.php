<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional jika nama tabel Anda 'infos')
    protected $table = 'infos';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'email',
        'tiktok',
        'instagram',
        'twitter',
        'alamat',
    ];
}
