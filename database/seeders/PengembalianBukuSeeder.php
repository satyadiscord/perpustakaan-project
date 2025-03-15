<?php

namespace Database\Seeders;

use App\Models\PengembalianBuku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengembalianBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PengembalianBuku::factory()->create([
            'peminjaman_id' => '',
            'tgl_pengembalian' => now(),
            'denda' => 0,
        ]);
    }
}
