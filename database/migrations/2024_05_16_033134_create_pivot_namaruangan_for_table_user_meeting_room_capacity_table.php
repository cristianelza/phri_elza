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
        Schema::create('pivot_namaruangan_for_table_user_meeting_room_capacity', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nama_ruangan_id', false, true);
            $table->index('nama_ruangan_id','pvt_namar_id_index');
            $table->foreign('nama_ruangan_id','pvt_namar_id_foreign')->references('id')->on('nama_ruangans');

            $table->bigInteger('user_meeting_room_capacity_id', false, true);
            $table->index('user_meeting_room_capacity_id','u_mtg_rm_id_index');
            $table->foreign('user_meeting_room_capacity_id','u_mtg_rm_id_foreign')->references('id')->on('user_meeting_room_capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_namaruangan_for_table_user_meeting_room_capacity');
    }
};
