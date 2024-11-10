<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'jenis_usaha',
        'kepemilikan',
        'nama_usaha',
        'klasifikasi usaha',
        'alamat',
        'provinsi',
        'kota_kabupaten',
        'kode_pos',
        'telepon',
        'email',
        'logo',
        'website',
        'user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    protected $attributes = [
        'jenis_usaha' => 'hotel'
    ];

    public function user1()
    {
        return $this->belongsTo(User::class);
    }
}
