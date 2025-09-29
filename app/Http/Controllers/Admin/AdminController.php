<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\guru;
use App\Models\profil_sekolah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dash()
    {
        $data ['guru'] = guru::all();
        return view('admin.dashboard', $data);
    }

    public function profil()
    {
        $ps = profil_sekolah::all();
        return view('admin.profilSekolah', compact('ps'));
    }

    public function user()
    {
        return view('admin.user');
    }

    public function guru()
    {
        $guru = guru::all();
        return view('admin.guru', compact('guru'));
    }

    public function siswa()
    {
        return view('admin.siswa');
    }
}
