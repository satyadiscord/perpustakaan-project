<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeminjamanBuku>
 */
class PeminjamanBukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tgl_peminjaman' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'tgl_pengembalian' => fake()->dateTimeBetween('+1 week', '+2 weeks'),
            'status' => fake()->randomElement(['pinjam', 'kembali']),
            'buku_id' => Buku::factory(),
            'user_id' => User::factory(),
        ];
    }
}
