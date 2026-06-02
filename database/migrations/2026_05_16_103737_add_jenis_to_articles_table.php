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
            Schema::table('articles', function (Blueprint $table) {
                // Tambahkan kolom jenis dengan nilai default 'biasa'
                $table->string('jenis')->default('biasa')->after('status');
            });
        }

        public function down(): void
        {
            Schema::table('articles', function (Blueprint $table) {
                $table->dropColumn('jenis');
            });
        }
};
