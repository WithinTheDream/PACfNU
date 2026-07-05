<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up()
    {
        // 1. Cek dulu, kalau tabel albums BELUM ADA, baru kita buat
        if (!Schema::hasTable('albums')) {
            Schema::create('albums', function (Blueprint $table) {
                $table->id();
                $table->string('nama_album');
                $table->timestamps();
            });
        }

        // 2. Lanjut edit tabel galleries dengan pengecekan aman
        Schema::table('galleries', function (Blueprint $table) {
            // Hapus kolom kategori jika masih ada
            if (Schema::hasColumn('galleries', 'kategori')) {
                $table->dropColumn('kategori');
            }
            
            // Tambahkan kolom album_id jika belum ada
            if (!Schema::hasColumn('galleries', 'album_id')) {
                $table->foreignId('album_id')->nullable()->constrained('albums')->onDelete('cascade');
            }
        });
    }

        /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
