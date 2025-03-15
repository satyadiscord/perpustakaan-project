<?php

namespace Tests\Feature;

use App\Models\Buku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BukuTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_stok_buku(): void
    {
        $buku = Buku::find(2);
        dd($buku);

        $response = $this->get('/buku/2');

        $response->assertStatus(200);
    }
}
