<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormPengurusOssController extends Controller
{
    public function index()
    {
        return view('form_pengurus_oss.index', [
            'title' => 'Form_Pengurus_Oss',
            'active' => 'form_pengurus oss'
        ]);
    }
}
