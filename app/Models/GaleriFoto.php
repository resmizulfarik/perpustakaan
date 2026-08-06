<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahkan ini di atas

class GaleriFoto extends Model
{
    use HasFactory;

    protected $table = 'galeri_fotos';

    protected $fillable = [
        'judul',
        'foto',
        'deskripsi',
        'tanggal'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // --- TAMBAHKAN FUNGSI RELASI INI ---
    public function info(): BelongsTo
    {
        // Ganti 'Info::class' dengan nama model target relasi Anda yang sebenarnya
        return $this->belongsTo(Info::class, 'info_id'); 
    }
}