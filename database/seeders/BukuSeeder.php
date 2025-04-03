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

        // Buku::factory()->create([
        //     'judul' => 'Belajar Laravel 11',
        //     'isbn' => '978-602-8519-77-3',
        //     'penulis' => 'John Doe',
        //     'penerbit' => 'TechPress',
        //     'tahun_terbit' => 2024,
        //     'cover_buku' => $faker->imageUrl(400, 600, 'books', true),
        //     'deskripsi' => $faker->paragraph(),
        //     'kategori_id' => $faker->numberBetween(1, 3),
        // ]);

        // Buku::factory()->create([
        //     'judul' => 'Mastering JavaScript',
        //     'isbn' => '978-602-8519-99-5',
        //     'penulis' => 'Michael Lee',
        //     'penerbit' => 'CodeWorld',
        //     'tahun_terbit' => 2022,
        //     'cover_buku' => $faker->imageUrl(400, 600, 'books', true),
        //     'deskripsi' => $faker->paragraph(),
        //     'kategori_id' => $faker->numberBetween(1, 3),
        // ]);

        // Buku::factory()->create([
        //     'judul' => 'Desain UI/UX untuk Pemula',
        //     'isbn' => '978-602-8520-10-1',
        //     'penulis' => 'Lisa Wong',
        //     'penerbit' => 'DesignTech',
        //     'tahun_terbit' => 2021,
        //     'cover_buku' => $faker->imageUrl(400, 600, 'books', true),
        //     'deskripsi' => $faker->paragraph(),
        //     'kategori_id' => $faker->numberBetween(1, 3),
        // ]);

        // Buku::factory()->create([
        //     'judul' => 'Artificial Intelligence Basics',
        //     'isbn' => '978-602-8520-32-3',
        //     'penulis' => 'Richard Miles',
        //     'penerbit' => 'AI Research',
        //     'tahun_terbit' => 2019,
        //     'cover_buku' => $faker->imageUrl(400, 600, 'books', true),
        //     'deskripsi' => $faker->paragraph(),
        //     'kategori_id' => $faker->numberBetween(1, 3),
        // ]);

        // Buku::factory()->create([
        //     'judul' => 'Manajemen Waktu Efektif',
        //     'isbn' => '978-602-8520-43-4',
        //     'penulis' => 'David Johnson',
        //     'penerbit' => 'SelfHelp Press',
        //     'tahun_terbit' => 2018,
        //     'cover_buku' => $faker->imageUrl(400, 600, 'books', true),
        //     'deskripsi' => $faker->paragraph(),
        //     'kategori_id' => $faker->numberBetween(1, 3),
        // ]);

        // Buku::factory()->create([
        //     'judul' => 'Menguasai Python untuk Data Science',
        //     'isbn' => '978-602-8520-54-5',
        //     'penulis' => 'Sophia Chang',
        //     'penerbit' => 'DataScience Hub',
        //     'tahun_terbit' => 2022,
        //     'cover_buku' => $faker->imageUrl(400, 600, 'books', true),
        //     'deskripsi' => $faker->paragraph(),
        //     'kategori_id' => $faker->numberBetween(1, 3),
        // ]);

        // Buku::factory()->create([
        //     'judul' => 'Blockchain untuk Pemula',
        //     'isbn' => '978-602-8520-65-6',
        //     'penulis' => 'Kevin Roberts',
        //     'penerbit' => 'CryptoWorld',
        //     'tahun_terbit' => 2023,
        //     'cover_buku' => $faker->imageUrl(400, 600, 'books', true),
        //     'deskripsi' => $faker->paragraph(),
        //     'kategori_id' => $faker->numberBetween(1, 3),
        // ]);


        //** buku field baru 10 */ 
        Buku::factory()->create([
            'judul' => 'Seni Berbicara di Depan Umum',
            'isbn' => '978-602-1234-56-7',
            'penulis' => 'Emily Carter',
            'penerbit' => 'PublicSpeaking Inc.',
            'tahun_terbit' => 2020,
            'cover_buku' => 'https://images.unsplash.com/photo-1538035323718-63409b754ce7?q=80&w=3435&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
        
        Buku::factory()->create([
            'judul' => 'Rahasia Jago Fotografi',
            'isbn' => '978-602-9876-54-3',
            'penulis' => 'Michael Davis',
            'penerbit' => 'PhotoMaster Press',
            'tahun_terbit' => 2019,
            'cover_buku' => 'https://images.unsplash.com/photo-1629992101753-56d196c8aabb?q=80&w=3390&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
        
        Buku::factory()->create([
            'judul' => 'Panduan Lengkap Memasak Vegan',
            'isbn' => '978-602-5678-90-1',
            'penulis' => 'Sarah Wilson',
            'penerbit' => 'VeganKitchen Books',
            'tahun_terbit' => 2021,
            'cover_buku' => 'https://images.unsplash.com/photo-1641154748135-8032a61a3f80?q=80&w=3415&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
        
        Buku::factory()->create([
            'judul' => 'Belajar Bahasa Jepang dari Nol',
            'isbn' => '978-602-4321-87-6',
            'penulis' => 'Kenji Tanaka',
            'penerbit' => 'JapaneseLearning Co.',
            'tahun_terbit' => 2022,
            'cover_buku' => 'https://images.unsplash.com/photo-1633477189729-9290b3261d0a?q=80&w=3422&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
        
        Buku::factory()->create([
            'judul' => 'Kisah Petualangan di Antartika',
            'isbn' => '978-602-7890-12-3',
            'penulis' => 'Robert Miller',
            'penerbit' => 'AdventureTime Books',
            'tahun_terbit' => 2017,
            'cover_buku' => 'https://images.unsplash.com/photo-1612969308146-066d55f37ccb?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
        
        Buku::factory()->create([
            'judul' => 'Coding Python untuk Pemula',
            'isbn' => '978-602-2345-67-8',
            'penulis' => 'Alice Brown',
            'penerbit' => 'CodeWithPython Inc.',
            'tahun_terbit' => 2023,
            'cover_buku' => 'https://images.unsplash.com/photo-1459369510627-9efbee1e6051?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
        
        Buku::factory()->create([
            'judul' => 'Tips dan Trik Desain Grafis',
            'isbn' => '978-602-8765-43-2',
            'penulis' => 'Sophia Green',
            'penerbit' => 'GraphicDesign Hub',
            'tahun_terbit' => 2016,
            'cover_buku' => 'https://images.unsplash.com/photo-1652571305415-03416a741883?q=80&w=3078&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
        
        Buku::factory()->create([
            'judul' => 'Sejarah Dunia dalam 100 Hari',
            'isbn' => '978-602-3456-78-9',
            'penulis' => 'William White',
            'penerbit' => 'WorldHistory Press',
            'tahun_terbit' => 2015,
            'cover_buku' => 'https://images.unsplash.com/photo-1641261689151-7f818366e684?q=80&w=3387&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
        
        Buku::factory()->create([
            'judul' => 'Panduan Praktis Berkebun Organik',
            'isbn' => '978-602-6543-21-0',
            'penulis' => 'Olivia Black',
            'penerbit' => 'OrganicGardens Inc.',
            'tahun_terbit' => 2014,
            'cover_buku' => 'https://images.unsplash.com/photo-1633580969859-ee2aa7fd2648?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
        
        Buku::factory()->create([
            'judul' => 'Seni Melukis dengan Cat Air',
            'isbn' => '978-602-9876-54-1',
            'penulis' => 'Ethan Gray',
            'penerbit' => 'Watercolor Art Books',
            'tahun_terbit' => 2013,
            'cover_buku' => 'https://images.unsplash.com/photo-1641260199871-1c7145f3fc3b?q=80&w=3387&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'deskripsi' => $faker->paragraph(),
            'kategori_id' => $faker->numberBetween(1, 3),
        ]);
    }
}
