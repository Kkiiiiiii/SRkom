<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EkskulController extends Controller
{
    //
    
    public function create()
    {
        return view('admin.ekskulCreate');
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

        ekstrakurikuler::create($request->all());

        return redirect()->route('admin.ekskul')->with('success', 'Ekskul berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ekskul = ekstrakurikuler::findOrFail(Crypt::decrypt($id));
        return view('admin.ekskulEdit', compact('ekskul'));
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

        $ekskul->update($request->all());

        return redirect()->route('admin.ekskul')->with('success', 'Ekskul berhasil diperbarui');
    }

    public function delete($id)
    {
        $ekskul = ekstrakurikuler::findOrFail(Crypt::decrypt($id));
        $ekskul->delete();

        return redirect()->route('admin.ekskul')->with('success', 'Ekskul berhasil dihapus');
    }
}
