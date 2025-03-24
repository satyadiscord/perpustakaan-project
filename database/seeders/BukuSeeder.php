<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('id_ID');
        // Buku::factory()->create([
        //     'judul' => 'Manusia terbaik seluruh indonesia',
        //     // 'isbn',
        //     'penulis' => 'Suryanto',
        //     'penerbit' => 'Ketot Suryanto',
        //     'tahun_terbit' => date('Y'),
        //     'kategori_id' => 2,
        //     // 'cover_buku',
        // ]);

        Buku::factory()->create([
            'judul' => 'Belajar Laravel 11',
            'isbn' => '978-602-8519-77-3',
            'penulis' => 'John Doe',
            'penerbit' => 'TechPress',
            'tahun_terbit' => 2024,
            'cover_buku' => 'https://source.unsplash.com/400x600/?programming,book',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);

        Buku::factory()->create([
            'judul' => 'Mastering JavaScript',
            'isbn' => '978-602-8519-99-5',
            'penulis' => 'Michael Lee',
            'penerbit' => 'CodeWorld',
            'tahun_terbit' => 2022,
            'cover_buku' => 'https://source.unsplash.com/400x600/?javascript,book',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);

        Buku::factory()->create([
            'judul' => 'Desain UI/UX untuk Pemula',
            'isbn' => '978-602-8520-10-1',
            'penulis' => 'Lisa Wong',
            'penerbit' => 'DesignTech',
            'tahun_terbit' => 2021,
            'cover_buku' => 'https://source.unsplash.com/400x600/?design,book',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);

        Buku::factory()->create([
            'judul' => 'Artificial Intelligence Basics',
            'isbn' => '978-602-8520-32-3',
            'penulis' => 'Richard Miles',
            'penerbit' => 'AI Research',
            'tahun_terbit' => 2019,
            'cover_buku' => 'https://source.unsplash.com/400x600/?ai,book',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);

        Buku::factory()->create([
            'judul' => 'Manajemen Waktu Efektif',
            'isbn' => '978-602-8520-43-4',
            'penulis' => 'David Johnson',
            'penerbit' => 'SelfHelp Press',
            'tahun_terbit' => 2018,
            'cover_buku' => 'https://source.unsplash.com/400x600/?time,management',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);

        Buku::factory()->create([
            'judul' => 'Menguasai Python untuk Data Science',
            'isbn' => '978-602-8520-54-5',
            'penulis' => 'Sophia Chang',
            'penerbit' => 'DataScience Hub',
            'tahun_terbit' => 2022,
            'cover_buku' => 'https://source.unsplash.com/400x600/?python,book',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);

        Buku::factory()->create([
            'judul' => 'Blockchain untuk Pemula',
            'isbn' => '978-602-8520-65-6',
            'penulis' => 'Kevin Roberts',
            'penerbit' => 'CryptoWorld',
            'tahun_terbit' => 2023,
            'cover_buku' => 'https://source.unsplash.com/400x600/?blockchain,book',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
    }
}
