<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormSupplierController extends Controller
{
    public function index()
    {
        return view('form_supplier.index', [
            'title' => 'Form_Supplier',
            'active' => 'form_supplier'
        ]);
    }
}
