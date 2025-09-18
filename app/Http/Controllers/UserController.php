<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('halamanUtama');
    }

    public function info()
    {
        return view('profilSekolah');
    }

    public function berita()
    {
        return view('berita');
    }
    public function Galeri()
    {
        return view('galeri');
    }
    public function Ekskul()
    {
        return view('ekskul');
    }
}
