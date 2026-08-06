<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prestasis')->insert([
            [
                'id' => 1,
                'nama_siswa' => 'Dewi Angraini',
                'kelas' => 'XI.IPA 1',
                'judul_prestasi' => 'lomba menulis resensi novel se Sumatera Barat',
                'tingkat' => 'Kabupaten',
                'tanggal_dicapai' => '2025-11-11',
                'foto_sertifikat' => '1776774274.jpg',
                'created_at' => '2026-04-21 05:24:34',
                'updated_at' => '2026-04-21 05:24:34',
            ],
        ]);
    }
}
