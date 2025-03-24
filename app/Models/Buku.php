<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;

    protected $fillable=[
        'judul',
        'isbn',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'cover_buku',
        'stok_buku',
        'deskripsi',
        'kategori_id',
    ];

    public function kategori(): BelongsTo // many to one: banyak buku terdapat 1 kategori saja.
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    } 
}
