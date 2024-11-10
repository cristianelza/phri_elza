<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeetRoomCapacity extends Model
{
    use HasFactory;
    protected $table = 'user_meeting_room_capacity';
    protected $fillable = [
        'nama_ruangan',
        'kapasitas',
    ];
    public function relation_nama_ruangan(){
        return $this->belongsTo(NamaRuangan::class,'id_ruangan','id');
    }
}
