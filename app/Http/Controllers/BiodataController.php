<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        return view('biodata.index', [
            'title' => 'Biodata',
            'active' => 'biodata'
        ]);
    }
}
