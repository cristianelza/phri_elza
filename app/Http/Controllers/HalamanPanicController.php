<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\User;
use App\Events\Pengaduan;
use Illuminate\Http\Request;
use App\Models\MasterMasalah;

// Events
use App\Models\LaporanSeeders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HalamanPanicController extends Controller
{
    public function index()
    {
        $laporanseeder = LaporanSeeders::select('nama_pelapor', 'kelompok_masalah_pengirim')->get();
        $master_masalah = MasterMasalah::limit(3)->get();
        // dd($master_masalah);
        // $master_masalah = MasterMasalah::limit(1)->get();

        $title = 'Halaman_Panic';
        $active = 'halaman_panic';
        // [
        //     'title' => 'Halaman_Panic',
        //     'active' => 'halaman_panic'
        // ];

        return view('halaman_panic.index', compact('title', 'active', 'master_masalah', 'laporanseeder'));
    }

    public function create()
    {
        $laporanseeder = LaporanSeeders::select('nama_pelapor', 'kelompok_masalah_pengirim')->get();
        return $laporanseeder;
    }

    public function store(Request $request) 
    {   
        $logo = Auth::user()->member2 ? "storage/user_general_information".'/'.Auth::user()->member2->logo : "img/phri.jpg";
        $laporanseeder = new LaporanSeeders();
        $laporanseeder->nama_pelapor = $request->nama_pelapor;
        $laporanseeder->pelapor_id = auth()->user()->id;
        $laporanseeder->kelompok_masalah_pengirim = $request->kelompok_masalah_pengirim;
        $laporanseeder->alamat = $request->alamat;
        $laporanseeder->desckripsi_masalah = $request->desckripsi_masalah;
        $laporanseeder->tanggal_pengaduan = Carbon::now();
        $laporanseeder->save();

        // $pelapor = User::find($request->nama_pelapor);
        
        if($laporanseeder) {
            Session::flash('status', 'succes');
            Session::flash('message', 'Pengaduan Berhasil, Silakan tunggu Konfirmasi Admin!');
            Pengaduan::dispatch($laporanseeder->id,$laporanseeder->pelapor_id,$laporanseeder->nama_pelapor, $laporanseeder->desckripsi_masalah, strtoupper($laporanseeder->kelompok_masalah_pengirim), $laporanseeder->alamat, $logo);
        }

        return redirect('/halaman_panic');
    }

    public function get_data($nama) {
        $master_masalah = MasterMasalah::where('nama', 'LIKE', '%'.$nama.'%')->first();
        $user = Auth::user()->username;

        return ['master' => $master_masalah, 'user' => $user];
    }
}
