<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\Feedback;
use Illuminate\Http\Request;
use App\Models\RiwayatLayanan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PelayananController extends Controller
{
    public function index()
    {
        $riwayat_layanan = RiwayatLayanan::with('user')->when(Auth::user()->role_id == 2, function ($query) {
            $query->where(
                'user_id',
                Auth::user()->id
            );
        })->orderBy('id', 'DESC')->get();
        return view('dashboard.pelayanan.index', [
            'title' => 'Halaman_Riwayat_Pelayanan',
            'active-sidebar' => 'halaman_riwayat_pelayanan',
            'riwayat_layanan' => $riwayat_layanan
        ]);
    }
    public function terima_layanan(Request $request)
    {
        try {
            $status = RiwayatLayanan::find($request->id);
            $status->status = 'diterima';
            $status->save();

            return ['status' => true];
        } catch (\Exception $e) {
            return ['status' => false];
        }
    }

    public function edit_pelayanan($id)
    {
        $riwayat_layanan = RiwayatLayanan::with('layanan', 'user')->find($id);
        if ($riwayat_layanan) {
            return response()->json([
                'status' => 200,
                'riwayat_layanan' => $riwayat_layanan,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Layanan Tidak Ada'
            ]);
        }
    }

    public function update_pelayanan(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'kategori' => '',
            'status_layanan' => 'required',
            'status' => '',
            'nama' => '',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $riwayat_layanan = RiwayatLayanan::find($id);
            if ($riwayat_layanan) {
                // $riwayat_layanan->user_id = $request->user_id;
                // $riwayat_layanan->layanan_id = $request->layanan_id;
                // $riwayat_layanan->status = $request->status;
                $riwayat_layanan->status_layanan = $request->status_layanan;
                $riwayat_layanan->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Update Layanan Berhasil!'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Layanan Tidak Ada'
                ]);
            }
        }
    }

    public function proses($id, $layanan_id)
    {
        $data = RiwayatLayanan::find($layanan_id);
        $data->status = 'proses';
        $data->created_at  = Carbon::now();
        $data->save();
        $this->sendPusher($id, 'proses');
        return ['status' => true];
    }

    public function menunggu($id)
    {
        $this->sendPusher($id, 'proses');
    }

    public function sendPusher($id, $status)
    {
        Feedback::dispatch($id, $status);
    }
}
