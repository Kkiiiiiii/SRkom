<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\berita;
use App\Models\galeri;
use App\Models\guru;
use App\Models\profil_sekolah;
use App\Models\siswa;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    //
    public function index()
    {
        $data ['guru'] = guru::all();
        $data ['siswa'] = siswa::all();
        $data ['berita'] = berita::all();
        $data ['galeri'] = galeri::all();
        return view('operator.index', $data);
    }
    public function berita()
    {
        $berita = berita::all();
        return view('operator.berita', compact('berita'));
    }
    public function profil()
    {
        $ps = profil_sekolah::all();
        return view('operator.profilSekolah', compact('ps'));
    }
    public function galeri()
    {
        $galeri = galeri::all();
        return view('operator.galeri',compact('galeri'));
    }

    public function ekskul()
    {
        return view('operator.ekskul');
    }

    public function siswa()
    {
        $siswa = siswa::all();
        return view('operator.siswa', compact('siswa'));
    }
}
