<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Layanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RiwayatLayanan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $data['data_layanan'] = Layanan::paginate(6);
        $data['title'] = 'layanan';
        $data['active'] = 'layanan';
       
        return view('layanan', $data);
    }

    public function akses_layanan(Request $request, $layanan_id)
    {
        $data['layanan']  = Layanan::find($layanan_id);
        $data['title'] = 'Layanan ' . $data['layanan']->nama;
        $data['active'] = 'layanan';
        return view('form_layanan.index', $data);
    }

    public function store(Request $request, $layanan_id)
    {

        $store = new RiwayatLayanan();
        $store->user_id = User::where('username', 'LIKE', '%' . $request->nama . '%')->first()->id;
        $store->layanan_id = $layanan_id;
        $store->waktu = $request->waktu;
        $store->deskripsi = $request->deskripsi;
        $store->status = 'proses';
        $store->save();
    }

    public function addLayanan(Request $request)
    {
        $rules = [
            'nama' => ['required',],
            'gambar' => ['required'],
            'deskripsi' => ['required']
        ];
        $messages = [
            'nama.required' => 'Form Nama Diisi Dulu'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        } else {
            $layanan = new Layanan;
            $layanan->nama = $request->nama;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $ext = $file->getClientOriginalExtension();
                $filename = Carbon::now()->format('YmdHis') . '-' . Str::slug($request->nama) . '.' . $ext;
                $request->file('gambar')->move('public/img/layanan', $filename);
                $layanan->gambar = $filename;
            }
            $layanan->deskripsi = $request->deskripsi;
            $layanan->save();

            return redirect('/dashboard/layanan')->with('success', 'Layanan Berhasil Dibuat!');
        }
    }

    public function addPelayanan(Request $request, $layanan_id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => '',
            'kategori_layanan' => '',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        } else {
            try {
                $riwayat_layanan = new RiwayatLayanan();
                $riwayat_layanan->user_id = Auth::user()->id;
                $riwayat_layanan->waktu = Carbon::now();
                $riwayat_layanan->layanan_id = $layanan_id;
                $riwayat_layanan->deskripsi = $request->deskripsi;
                $riwayat_layanan->save();
                return response()->json(['success' => true, 'msg' => 'layanan berhasil ditambah']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'msg' => $e->getMessage()]);
            }
        }
    }
}
