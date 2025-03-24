<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('isbn')->unique()->nullable();
            $table->string('penulis');
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->text('cover_buku')->nullable();
            $table->text('deskripsi');
            $table->integer('stok_buku')->default(20);
            $table->foreignId('kategori_id')->constrained(table: 'kategoris', indexName: 'buku_kategori_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
