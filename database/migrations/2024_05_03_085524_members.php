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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_usaha');
            $table->string('kepemilikan');
            $table->string('nama_usaha');
            $table->string('klasifikasi_usaha');
            $table->text('alamat');
            $table->string('provinsi');
            $table->string('kota_kabupaten');
            $table->string('kode_pos');
            $table->string('telepon');
            $table->string('email');
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
