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
        Schema::create('pengembalian_bukus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->constrained(table: 'peminjaman_bukus', indexName: 'fk_peminjaman_id');
            $table->dateTime('tgl_pengembalian');
            $table->integer('denda')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_bukus');
    }
};
