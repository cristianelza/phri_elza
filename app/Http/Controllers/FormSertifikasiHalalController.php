<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormSertifikasiHalalController extends Controller
{
    public function index()
    {
        return view('form_sertifikasi_halal.index', [
            'title' => 'Form_Sertifikasi_Halal',
            'active' => 'form_sertifikasi_halal'
        ]);
    }
}
