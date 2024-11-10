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
        Schema::create('laporanSeeder', function (Blueprint $table) {
            $table->id();
            $table->string('user_id_pengirim');
            $table->string('kelompok_masalah_pengirim');
            $table->text('desckripsi_masalah', 500);
            $table->double('alamat')->required();
            $table->double('status')->default();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporanseeder');
    }
};
