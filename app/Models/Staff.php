<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional jika nama tabel adalah jamak dari nama model)
    protected $table = 'staff';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'foto',
        'urutan'
    ];
}