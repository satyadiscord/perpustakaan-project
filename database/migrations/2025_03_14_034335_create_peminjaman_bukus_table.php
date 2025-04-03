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
        Schema::create('peminjaman_bukus', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_peminjaman');
            $table->dateTime('tgl_pengembalian');
            $table->enum('status', ['pinjam', 'kembali']);
            $table->foreignId('buku_id')->constrained(table: 'bukus', indexName: 'fk_buku_id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained(table: 'users', indexName: 'fk_user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_bukus');
    }
};
