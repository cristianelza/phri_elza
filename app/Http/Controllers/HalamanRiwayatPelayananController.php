<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\RiwayatLayanan;
use Illuminate\Http\Request;

class HalamanRiwayatPelayananController extends Controller
{
    public function index()
    {
        $riwayat_layanan = RiwayatLayanan::all();
        return view('halaman_riwayat_pelayanan.index', [
            'title' => 'Halaman_Riwayat_pelayanan',
            'active' => 'halaman_riwayat_pelayanan',
            'riwayatpelayanan' => $riwayat_layanan
        ]);
    }
}
