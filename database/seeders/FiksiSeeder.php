<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fiksis')->insert([
            [
                'id' => 1,
                'judul' => 'Laskar [elangi', // Sesuai teks SQL Anda (Laskar Pelangi)
                'penulis' => 'Andrea Hirata',
                'ringkasan' => 'Novel Laskar Pelangi karya Andrea Hirata mengisahkan perjuangan sepuluh anak dari keluarga miskin di Belitong yang bersekolah di SD Muhammadiyah yang hampir ditutup. Dengan bimbingan Bu Mus dan Pak Harfan, mereka mengatasi keterbatasan fasilitas demi menuntut ilmu. Kisah ini menonjolkan persahabatan, semangat belajar, dan impian masa kecil yang inspiratif.',
                'file_pdf' => '1776891095_Laskar_[elangi.pdf',
                'created_at' => '2026-04-22 13:51:35',
                'updated_at' => '2026-04-22 13:51:35',
            ],
        ]);
    }
}
