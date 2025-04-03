<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;

    protected $fillable = [
        'judul',
        'isbn',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'deskripsi',
        'stok_buku',
        'cover_buku',
        'kategori_id',
    ];

    public function kategori(): BelongsTo // many to one: banyak buku terdapat 1 kategori saja.
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
