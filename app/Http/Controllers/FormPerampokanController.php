<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormPerampokanController extends Controller
{
    public function index()
    {
        return view('form_perampokan.index', [
            'title' => 'Form_Perampokan',
            'active' => 'form_perampokan'
        ]);
    }
}
