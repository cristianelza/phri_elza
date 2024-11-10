<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaRuangan extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];
    public function data_user_meeting_room_capacity(){
        return $this->hasMany(UserMeetRoomCapacity::class,'id_ruangan','id');
    }
}
