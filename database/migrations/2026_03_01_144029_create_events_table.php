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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            
            // Kolom tambahan untuk jadwal acara
            $table->string('name'); // Nama acara (misal: Pengajian Selapanan)
            $table->text('description')->nullable(); // Deskripsi detail acara
            $table->string('location'); // Tempat acara
            $table->dateTime('event_date'); // Tanggal dan jam acara
            $table->enum('status', ['upcoming', 'completed'])->default('upcoming'); // Status acara
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
