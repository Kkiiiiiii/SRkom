<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\berita;
use App\Models\guru;
use App\Models\profil_sekolah;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dash()
    {
        $data ['guru'] = guru::all();
        $data ['siswa'] = siswa::all();
        $data ['berita'] = berita::all();
        return view('admin.dashboard', $data);
    }

    public function profil()
    {
        $ps = profil_sekolah::all();
        return view('admin.profilSekolah', compact('ps'));
    }

    public function ekskul()
    {
        return view('admin.Ekskul',);
    }

    public function user()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
    }

    public function berita()
    {
        $berita = berita::all();
        return view('admin.berita', compact('berita'));
    }

    public function galeri()
    {
        return view('admin.galeri');
    }

    public function guru()
    {
        $guru = guru::all();
        return view('admin.guru', compact('guru'));
    }

    public function siswa()
    {
        $siswa = siswa::all();
        return view('admin.siswa', compact('siswa'));
    }
}
