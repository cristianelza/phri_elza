<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Events\Feedback;
use Illuminate\Http\Request;
use App\Models\LaporanSeeders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PengaduanController extends Controller
{
    public function index()
    {
        $laporan_id = LaporanSeeders::when(Auth::user()->role_id == 2, function ($query) {
            $query->where(
                'pelapor_id',
                Auth::user()->id
            );
        })->orderBy('id', 'DESC')->get();
        return view('dashboard.pengaduan.index', [
            'title' => 'Halaman_Riwayat_Pengaduan',
            'active-sidebar' => 'halaman_riwayat_pengaduan',
            'laporanseeder' => $laporan_id
        ]);
    }

    // public function tolak(Request $request)
    // {
    //     $data = LaporanSeeders::find($request->id);
    //     $data->status = 'reject';
    //     $data->alasan = $request->alasan;
    //     $data->tanggal_pengaduan = Carbon::now();
    //     $data->checked_at = Carbon::now();
    //     $data->polisi_id = Auth::user()->id;
    //     $data->save();

    //     return ['status' => true];
    // }

    public function terima(Request $request, $id)
    {
        // dd($request->all(), $id);
        $data = LaporanSeeders::find($id);
        // $data->nama_polisi_penerima = $id->nama_polisi_penerima;
        // $data->waktu_terima_pengaduan = $id->waktu_terima_pengaduan;
        $data->status = 'approve';
        $data->tanggal_pengaduan = Carbon::now();
        $data->checked_at = Carbon::now();
        // $data->polisi_id = Auth::user()->id;
        $data->nama_polisi_penerima = $request->nama_polisi;
        $data->waktu_terima_pengaduan = $request->terima_pengaduan;
        $data->save();
        // return $data;
        
        return ['status' => true];
    }

    public function edit()
    {
        
    }

    public function proses($id, $laporan_id)
    {
        // dd($id);
        $data = LaporanSeeders::find($laporan_id);
        $data->status = 'proses';
        $data->checked_at = Carbon::now();
        $data->save();
        $this->sendPusher($id, 'proses');
        return ['status' => true];
    }
    public function menunggu($id)
    {
        $this->sendPusher($id, 'pending');
    }
    function sendPusher($id, $status)
    {
        Feedback::dispatch($id, $status);
    }
}
