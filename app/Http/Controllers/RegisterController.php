<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'phone' => 'max:12',
            'address' => 'required'
       ]);

       $user = User::create($request->all());

    //    $validatedData['password'] = bcrypt($validatedData['password']);

    //    $validatedData['password'] = Hash::make($validatedData['password']);

    //    User::create($validatedData);
        Session::flash('status', 'success');
        Session::flash('message', 'Registrasi Berhasil! Tunggu Approve Admin!');
       return redirect('/register');
    }
    
}
