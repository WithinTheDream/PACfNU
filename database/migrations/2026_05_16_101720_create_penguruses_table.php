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
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['PAC', 'Lembaga']); 
            $table->string('bidang')->nullable(); // Contoh: 'Garda Fatayat', 'Bidang Pendidikan', dll. Kosongkan jika level inti.
            $table->string('jabatan'); // Penanggungjawab, Ketua, Koordinator, Anggota
            $table->string('nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguruses');
    }
};
