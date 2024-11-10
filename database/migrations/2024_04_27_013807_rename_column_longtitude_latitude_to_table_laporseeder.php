<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('laporanseeder', function (Blueprint $table) {
            $table->renameColumn('longtitude', 'alamat');
            $table->renameColumn('latitude', 'status');
        });

        Schema::table('laporanseeder', function (Blueprint $table) {
            DB::statement("ALTER TABLE `laporanseeder` CHANGE `status` `status` ENUM('pending','approve','reject') NULL DEFAULT NULL");
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_laporseeder', function (Blueprint $table) {
            //
        });
    }
};
