<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminPusatController extends Controller
{
    public function index()
    {
        return view('dashboard_pusat.index');
    }
}
