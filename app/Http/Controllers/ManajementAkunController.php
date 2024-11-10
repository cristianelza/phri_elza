<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LaporanSeeders;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ManajementAkunController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('dashboard.manajement_akun.index', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('dashboard.manajement_akun.create');
    }

    public function show($id)
    {
        //get post by ID
        $post = User::findOrFail($id);
        return response()->json($post ? $post : null);

        //render view with post
 
        // return view('dashboard.manajement_akun.detail');
    }

    public function terima_akun(Request $request)
    {
        try {
            $status = User::find($request->id);
            $status->status_data = 'diterima';
            $status->save();

            return ['status' => true];
        } catch (\Exception $e) {
            return ['status' => false];
        }
    }

    public function tolak_akun(Request $request)
    {
        $data = User::find($request->id);
        $data->status_data = 'ditolak';
        $data->alasan = $request->alasan;
        $data->save();

        return ['status' => true];
    }
}
