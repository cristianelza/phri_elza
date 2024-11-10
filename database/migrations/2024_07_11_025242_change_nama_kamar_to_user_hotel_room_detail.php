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
        Schema::table('user_hotel_room_detail', function (Blueprint $table) {
            $table->string('nama_kamar')->nullable()->change();
            $table->bigInteger('jumlah')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_hotel_room_detail', function (Blueprint $table) {
            $table->string('nama_kamar')->change();
            $table->bigInteger('jumlah')->change();
        });
    }
};
