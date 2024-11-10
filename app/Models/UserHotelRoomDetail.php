<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHotelRoomDetail extends Model
{
    use HasFactory;
    protected $table = 'user_hotel_room_detail';
    protected $fillable = [
        'nama_kamar',
        'tipe_kamar',
        'jumlah',
    ];

}
