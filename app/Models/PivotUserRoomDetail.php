<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotUserRoomDetail extends Model
{
    use HasFactory;

    protected $table = 'pivot_tipekamr_for_table_user_room_detail';
    
    protected $fillable = [
       '*'
    ];

    public function user_hotel_room_detail()
    {
        return $this->belongsTo(UserHotelRoomDetail::class, 'user_htl_room_detail_id');
    }
    public function tipe_kamar()
    {
        return $this->belongsTo(TipeKamar::class, 'tipe_kamar_id');
    }
}
