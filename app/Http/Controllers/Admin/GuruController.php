<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
      public function create()
    {
        return view('admin.createGuru');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_guru' => 'required|string',
            'nip' => 'required',
            'mapel' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // $foto = $request->file('foto');
        // $filename = time().'.'. $foto->getClientOriginalExtension();
        // $foto->storeAs('public/guru', $filename);
        // $validasi['foto'] = $filename;\

        if($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $fotoName = time().'_'.$foto->getClientOriginalName();
        $foto->move(public_path('uploads/guru/'), $fotoName);
    } else {
        $fotoName = null;
    }
        guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $fotoName,
        ]);

        return redirect()->route('admin.Guru')->with('Success','Data guru berhasil ditambahkan.');
    }
}
