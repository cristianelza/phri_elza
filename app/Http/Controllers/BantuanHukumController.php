<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BantuanHukumController extends Controller
{
    public function index()
    {
        return view('form_bantuan_hukum.index', [
            'title' => 'Form_Bantuan_Hukum',
            'active' => 'form_bantuan hukum'
        ]);
    }
}
