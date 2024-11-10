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
        Schema::table('laporanseeder', function (Blueprint $table) {
            $table->dropColumn(['nama_polisi_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporanseeder', function (Blueprint $table) {
            $table->bigInteger('nama_polisi_id');
            
        });
    }
};
