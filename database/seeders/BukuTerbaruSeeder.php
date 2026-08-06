<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuTerbaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku_terbarus')->updateOrInsert(
            ['id' => 1], // Tolok ukur pengecekan berdasarkan ID
            [
                'judul' => 'ilmuan',
                'penulis' => 'Anisa Sari',
                'cover' => '1776883422_Screenshot_2026-04-20_025204.png',
                'deskripsi' => null,
                'created_at' => '2026-04-22 11:43:42',
                'updated_at' => '2026-05-17 10:14:24',
            ]
        );
    }
}