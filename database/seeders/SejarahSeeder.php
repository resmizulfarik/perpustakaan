<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SejarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sejarahs')->insert([
            [
                'id' => 1,
                'isi' => "Perpustakaan SMA Negeri 7 Sijunjung didirikan seiring dengan awal operasional sekolah untuk memenuhi kebutuhan sumber belajar siswa. Pada masa perintisan, perpustakaan ini dikelola secara konvensional di ruang sederhana dengan koleksi buku paket pelajaran yang terbatas.\r\n\r\nSeiring bertambahnya jumlah siswa dan dukungan anggaran pemerintah (Dana BOS/DAK), perpustakaan mengalami perkembangan fisik yang signifikan. Operasionalnya berpindah ke gedung mandiri yang lebih luas, kapasitas buku diperbanyak dengan berbagai koleksi referensi dan fiksi, serta tata kelola administrasi mulai mengadopsi standar klasifikasi nasional.\r\n\r\nSaat ini, Perpustakaan SMA Negeri 7 Sijunjung terus bertransformasi menuju modernisasi layanan. Melalui kehadiran sistem profil digital ini, perpustakaan berkomitmen menjadi pusat sumber belajar (Learning Resource Center) yang adaptif, mempermudah akses informasi, serta menjadi jantung utama dalam menumbuhkan budaya literasi yang unggul dan berkarakter di lingkungan sekolah.",
                'created_at' => '2026-05-17 09:27:07',
                'updated_at' => '2026-05-17 09:27:07',
            ],
        ]);
    }
}
