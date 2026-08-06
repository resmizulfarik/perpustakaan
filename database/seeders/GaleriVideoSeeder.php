<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
DB::table('galeri_videos')->insert([
    [
        'id' => 3,
        'judul' => 'Semi final lomba story telling di ISI award Padang Panjang.',
        'video' => '1776767315_VIDEO.mp4',
        'tanggal' => '2025-12-15',
        'deskripsi' => 'Visualisasi karya sastra melalui seni peran. Video ini merupakan bagian dari koleksi digital galeri perpustakaan yang mendokumentasikan kreativitas siswa dalam mengapresiasi teks drama menjadi sebuah pertunjukan nyata.',
        'created_at' => '2026-04-21 03:17:11',
        'updated_at' => '2026-04-21 03:28:35',
    ],
    [
        'id' => 5,
        'judul' => 'Pembelajaran Video Drama Bahasa inggris menggunakan media smart TV di perpustakaan SMA 7',
        'video' => '1776768048_video 3.mp4',
        'tanggal' => '2026-02-06', // Tambahkan kolom tanggal di sini agar jumlah kolom seragam
        'deskripsi' => 'Pemanfaatan media Smart TV di Perpustakaan SMA Negeri 7 Sijunjung sebagai sarana pembelajaran interaktif. Video ini mendokumentasikan kegiatan belajar bersama drama Bahasa Inggris, di mana siswa dapat menganalisis pelafalan dan akting secara langsung melalui fasilitas digital perpustakaan',
        'created_at' => '2026-04-21 03:40:48',
        'updated_at' => '2026-04-21 03:40:48',
    ],
    [
        'id' => 6,
        'judul' => 'Semi final lomba story telling di ISI award Padang Panjang',
        'video' => '1776768388_VIDEO 2.mp4',
        'tanggal' => '2025-12-15',
        'deskripsi' => 'Cuplikan pertunjukan drama panggung oleh siswa di bawah bimbingan guru seni budaya. Menampilkan kolaborasi akting, tata panggung, dan penggunaan teknologi proyektor dalam pertunjukan modern',
        'created_at' => '2026-04-21 03:46:29',
        'updated_at' => '2026-04-21 03:46:29',
    ],
]);
    }
}
