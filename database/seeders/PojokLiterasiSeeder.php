<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PojokLiterasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pojok_literasis')->insert([
            [
                'id' => 1,
                'penulis' => 'Raihan',
                'kelas' => 'XI.IPA 2',
                'judul' => 'Penyerahanhadiah Juara 1 lomba resensi tingkat SMA/ MA se Sumatera Barat, Oleh Bapak Gubernur pada acara Festival Literasi.',
                'isi' => 'Sebuah kebanggaan besar bagi SMAN 7 Sijunjung atas raihan Juara 1 Lomba Resensi Buku tingkat SMA/MA se-Sumatera Barat. Penghargaan ini diserahkan langsung oleh Bapak Gubernur Sumatera Barat dalam rangkaian acara Festival Literasi. Prestasi ini menjadi bukti nyata dari tingginya minat baca dan kemampuan analisis kritis siswa dalam mengapresiasi karya literatur. Capaian ini diharapkan dapat menjadi motivasi bagi seluruh siswa untuk terus menghidupkan budaya literasi di lingkungan sekolah dan masyarakat.',
                'kategori' => 'Cerpen',
                'cover' => '1776771681.jpg',
                'created_at' => '2026-04-21 04:41:21',
                'updated_at' => '2026-04-21 04:41:21',
            ],
            [
                'id' => 2,
                'penulis' => 'Ririn Riani',
                'kelas' => 'XII. IPS 1',
                'judul' => 'Pena Emas di Festival Literasi',
                'isi' => "Di bawah langit Sumatera yang benderang,\r\n\r\nKata-kata tersusun menjadi jembatan ilmu.\r\n\r\nDari lembar kertas hingga panggung kehormatan,\r\n\r\nSebuah resensi membawa pesan dari masa lalu.\r\n\r\nGenggaman tangan sang pemimpin daerah,\r\n\r\nAdalah restu bagi pena yang terus menari.\r\n\r\nLiterasi bukan sekadar membaca aksara,\r\n\r\nTapi tentang menghidupkan mimpi di dalam diri.\"",
                'kategori' => 'Puisi',
                'cover' => '1776772554.jpg',
                'created_at' => '2026-04-21 04:55:54',
                'updated_at' => '2026-04-21 04:55:54',
            ],
        ]);
    }
}
