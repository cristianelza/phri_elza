<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $data['title'] = 'home';
        $data['active'] = 'home';
        $data['data'] = Post::orderBy('id', 'DESC')->get();
        $data['layanan'] = Layanan::take(6)->get();
        // return $data['data'];
        // dd($data['data']);
        return view('home', $data);
    }
}
