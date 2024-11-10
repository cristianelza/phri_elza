<?php

namespace App\Http\Controllers;

use App\Models\LaporanSeeders;
use Illuminate\Http\Request;

class HalamanRiwayatPengaduanController extends Controller
{
    public function index()
    {
        $laporanseeder = LaporanSeeders::all();
        return view('halaman_riwayat_pengaduan.index', [
            'title' => 'Halaman_Riwayat_Pengaduan',
            'active' => 'halaman_riwayat_pengaduan',
            'laporanseeder' => $laporanseeder
        ]);
    }
}
