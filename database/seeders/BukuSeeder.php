<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            'judul' => 'Cara kaya pada tahun 2025',
            'isbn' => '901-839-3290-90-8',
            'penulis' => 'Akbar',
            'penerbit' => 'Ahmad Akbar',
            'tahun_terbit' => date('Y'),
            'cover_buku' => 'url.com',
            'kategori_id' => 2,
        ]);

        Buku::factory()->create([
            'judul' => 'Pendidikan itu penting!',
            'isbn' => '901-839-3290-88-90',
            'penulis' => 'Miya',
            'penerbit' => 'Mr. Miya',
            'tahun_terbit' => date('Y'),
            'cover_buku' => 'url.com',
            'kategori_id' => 1,
        ]);

        Buku::factory()->create([
            'judul' => 'Petualangan di Dunia Fantasi',
            'isbn' => '978-602-03-1234-5',
            'penulis' => 'Andi Wijaya',
            'penerbit' => 'Penerbit Cemerlang',
            'tahun_terbit' => 2020,
            'cover_buku' => 'https://via.placeholder.com/150',
            'kategori_id' => 3,
        ]);

        Buku::factory()->create([
            'judul' => 'Rahasia Pulau Misterius',
            'isbn' => '978-602-03-5678-9',
            'penulis' => 'Siti Nurhayati',
            'penerbit' => 'Pustaka Ilmu',
            'tahun_terbit' => 2021,
            'cover_buku' => 'https://via.placeholder.com/150',
            'kategori_id' => 2,
        ]);

        Buku::factory()->create([
            'judul' => 'Belajar Pemrograman dengan Python',
            'isbn' => '978-602-03-9012-3',
            'penulis' => 'Budi Santoso',
            'penerbit' => 'Tekno Media',
            'tahun_terbit' => 2022,
            'cover_buku' => 'https://via.placeholder.com/150',
            'kategori_id' => 3,
        ]);

        Buku::factory()->create([
            'judul' => 'Sejarah Dunia dalam 100 Halaman',
            'isbn' => '978-602-03-4321-0',
            'penulis' => 'Dewi Lestari',
            'penerbit' => 'Wawasan Kita',
            'tahun_terbit' => 2023,
            'cover_buku' => 'https://via.placeholder.com/150',
            'kategori_id' => 2,
        ]);

        Buku::factory()->create([
            'judul' => 'Resep Masakan Nusantara',
            'isbn' => '978-602-03-8765-4',
            'penulis' => 'Citra Dewi',
            'penerbit' => 'Kuliner Sehat',
            'tahun_terbit' => 2024,
            'cover_buku' => 'https://via.placeholder.com/150',
            'kategori_id' => 2,
        ]);

        Buku::factory()->create([
            'judul' => 'Kisah Para Pahlawan',
            'isbn' => '978-602-03-1111-1',
            'penulis' => 'Rudi Hartono',
            'penerbit' => 'Buku Anak Indonesia',
            'tahun_terbit' => 2019,
            'cover_buku' => 'https://via.placeholder.com/150',
            'kategori_id' => 2,
        ]);
    }
}
