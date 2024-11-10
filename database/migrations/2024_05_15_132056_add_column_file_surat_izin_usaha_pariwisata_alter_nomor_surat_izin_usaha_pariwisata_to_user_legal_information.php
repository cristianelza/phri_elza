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
        Schema::table('user_legal_information', function (Blueprint $table) {
            Schema::table('user_legal_information', function (Blueprint $table) {
                $table->string('nomor_surat_izin_usaha_pariwisata')->after('file_tanda_daftar_usaha_periwisata');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_legal_information', function (Blueprint $table) {
            //
        });
    }
};