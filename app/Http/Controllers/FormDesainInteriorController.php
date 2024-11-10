<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormDesainInteriorController extends Controller
{
    public function index()
    {
        return view('form_desain_interior.index', [
            'title' => 'Form_Desain_Interior',
            'active' => 'form_desain_interior'
        ]);
    }
}
