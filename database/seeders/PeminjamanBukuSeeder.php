<?php

namespace Database\Seeders;

use App\Models\PeminjamanBuku;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeminjamanBuku::factory()->create([
            'tgl_peminjaman' => Carbon::now(),
            'tgl_pengembalian' => Carbon::now()->subDays(3),
            'status' => 'pinjam',
            'buku_id' => 2,
            'user_id' => 1,
        ]);
    }
}
