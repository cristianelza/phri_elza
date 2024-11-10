<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormKeributanController extends Controller
{
    public function index()
    {
        return view('form_keributan.index', [
            'title' => 'Form_Keributan',
            'active' => 'form_keributan'
        ]);
    }
}
