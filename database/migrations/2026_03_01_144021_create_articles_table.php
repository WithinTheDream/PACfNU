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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            
            // Kolom tambahan untuk artikel berita
            $table->string('title'); // Judul berita
            $table->string('slug')->unique(); // URL ramah SEO, harus unik
            $table->text('content'); // Isi berita (pakai text karena panjang)
            $table->string('image')->nullable(); // Nama file foto, nullable berarti boleh kosong
            $table->enum('status', ['draft', 'published'])->default('published'); // Status tayang
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
