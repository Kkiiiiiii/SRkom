<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\profil_sekolah;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class profilSekolahController extends Controller
{
    //

    public function index()
    {
        $ps = profil_sekolah::all();
        return view('admin.profilSekolah', compact('ps'));
    }
    
   public function create()
    {
        return view('admin.createProf');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'kepala_sekolah' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $request->hasFile('foto') 
            ? $request->file('foto')->store('profil_sekolah/foto', 'public') 
            : null;

        $logoPath = $request->hasFile('logo') 
            ? $request->file('logo')->store('profil_sekolah/logo', 'public') 
            : null;

        Profil_sekolah::create([
            'nama_sekolah' => $request->nama_sekolah,
            'kepala_sekolah' => $request->kepala_sekolah,
            'foto' => $fotoPath,
            'logo' => $logoPath,
            'npsn' => $request->npsn,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'visi_misi' => $request->visi_misi,
            'tahun_berdiri' => $request->tahun_berdiri,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.profilSek')->with('success', 'Data berhasil disimpan!');
    }

    // Form edit
    public function edit(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        $profil = Profil_sekolah::findOrFail($id);
        return view('admin.editProf', compact('profil'));
    }

    // Update
    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        $profil = Profil_sekolah::findOrFail($id);

        $request->validate([
            'nama_sekolah' => 'required',
            'kepala_sekolah' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'npsn' => 'nullable|string',
            'kontak' => 'nullable|string',
            'alamat' => 'nullable|string',
            'visi_misi' => 'nullable|string',
            'tahun_berdiri' => 'nullable|date_format:Y',
            'deskripsi' => 'nullable|string',
        ]);

        $profil->nama_sekolah = $request->nama_sekolah;
        $profil->kepala_sekolah = $request->kepala_sekolah;
        $profil->npsn = $request->npsn;
        $profil->kontak = $request->kontak;
        $profil->alamat = $request->alamat;
        $profil->visi_misi = $request->visi_misi;
        $profil->tahun_berdiri = $request->tahun_berdiri;
        $profil->deskripsi = $request->deskripsi;

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
                Storage::disk('public')->delete($profil->foto);
            }
            $profil->foto = $request->file('foto')->store('profil_sekolah/foto', 'public');
        }

        // Upload logo baru jika ada
        if ($request->hasFile('logo')) {
            if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
                Storage::disk('public')->delete($profil->logo);
            }
            $profil->logo = $request->file('logo')->store('profil_sekolah/logo', 'public');
        }

        $profil->save();

        return redirect()->route('admin.profilSek')->with('success', 'Data berhasil diperbarui!');
    }

    // Delete
    public function delete($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        $profil = Profil_sekolah::findOrFail($id);

        if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
            Storage::disk('public')->delete($profil->foto);
        }
        if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
            Storage::disk('public')->delete($profil->logo);
        }

        $profil->delete();

        return redirect()->route('admin.profilSek')->with('success', 'Data berhasil dihapus');
    }

}
