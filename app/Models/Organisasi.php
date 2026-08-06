<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional jika nama tabel sudah sesuai jamak bahasa Inggris)
    protected $table = 'organisasis';

    /**
     * fillable digunakan untuk menentukan kolom mana saja yang boleh diisi
     * saat menggunakan metode create() atau update()
     */
    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'urutan'
    ];
}