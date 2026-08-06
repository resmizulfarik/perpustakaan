<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan updateOrInsert agar jika ID 1 sudah ada, datanya hanya diperbarui
        DB::table('users')->updateOrInsert(
            ['id' => 1], // Kondisi pengecekan
            [
                'name' => 'Admin Perpus',
                'email' => 'perpus.sman7sijunjung@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$jnON8z34u5Jxsmim3ptOJORyEf6trgB9dPNQXfEzf4yzcqshpkn1S',
                'remember_token' => null,
                'created_at' => '2026-04-21 02:04:49',
                'updated_at' => '2026-04-21 02:10:28',
            ]
        );
    }
}
