<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengembalianBuku extends Model
{
    /** @use HasFactory<\Database\Factories\PengembalianBukuFactory> */
    use HasFactory;

    protected $fillable = [
        'peminjaman_id',
        'tgl_pengembalian',
        'denda',
    ];

    public function peminjaman(): BelongsTo
    {
        return $this->belongsTo(PeminjamanBuku::class, 'peminjaman_id');
    }
}
