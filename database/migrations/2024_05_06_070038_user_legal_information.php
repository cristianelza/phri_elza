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
        Schema::create('user_legal_information', function (Blueprint $table) {
            $table->id();
            $table->string('nama_badan_hukum');
            $table->string('nomor_akte_pendirian_perusahaan');
            $table->string('nomor_npwp_perusahaan');
            $table->string('nomor_induk_berusaha')->nullable();
            $table->string('file_induk_berusaha')->nullable();
            $table->string('nomor_surat_izin_usaha_pariwisata')->nullable();
            $table->string('file_tanda_daftar_usaha_periwisata')->nullable();
            $table->string('nomor_surat_izin_usaha_perdagangan')->nullable();
            $table->string('file_surat_izin_usaha_perdagangan')->nullable();
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
