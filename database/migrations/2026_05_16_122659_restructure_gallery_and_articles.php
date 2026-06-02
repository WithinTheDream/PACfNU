<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    // 1. Ubah tabel galleries (Hapus relasi berita, tambah kategori)
    Schema::table('galleries', function (Blueprint $table) {
        $table->dropForeign(['article_id']);
        $table->dropColumn('article_id');
        $table->dropColumn('caption'); // Opsional jika tidak dipakai lagi
        $table->string('kategori')->after('id');
    });

    // 2. Tambah link_dokumentasi ke articles
    Schema::table('articles', function (Blueprint $table) {
        $table->string('link_dokumentasi')->nullable()->after('jenis');
    });
}
};
