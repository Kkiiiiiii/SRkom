<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
        $guru = guru::query();
        if ($search) {
            $guru->where('mapel', 'like', "%{$search}%");
        }
        $guru = $guru->paginate(10);
        return view('operator.guru.guru', compact('guru'));
    }


    public function create()
    {
        return view('operator.guru.createGuru');
    }

    // Menyimpan data guru baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string',
            'nip' => 'required|unique:guru,nip',
            'mapel' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('guru', 'public');
        }

        guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('operator.Guru')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $guru = guru::findOrFail(Crypt::decrypt($id));
        return view('operator.guru.editGuru', compact('guru'));
    }

    // Update data guru
    public function update(Request $request, $id)
    {
        $guru = guru::findOrFail(Crypt::decrypt($id));

        $request->validate([
            'nama_guru' => 'required|string',
            'nip' => 'required|unique:guru,nip,' . $guru->id_guru . ',id_guru',
            'mapel' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $fotoPath = $request->file('foto')->store('guru', 'public');
        } else {
            $fotoPath = $guru->foto; // tetap gunakan foto lama jika tidak ada upload baru
        }

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('operator.Guru')->with('success', 'Data guru berhasil diupdate.');
    }

    // Delete data guru
    public function destroy($id)
    {
        $guru = guru::findOrFail(Crypt::decrypt($id));

        // Hapus foto dari storage jika ada
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->route('operator.Guru')->with('success', 'Data guru berhasil dihapus.');
    }
}
