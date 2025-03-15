<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriFactory> */
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function buku(): HasMany // one to many: 1 kategori ke banyak buku
    {
        return $this->hasMany(Buku::class, 'kategori_id');
    }
}
