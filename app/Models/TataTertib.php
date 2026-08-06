<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataTertib extends Model
{
    use HasFactory;

    // Secara default Laravel akan mencari tabel 'tata_tertibs'. 
    // Karena migration Anda menggunakan nama itu, maka baris ini opsional tapi baik untuk keamanan.
    protected $table = 'tata_tertibs';

    // Daftarkan kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'kategori',
        'isi_aturan',
        'urutan'
    ];
}