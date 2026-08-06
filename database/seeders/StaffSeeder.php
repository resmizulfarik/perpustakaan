<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'id' => 1,
                'nama' => 'Yeni Surita, S.Pd',
                'nip' => '197708162003122005',
                'jabatan' => 'Kepala Perpustakaan',
                'foto' => '1779035533_WhatsApp_Image_2026-05-17_at_23.30.10.jpeg',
                'urutan' => 1,
                'created_at' => '2026-05-17 09:32:13',
                'updated_at' => '2026-05-17 09:32:13',
            ],
            [
                'id' => 2,
                'nama' => 'Fitri, S.Pd',
                'nip' => '198706022025212103',
                'jabatan' => 'Pegawai Perpustakaan',
                'foto' => '1779035691_WhatsApp_Image_2026-05-17_at_23.32.36.jpeg',
                'urutan' => 2,
                'created_at' => '2026-05-17 09:34:51',
                'updated_at' => '2026-05-17 09:35:07',
            ],
            [
                'id' => 3,
                'nama' => 'Dwi Tiara Nastiti, S.E',
                'nip' => '-',
                'jabatan' => 'Pegawai Perpustakaan',
                'foto' => null,
                'urutan' => 3,
                'created_at' => '2026-05-17 09:38:57',
                'updated_at' => '2026-05-17 09:38:57',
            ],
        ]);
    }
}
