<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('laporanseeder', function (Blueprint $table) {
            DB::statement("ALTER TABLE `laporanseeder` CHANGE `alamat` `alamat` TEXT NULL DEFAULT NULL");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporanseeder', function (Blueprint $table) {
            //
        });
    }
};
