<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\profil_sekolah;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $data ['guru'] = guru::all();
        return view('halamanUtama', $data);
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
