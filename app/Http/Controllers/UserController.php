<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\guru;
use App\Models\profil_sekolah;
use App\Models\siswa;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $data ['guru'] = guru::all();
        $data ['siswa'] = siswa::all();
        $data ['berita'] = berita::orderBy('id_berita','asc')->take(3)->get();
        return view('halamanUtama', $data);
    }

    public function info()
    {
        $ps = profil_sekolah::all();
        return view('profilSekolah', compact('ps'));
    }

    public function berita()
    {
        $berita = berita::orderBy('id_berita', 'asc')->get();
        return view('berita', compact('berita'));
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
