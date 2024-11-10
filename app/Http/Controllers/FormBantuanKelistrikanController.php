<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormBantuanKelistrikanController extends Controller
{
    public function index()
    {
        return view('form_bantuan_kelistrikan.index', [
            'title' => 'Form_Bantuan_Kelistrikan',
            'active' => 'form_bantuan_kelistrikan'
        ]);
    }
}
