<?php

namespace App\Http\Controllers;

use App\Models\Kemitraan;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $kemitraan =Kemitraan::all();
        return view('dashboard.mitra.index', [
            'kemitraan' => $kemitraan
        ]);
    }
}
