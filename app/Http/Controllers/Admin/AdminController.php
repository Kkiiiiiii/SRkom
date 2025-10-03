<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\ekstrakurikuler;
use App\Models\galeri;
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
        $data ['berita'] = Berita::all();
        $data ['galeri'] = galeri::all();    
        $data ['ekskul'] = ekstrakurikuler::all();
        $data ['user'] = User::all();
        return view('admin.dashboard', $data);
    }

}
