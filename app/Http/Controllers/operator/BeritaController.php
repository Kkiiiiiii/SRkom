<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    //

    public function index(Request $request) 
    {
    $berita = Berita::all();
    return view('operator.berita', compact('berita'));
    }
    
    public function create()
    {
        return view('operator.beritaCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:150',
            'isi'     => 'required|string|max:5000',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar'  => $gambarPath,   
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('operator.berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail(Crypt::decrypt($id));
        return view('operator.beritaEdit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail(Crypt::decrypt($id));

        $request->validate([
            'judul'   => 'required|string|max:150',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        } else {
            $gambarPath = $berita->gambar;
        }

        $berita->update([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar'  => $gambarPath,
        ]);

        return redirect()->route('operator.berita')->with('success', 'Berita berhasil diupdate.');
    }

    public function delete($id)
    {
        $berita = Berita::findOrFail(Crypt::decrypt($id));
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();

        return redirect()->route('operator.berita')->with('success', 'Berita berhasil dihapus.');
    }
}
