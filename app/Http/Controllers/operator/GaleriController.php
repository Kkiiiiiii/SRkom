<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\galeri;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    //

    public function index(Request $request)
    {
        $search = $request->input('search');
        $galeri = galeri::query();
        if ($search) {
            $galeri->where('judul', 'like', "%{$search}%")
            ->orWhere('kategori', 'like', "%{$search}%");

        }
        $galeri = $galeri->paginate(10);
        return view('operator.galeri', compact('galeri'));
    }

     public function store(Request $request)
    {
        // Validasi inputan dari form tambah galeri
        $validasi = $request->validate([
            'judul' => 'required|string|max:100',
            'keterangan' => 'required|string|max:25000',
            'file' => 'required|mimes:jpg,jpeg,png,gif,mp4,mov,avi,mkv|max:204800',
            'kategori' => 'required|string|max:50',
            'tanggal' => 'required|date',
        ]);

        //upload file
        $file = $request->file('file');
        // Memberi nama file dengan timestamp agar unik
        $filename = time().".".$file->getClientOriginalExtension();
        $file->storeAs('galeri', $filename,'public');

        // Menyimpan nama file gambar ke dalam validasi
        $validasi['file'] = $filename;

        // Menyimpan data galeri ke database
        galeri::create($validasi);

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
        'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi,mkv|max:204800',
        'kategori' => 'required|string',
        'tanggal' => 'required|date',
    ]);

    if ($request->hasFile('file')) {
        // Hapus file lama
        if ($galeri->file && Storage::exists($galeri->file)) {
            Storage::delete($galeri->file);
        }

        $path = $request->file('file')->store('galeri', 'public');
        $validated['file'] = $path;
    }

    $galeri->update($validated);

    return redirect()->route('operator.galeri')->with('success', 'Galeri berhasil diupdate.');
    }

    public function delete(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $galeri = galeri::findOrFail($id);  
        if (Storage::exists('galeri/'.$galeri->file)) {
            Storage::delete('galeri/'.$galeri->file);
        }

        $galeri->delete();
        return redirect()->route('operator.galeri')->with('success', 'Galeri berhasil dihapus.');
    }
}
