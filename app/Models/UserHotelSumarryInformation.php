<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHotelSumarryInformation extends Model
{
    use HasFactory;
    protected $table = 'user_hotel_sumarry_information';
    protected $fillable = [
        'total_jumlah_karyawan',
        'ruang_pertemuan',
        'total_jumlah_karyawan',
    ];
}
