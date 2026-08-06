<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTerbaru extends Model
{
    use HasFactory;

    // Nama tabel kamu di database
    protected $table = 'buku_terbarus'; 

    // WAJIB masukkan 'jumlah' di sini agar bisa disimpan/diedit massal
    protected $fillable = [
        'judul', 
        'penulis', 
        'cover', 
        'deskripsi', 
        'jumlah'
    ]; 
}