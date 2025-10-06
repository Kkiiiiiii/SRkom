<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EkskulController extends Controller
{
    //

       public function index(Request $request)
    {
       $ekskul = ekstrakurikuler::all();
        return view('operator.ekskul.ekskul',compact('ekskul'));
    }


    public function create()
    {
        return view('operator.ekskul.ekskulCreate');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:100',
            'pembina' => 'nullable|string|max:100',
            'jadwal_latihan' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

      $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('ekskul', 'public');
        }

        ekstrakurikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' =>$request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('operator.ekskul')->with('success', 'Ekskul berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ekskul = ekstrakurikuler::findOrFail(Crypt::decrypt($id));
        return view('operator.ekskul.ekskulEdit', compact('ekskul'));
    }

 public function update(Request $request, $id)
{
    $ekskul = ekstrakurikuler::findOrFail(Crypt::decrypt($id));

    $request->validate([
        'nama_ekskul' => 'required|string|max:100',
        'pembina' => 'nullable|string|max:100',
        'jadwal_latihan' => 'nullable|string|max:100',
        'deskripsi' => 'nullable|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $ekskul->nama_ekskul = $request->nama_ekskul;
    $ekskul->pembina = $request->pembina;
    $ekskul->jadwal_latihan = $request->jadwal_latihan;
    $ekskul->deskripsi = $request->deskripsi;

    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('ekskul', 'public');
        $ekskul->gambar = $gambarPath;
    }

    $ekskul->save();

    return redirect()->route('operator.ekskul')->with('success', 'Ekskul berhasil diperbarui');
}


    public function delete($id)
    {
        $ekskul = ekstrakurikuler::findOrFail(Crypt::decrypt($id));
        $ekskul->delete();

        return redirect()->route('operator.ekskul')->with('success', 'Ekskul berhasil dihapus');
    }
}
