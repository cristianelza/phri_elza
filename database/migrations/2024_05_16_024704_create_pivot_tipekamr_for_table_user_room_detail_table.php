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
        Schema::create('pivot_tipekamr_for_table_user_room_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tipe_kamar_id', false, true);
            $table->index('tipe_kamar_id','pvt_tpk_id_index');
            $table->foreign('tipe_kamar_id','pvt_tpk_id_foreign')->references('id')->on('tipe_kamars');

            $table->bigInteger('user_htl_room_detail_id', false, true);
            $table->index('user_htl_room_detail_id','u_htl_rd_id_index');
            $table->foreign('user_htl_room_detail_id','u_htl_rd_id_foreign')->references('id')->on('user_hotel_room_detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_tipekamr_for_table_user_room_detail');
    }
};
