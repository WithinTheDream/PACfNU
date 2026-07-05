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
        Schema::table('articles', function (Blueprint $table) {
            // Cek dulu biar aman, kalau belum ada kolom images, baru ditambah
            if (!Schema::hasColumn('articles', 'images')) {
                $table->json('images')->nullable()->after('image');
            }
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            if (Schema::hasColumn('articles', 'images')) {
                $table->dropColumn('images');
            }
        });
    }
};
