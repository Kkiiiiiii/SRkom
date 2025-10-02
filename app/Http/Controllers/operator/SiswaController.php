<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    //
    public function index(Request $request) {
    $search = $request->input('search');

    $siswa = siswa::query();

    if ($search) {
        $siswa->where(function ($query) use ($search) {
            $query->where('tahun_masuk', 'like', "%{$search}%")
                  ->orWhere('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('jenis_kelamin', 'like', "%{$search}%");
        });
    }

    $siswa = $siswa->paginate(10);

    return view('operator.siswa', compact('siswa'));
}


    public function store(Request $request)
    {
        $validasi = $request->validate([
           'nama_siswa' => 'required|string',
           'nisn' => 'required',
           'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
           'tahun_masuk' => 'required|digits:4|integer',
        ]);

        siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
            
        ]);

        return redirect()->route('operator.siswa')->with('Success','Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = siswa::findOrFail(Crypt::decrypt($id));
        return view('operator.editSiswa', compact('siswa'));
    }

        public function update(Request $request, $id)
        {
            $siswa = Siswa::findOrFail($id);
            $siswa->update([
                'nisn' => $request->nisn,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tahun_masuk' => $request->tahun_masuk,
            ]);

            return redirect()->back()->with('success', 'Data siswa berhasil diperbarui.');
        }


    public function delete($id)
    {
        $siswa = siswa::findOrFail(Crypt::decrypt($id));
        $siswa->delete();

        return redirect()->route('operator.siswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}
