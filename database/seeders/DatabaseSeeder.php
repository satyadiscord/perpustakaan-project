<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'member',
        //     'email' => 'member@gmail.com',
        //     'jenis_kelamin' => 'Perempuan',
        //     'password' => bcrypt('member'),
        // ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt('password123'),
        ]);

        User::factory()->create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'jenis_kelamin' => 'Perempuan',
            'password' => bcrypt('password456'),
        ]);

        User::factory()->create([
            'name' => 'David Lee',
            'email' => 'david.lee@example.com',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt('password789'),
        ]);

        $this->call([
            KategoriSeeder::class,
            BukuSeeder::class,
        ]);

        // User::factory()->create([
        //     'name' => 'Sarah Kim',
        //     'email' => 'sarah.kim@example.com',
        //     'jenis_kelamin' => 'Perempuan',
        //     'password' => bcrypt('password101'),
        // ]);

        // User::factory()->create([
        //     'name' => 'Michael Brown',
        //     'email' => 'michael.brown@example.com',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'password' => bcrypt('password112'),
        // ]);

        // User::factory()->create([
        //     'name' => 'Emily Wilson',
        //     'email' => 'emily.wilson@example.com',
        //     'jenis_kelamin' => 'Perempuan',
        //     'password' => bcrypt('password131'),
        // ]);

        // User::factory()->create([
        //     'name' => 'Kevin Garcia',
        //     'email' => 'kevin.garcia@example.com',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'password' => bcrypt('password141'),
        // ]);

        // User::factory()->create([
        //     'name' => 'Jessica Rodriguez',
        //     'email' => 'jessica.rodriguez@example.com',
        //     'jenis_kelamin' => 'Perempuan',
        //     'password' => bcrypt('password151'),
        // ]);

        // User::factory()->create([
        //     'name' => 'Brian Martinez',
        //     'email' => 'brian.martinez@example.com',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'password' => bcrypt('password161'),
        // ]);
    }
}
