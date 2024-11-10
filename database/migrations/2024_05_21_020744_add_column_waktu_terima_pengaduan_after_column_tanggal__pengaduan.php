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
            $table->dateTime('waktu_terima_pengaduan')->nullable()->after('tanggal_pengaduan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporanseeder', function (Blueprint $table) {
            $table->dropColumn(['waktu_terima_pengaduan']);
        });
    }
};
