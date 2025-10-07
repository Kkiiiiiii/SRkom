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
    $siswa = siswa::all();
    return view('operator.siswa.siswa', compact('siswa'));
}


    public function store(Request $request)
    {
        $request->validate([
           'nisn' => 'required|unique:siswa,nisn|max:11',
           'nama_siswa' => 'required|string',
           'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
           'tahun_masuk' => 'required|digits:4|integer',
        ]);

        siswa::create([
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
        return view('operator.siswa.siswa', compact('siswa'));
    }

    public function update(Request $request, $id)
        {
            $siswa = Siswa::findOrFail($id);
            $request->validate([
                'nisn' => 'required|unique:siswa,nisn|max:11,' . $siswa->id_siswa . ',id_siswa',
                'nama_siswa' => 'required|string',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'tahun_masuk' => 'required|digits:4|integer',
            ]);

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
