<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database
    protected $table = 'sejarahs';

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = ['judul', 'isi'];
}