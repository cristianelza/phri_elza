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
        Schema::table('riwayat_layanan', function (Blueprint $table) {
            $table->unsignedBigInteger('verified_admin_id');
            $table->foreign('verified_admin_id')->references('id')->on('users');
            $table->text('alasan')->nullable();
            $table->text('deskripsi')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayat_layanan', function (Blueprint $table) {
            //
        });
    }
};
