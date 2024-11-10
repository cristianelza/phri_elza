<?php

use App\Models\NamaRuangan;
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
            $table->bigInteger('id_ruangan', false, true)->nullable();
            $table->index('id_ruangan');
            $table->foreign('id_ruangan')->references('id')->on('nama_ruangans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_meeting_room_capacity', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_ruangan');
        });
    }
};
