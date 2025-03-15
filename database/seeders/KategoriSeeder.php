<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::factory()->create([
            'name' => 'Pendidikan'
        ]);

        Kategori::factory()->create([
            'name' => 'Masyarakat'
        ]);

        Kategori::factory()->create([
            'name' => 'Kecerdasan'
        ]);
    }
}
