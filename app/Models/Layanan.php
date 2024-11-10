<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $fillable = [''];
    protected $hidden = [''];
    protected $appends = ['take_foto'];


    public function getTakeFotoAttribute()
    {
        if (Storage::disk('true_public')->exists('img/layanan/' . $this->gambar)) {
            return asset('img/layanan/' . $this->gambar);
           
        } else if (Storage::disk('true_public')->exists('public/img/layanan/' . $this->gambar)) {
            return asset('public/img/layanan/' . $this->gambar);
          
        } else {
            return '-';
        }
    }
    public function layanan()
    {
        return $this->hasMany('App\Models\RiwayatLayanan', 'layanan_id');
    }
}
