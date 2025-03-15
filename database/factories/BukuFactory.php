<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(5),
            'isbn' => fake()->numerify('###') . '-' . fake()->numerify('###') . '-' . fake()->numerify('####') . '-' . fake()->numerify('##') . '-' . fake()->numerify('#'),
            'penulis' => fake()->name(),
            'penerbit' => fake()->userName(),
            'tahun_terbit' => fake()->year(),
            'cover_buku' => fake()->imageUrl(360, 360, 'animals', true, 'cats'),
            'kategori_id' => Kategori::factory(),
        ];
    }
}
