<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOwnerPic extends Model
{
    use HasFactory;
    protected $table = 'user_owner_pic';
    protected $fillable = [
        'nama_pemilik',
        'jabatan',
        'nomor_identitas_ktp',
        'nomor_identitas_kitas',
        'nomor_identitas_passport',
        'telelpon',
        'email',
        'nama_perwakilan',
        'jabatan',
        'nomor_identias_ktp',
        'nomor_identias_kitas',
        'nomor_identias_passport',
        'telepon',
        'email'
    ];
}
