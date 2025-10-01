<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\ekstrakurikuler;
use App\Models\galeri;
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
        $data ['ekskul'] = ekstrakurikuler::all();
        $data ['berita'] = berita::orderBy('id_berita','asc')->take(3)->get();
        $data ['galeri'] = galeri::all();
        $data ['guru'] = guru::all();
        return view('halamanUtama', $data);
    }

    public function info()
    {
        $ps = profil_sekolah::all();
        return view('profilSekolah', compact('ps'));
    }

    public function berita()
    {
        $berita = berita::all();
        return view('berita', compact('berita'));
    }
    public function Galeri()
    {
        $galeri = galeri::all();    
        // $galeri = galeri::orderBy('id_galeri','asc')->get();
        return view('galeri', compact('galeri'));
    }
    public function Ekskul()
    {
        $ekskul = ekstrakurikuler::all();
        return view('ekskul', compact('ekskul'));
    }
}
