<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\ekstrakurikuler;
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
        $data ['siswa'] = siswa::all();
        $data ['berita'] = Berita::all();
        $data ['galeri'] = galeri::all();
        $data ['ekskul'] = ekstrakurikuler::all();
        return view('operator.index', $data);
    }
}
