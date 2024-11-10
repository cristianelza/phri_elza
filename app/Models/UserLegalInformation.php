<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLegalInformation extends Model
{
    use HasFactory;
    protected $table = 'user_legal_information';
    protected $fillable = [
        'nama_badan_hukum',
        'nomor_akte_pendiri_perusahaan',
        'nomor_inpwp_perusahaan',
        'nomor_induk_berusaha',
        'nomor_tanda_daftar_pariwisata',
        'file_tanda_daftar_pariwisata',
        'nomor_surat_izin_usaha_pariwisata',
        'file_surat_izin_usaha_pariwisata',
        'nomor_surat_izin_usaha_perdagangan',
        'file_surat_izin_usaha_perdagangan',
    ];
}
