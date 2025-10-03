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
        $data ['siswa'] = siswa::whereIn('tahun_masuk',[2023, 2024, 2025])->get();
        $data ['ekskul'] = ekstrakurikuler::all();
        $data ['berita'] = berita::orderBy('id_berita','desc')->take(5)->get();
        $data ['galeri'] = galeri::orderBy('id_galeri', 'asc')->take(6)->get();
        return view('halamanUtama', $data);
    }

    public function info()
    {
        $ps = profil_sekolah::all();
        return view('profilSekolah', compact('ps'));
    }

    public function berita()
    {
        $berita = berita::with('user')->get();
        return view('berita', compact('berita'));
    }
    public function Galeri()
    {
        $galeri = galeri::all();    
        return view('galeri', compact('galeri'));
    }
    public function Ekskul()
    {
        $ekskul = ekstrakurikuler::all();
        return view('ekskul', compact('ekskul'));
    }
}
