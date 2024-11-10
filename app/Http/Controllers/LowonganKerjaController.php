<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LowonganKerja;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class LowonganKerjaController extends Controller
{
    public function index()
    {
        $lowongan_kerja = LowonganKerja::all();
        return view('dashboard.lowongan_kerja.index', [
            'lowongan_kerja' => $lowongan_kerja
        ]);
    }

    public function lowongan_kerja()
    {
        return view('lowongan_kerja', [
            "title" => "kowongan_kerja",
            "active" => 'lowongan_kerja'
        ]);
    }

    public function LowonganKerja(Request $request)
    {
        // dd($request->all());
        //perform from validation here
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'usia' => 'required',
            'nomor_hp' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'pendidikan' => 'required',
            'cv' => 'required|mimes:pdf,docx,doc',
            'bidang_diminati' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        } else {
            try {
                if(LowonganKerja::where('email', $request->email)->first()) {
                    return response()->json(['success' => false, 'msg' => 'Data Sudah Ada!']);
                }

                $lowongan_kerja = new LowonganKerja;
                $lowongan_kerja->nama_lengkap = $request->nama_lengkap;
                $lowongan_kerja->alamat = $request->alamat;
                $lowongan_kerja->usia = $request->usia;
                $lowongan_kerja->phone = $request->nomor_hp;
                $lowongan_kerja->email = $request->email;
                $lowongan_kerja->pendidikan = $request->pendidikan;

                if ($request->hasFile('cv')) {
                    $file = $request->file('cv');
                    $ext = $file->getClientOriginalExtension();
                    $filename = Carbon::now()->format('YmdHis') . '-' . Str::slug($request->nama_lengkap) . '.' . $ext;
                    $path = $request->file('cv')->storeAs('lowongan_kerja', $filename);
                    $lowongan_kerja->cv = $filename;
                }

                $lowongan_kerja->bidang_diminati = $request->bidang_diminati;
                $lowongan_kerja->save();
                return response()->json(['success' => true, 'msg' => 'Data Berhasil']);
            } catch (\Exception $e) {
                dd($e);
                return response()->json(['success' => false, 'msg' => $e->getMessage()]);
            }
        }
    }
}
