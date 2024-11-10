<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotUserRoomCapacity extends Model
{
    use HasFactory;

    protected $table = 'pivot_namaruangan_for_table_user_meeting_room_capacity';
    
    protected $fillable = [
       '*'
    ];


    public function user_meeting_room_capacity()
    {
        return $this->belongsTo(UserMeetRoomCapacity::class, 'user_meeting_room_capacity_id');
    }
    public function nama_ruangan()
    {
        return $this->belongsTo(NamaRuangan::class, 'nama_ruangan_id');
    }
}
