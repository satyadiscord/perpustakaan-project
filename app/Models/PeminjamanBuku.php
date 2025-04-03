<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PeminjamanBuku extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanBukuFactory> */
    use HasFactory;

    protected $fillable = [
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status',
        'buku_id',
        'user_id',
    ];
    
    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class,'buku_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function pengembalian(): HasOne // Setiap peminjaman bisa memiliki satu pengembalian 
    {
        return $this->hasOne(PengembalianBuku::class, 'peminjaman_id');
    }
}

// App\Models\Buku::factory(20)->recycle([Kategori::factory(3)->create(), User::factory(5)->create(), PeminjamanBuku::factory(10)->create()])->create();
