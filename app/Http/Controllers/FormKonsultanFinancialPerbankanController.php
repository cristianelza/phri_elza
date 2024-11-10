<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormKonsultanFinancialPerbankanController extends Controller
{
    public function index()
    {
        return view('form_konsultan_financial_perbankan.index', [
            'title' => 'Form_Konsultan_Financial_Perbankan',
            'active' => 'form_konsultan_financial_perbankan'
        ]);
    }
}
