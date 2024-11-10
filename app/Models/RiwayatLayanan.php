<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatLayanan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_layanan';
    protected $fillable = ['*'];

    public function layanan()
    {
        return $this->belongsTo('App\Models\Layanan', 'layanan_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
