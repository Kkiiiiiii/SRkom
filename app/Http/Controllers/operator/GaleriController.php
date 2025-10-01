<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    //
         public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4|max:2048',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        // Simpan file
        $path = $request->file('file')->store('galeri', 'public');
        $validated['file'] = $path;

        galeri::create($validated);

        return redirect()->route('operator.galeri')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = galeri::findOrFail($id);
        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = galeri::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:2048',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('galeri', 'public');
            $validated['file'] = $path;
        } else {
            $validated['file'] = $galeri->file;
        }

        $galeri->update($validated);

        return redirect()->route('operator.Galeri')->with('success', 'Galeri berhasil diupdate.');
    }

    public function delete($id)
    {
        $galeri = galeri::findOrFail($id);
        $galeri->delete();
        return redirect()->route('operator.Galeri')->with('success', 'Galeri berhasil dihapus.');
    }
}
