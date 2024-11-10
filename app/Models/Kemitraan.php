<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemitraan extends Model
{
    use HasFactory;
    protected $table = 'kemitraan';
    protected $fillable = [
        'nama_perusahaan',
        'nomor_hp',
        'email',
        'penawaran',
        'proposal_penawaran',
        'deskripsi',
    ];
}
