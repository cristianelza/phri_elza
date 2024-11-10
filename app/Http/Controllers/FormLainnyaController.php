<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormLainnyaController extends Controller
{
    public function index()
    {
        return view('form_lainnya.index', [
            'title' => 'Form_Lainnya',
            'active' => 'form_lainnya'
        ]);
    }
}
