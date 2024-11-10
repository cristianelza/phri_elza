<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSeeders extends Model
{
    use HasFactory;

    protected $table = 'laporanseeder';
    
    protected $fillable = [
        'tanggal_pengaduan',
        'nama_pelapor',
        'pelapor_id',
        'nama_polisi_penerima',
        'user_id_pengirim',
        'kelompok_masalah_pengirim',
        'alamat',
        'status',
        'desckripsi_masalah'
    ];
    protected $hidden = ['']  ;

    public function user() {
        return $this->belongsTo('App\Models\User', 'pelapor_id');
    }
}
