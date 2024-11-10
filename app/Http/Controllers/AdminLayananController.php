<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminLayananController extends Controller
{
    public function index()
    {
        return view('dashboard.layanan.index', [
            'layanan' => Layanan::all()
        ]);
    }
    public function create()
    {
        return view('dashboard.layanan.create', [
            'layanan' => Layanan::all()
        ]);
    }

    public function delete($id)
    {
        Layanan::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Layanan Berhasil Dihapus!.',
        ]);
    }

    public function edit($id)
    {
        $layanan = Layanan::find($id);
        if ($layanan) {
            return response()->json([
                'status' => 200,
                'layanan' => $layanan,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Layanan Tidak Ada'
            ]);
        }
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'edit_nama' => 'required|max:255',
            'edit_gambar' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $layanan = Layanan::find($id);
            if ($layanan) {
                $layanan->nama = $request->edit_nama;
                if ($request->hasFile('edit_gambar')) {

                    if (File::exists('public/img/layanan/' . $layanan->gambar) == true) {
                      
                        File::delete('public/img/layanan/' . $layanan->gambar);
                    }
                    $file = $request->file('edit_gambar');
                    $ext = $file->getClientOriginalExtension();
                    $filename = Carbon::now()->format('YmdHis') . '-' . Str::slug($request->nama) . '.' . $ext;
                    $request->file('edit_gambar')->move('public/img/layanan', $filename);
                    $layanan->gambar = $filename;
                }
                $layanan->deskripsi = $request->deskripsi;
                $layanan->update();
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
}
