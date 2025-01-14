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
            $table->string('nama_ruangan')->after('kapasitas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_meeting_room_capacity', function (Blueprint $table) {
            $table->dropColumn(['nama_ruangan']);
        });
    }
};
