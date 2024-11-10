<?php

namespace App\Http\Controllers;

use App\Models\LaporanSeeders;

class DashboardController extends Controller
{
    public function index() 
    {
        $data_perkelahian = LaporanSeeders::where('kelompok_masalah_pengirim', 'perkelahian')->count();
        $data_perampokan = LaporanSeeders::where('kelompok_masalah_pengirim', 'perampokan')->count();
        $data_lainnya = LaporanSeeders::where('kelompok_masalah_pengirim', 'lainnya')->count();
        $data_panic = [
            'perampokan' => $data_perampokan,
            'perkelahian' => $data_perkelahian,
            'lainnya' => $data_lainnya
        ];
        return view('dashboard.index',compact('data_panic'));

    }
}
