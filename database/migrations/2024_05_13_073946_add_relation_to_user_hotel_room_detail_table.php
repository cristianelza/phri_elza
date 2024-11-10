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
            $table->bigInteger('tipe_kamar', false, true)->change();
            $table->index('tipe_kamar');
            $table->foreign('tipe_kamar')->references('id')->on('tipe_kamars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_hotel_room_detail', function (Blueprint $table) {
            //
        });
    }
};
