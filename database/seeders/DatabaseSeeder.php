<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Perpus',
            'email' => 'perpus.sman7sijunjung@gmail.com',
            'password' => bcrypt('Adminperpus7'),
        ]);

        $this->call([
              BukuTerbaruSeeder::class,
              FiksiSeeder::class,
              GaleriVideoSeeder::class,
              GaleriFotoSeeder::class,
              PengunjungSeeder::class,
              PojokLiterasiSeeder::class,
              PrestasiSeeder::class,
              SejarahSeeder::class,
              StaffSeeder::class,
              UserSeeder::class,
         ]);
    }
}
