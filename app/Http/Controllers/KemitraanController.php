<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kemitraan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KemitraanController extends Controller
{
    public function kemitraan()
    {
        return view('kemitraan', [
            "title" => "Kemitraan",
            "active" => 'kemitraan'
        ]);
    }

    public function addKemitraan(Request $request)
    {
        // dd($request->all());
        //perform from validation here
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'nomor_hp' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'penawaran' => 'required',
            'proposal_penawaran' => 'required|mimes:pdf,docx,doc',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        } else {
            try {
                if(Kemitraan::where('email', $request->email)->first()) {
                    return response()->json(['success' => false, 'msg' => 'Data Sudah Ada!']);
                }

                $kemitraan = new Kemitraan;
                $kemitraan->nama_perusahaan = $request->nama_perusahaan;
                $kemitraan->phone = $request->nomor_hp;
                $kemitraan->email = $request->email;
                $kemitraan->penawaran = $request->penawaran;

                if($request->hasFile('proposal_penawaran')) {
                    $file = $request->file('proposal_penawaran');
                    $ext = $file->getClientOriginalExtension();
                    $filename = Carbon::now()->format('YmdHis').'-'.Str::slug($request->nama_perusahaan).'.'.$ext;
                    $path = $request->file('proposal_penawaran')->storeAs('kemitraan', $filename);
                    $kemitraan->proposal_penawaran = $filename;
                }

                $kemitraan->deskripsi = $request->deskripsi;
                $kemitraan->save();
                return response()->json(['success' => true, 'msg' => 'Data Berhasil']);
            } catch (\Exception $e) {
                dd($e);
                return response()->json(['success' => false, 'msg' => $e->getMessage()]);
            }
        }
    }
}
