<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengunjungs')->insert([
            [
                'id' => 1,
                'nama_pengunjung' => 'Resmi Zulfarik',
                'status' => 'Siswa',
                'created_at' => '2026-05-17 17:00:00',
                'updated_at' => null,
            ],
        ]);
    }
}
