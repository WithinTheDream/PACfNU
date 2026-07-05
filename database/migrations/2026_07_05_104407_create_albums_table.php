<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // 1. Hapus tabel albums jika sebelumnya sudah terlanjur nyangkut
        Schema::dropIfExists('albums');

        // 2. Buat tabel album dengan bersih
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('nama_album');
            $table->timestamps();
        });

        // 3. Edit tabel galleries dengan pengecekan aman
        Schema::table('galleries', function (Blueprint $table) {
            // Cek dan hapus kolom kategori lama jika masih ada
            if (Schema::hasColumn('galleries', 'kategori')) {
                $table->dropColumn('kategori');
            }
            
            // Cek dan buat kolom album_id jika belum ada
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
