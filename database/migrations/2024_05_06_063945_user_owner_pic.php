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
        Schema::create('user_owner_pic', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilik');
            $table->string('jabatan');
            $table->string('nomor_identitas_ktp')->nullable();
            $table->string('nomor_identitas_kitas')->nullable();
            $table->string('nomor_identitas_passport')->nullable();
            $table->string('telepon');
            $table->text('email');
            $table->string('nama_perwakilan')->nullable();
            $table->string('jabatan_perwakilan')->nullable();
            $table->string('nomor_identitas_ktp_perwakilan')->nullable();
            $table->string('nomor_identitas_kitas_perwakilan')->nullable();
            $table->string('nomor_identitas_passport_perwakilan')->nullable();
            $table->string('telepon_perwakilan')->nullable();
            $table->string('email_perwakilan')->nullable();
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
