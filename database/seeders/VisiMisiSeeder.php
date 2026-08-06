<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisiMisi; // Pastikan model VisiMisi sudah dipanggil di atas

class VisiMisiSeeder extends Seeder
{
    public function run(): void
    {
        VisiMisi::updateOrCreate(
            ['id' => 1], // Tolok ukur pengecekan, cari yang ID-nya 1
            [
                'visi' => 'Menjadi perpustakaan digital terdepan dalam mencerdaskan bangsa.',
                'misi' => "1. Menyediakan koleksi buku yang berkualitas.\n2. Memberikan layanan literasi berbasis teknologi.\n3. Menciptakan ruang baca yang nyaman.",
                'created_at' => '2026-04-21 01:40:33',
                'updated_at' => now(),
            ]
        );
    }
}