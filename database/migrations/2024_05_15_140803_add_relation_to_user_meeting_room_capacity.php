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
        Schema::table('user_meeting_room_capacity', function (Blueprint $table) {
            $table->bigInteger('nama_ruangan',false, true)->change();
            $table->index('nama_ruangan');
            $table->foreign('nama_ruangan')->references('id')->on('nama_ruangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_meeting_room_capacity', function (Blueprint $table) {
            //
        });
    }
};
