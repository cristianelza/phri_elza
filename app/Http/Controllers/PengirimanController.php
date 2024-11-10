<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        return view('form_pengiriman_barang.index', [
            'title' => 'Form_Pengiriman_Barang',
            'active' => 'form_pengiriman barang'
        ]);
    }
}
