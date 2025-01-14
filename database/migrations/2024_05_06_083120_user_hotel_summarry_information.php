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
        Schema::create('user_hotel_sumarry_information', function (Blueprint $table) {
            $table->id();
            $table->integer('total_jumlah_kamar');
            $table->string('ruang_pertemuan');
            $table->integer('total_jumlah_karyawan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
