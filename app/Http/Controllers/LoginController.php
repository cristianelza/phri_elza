<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            //cek apakah user status = active
            if(Auth::user()->status != 'active'){
                Auth::logout();
                request()->session()->invalidate();
                request()->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'akun belum aktif, silakan hubungi admin!');
                return redirect('/login');
            }
            if(Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }
            if(Auth::user()->role_id == 3) {
                return redirect('/dashboard/pengaduan');
            }
            if(Auth::user()->role_id == 2) {
                return redirect('/');
            }
            // $request->session()->regenerate();
            // return redirect()->intended('/');
        }

        // return back()->with('loginError', 'Login failed!');
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid!');
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
