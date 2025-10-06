<?php

namespace App\Http\Controllers;

use App\Models\Berita;
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
        $data['guru'] = guru::all();
        $data['siswa'] = siswa::whereIn('tahun_masuk', [2023, 2024, 2025])->get();
        $data['ekskul'] = ekstrakurikuler::all();
        $data['berita'] = Berita::with('user') // Mengambil relasi user
            ->orderBy('id_berita', 'desc') // Urutkan berdasarkan id_berita terbaru
            ->take(5) // Ambil 5 berita saja
            ->get();
        $data['galeri'] = galeri::orderBy('id_galeri', 'asc')->take(6)->get();
        return view('halamanUtama', $data);
    }

    public function info()
{
    $psRaw = profil_sekolah::all();

    $ps = $psRaw->map(function ($item) {
        $lines = preg_split('/\r\n|\r|\n/', trim($item->visi_misi));

        // Ambil baris pertama sebagai visi
        $visi = isset($lines[0]) ? trim($lines[0], '"') : '';

        // Sisanya anggap sebagai misi
        $misiLines = array_slice($lines, 1);
        $misi = implode("\n", $misiLines); // Gabung lagi jadi string

        $item->visi = $visi;
        $item->misi = $misi;

        return $item;
    });

    return view('profilSekolah', compact('ps'));
}


    public function berita()
    {
        $berita = Berita::with('user')->get();
        return view('berita', compact('berita'));
    }
     public function foto()
    {
        // Ambil data galeri dengan kategori foto (dengan field kategori)
        $foto = Galeri::where('kategori', 'foto')->get();
        return view('foto', compact('foto'));
    }

    public function video()
    {
        // Ambil data galeri dengan kategori video
        $video = Galeri::where('kategori', 'video')->get();
        return view('video', compact('video'));
    }
    public function Ekskul()
    {
        $ekskul = ekstrakurikuler::all();
        return view('ekskul', compact('ekskul'));
    }

    public function guru()
    {
        $guru = guru::all();
        return view('guru', compact('guru'));
    }
}
