@extends('operator.layout')
@section('content')
<div class="container my-5">
    <h1>Edit Profil Sekolah</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('operator.profil-update', Crypt::encrypt($profil->id_profil)) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="mt-3 mb-3">
            <label for="nama_sekolah">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required>
        </div>

        <div class="mt-3 mb-3">
            <label for="kepala_sekolah">Kepala Sekolah</label>
            <input type="text" name="kepala_sekolah" class="form-control" id="kepala_sekolah" value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}" required>
        </div>

        <div class="mt-3 mb-3">
            <label for="foto">Foto Sekolah</label><br>
            @if($profil->foto)
                <img src="{{ asset('uploads/'.$profil->foto) }}" alt="Foto Sekolah" width="100" class="mb-2">
                <br>
            @endif
            <input type="file" name="foto" id="foto" class="form-control-file">
        </div>

        <div class="mt-3 mb-3">
            <label for="logo">Logo Sekolah (kosongkan jika tidak ingin ganti)</label><br>
            @if($profil->logo)
                <img src="{{ asset('storage/guru/'.$profil->logo) }}" alt="Logo Sekolah" width="150" class="mb-2">
                <br>
            @endif
            <input type="file" name="logo" id="logo" class="form-control-file">
        </div>

        <div class="mt-3 mb-3">
            <label for="npsn">NPSN</label>
            <input type="text" name="npsn" class="form-control" id="npsn" value="{{ old('npsn', $profil->npsn) }}">
        </div>

        <div class="mt-3 mb-3">
            <label for="kontak">Kontak</label>
            <input type="text" name="kontak" class="form-control" id="kontak" value="{{ old('kontak', $profil->kontak) }}">
        </div>

        <div class="mt-3 mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ old('alamat', $profil->alamat) }}</textarea>
        </div>

        <div class="mt-3 mb-3">
            <label for="visi_misi">Visi Misi</label>
            <textarea name="visi_misi" id="visi_misi" rows="3" class="form-control">{{ old('visi_misi', $profil->visi_misi) }}</textarea>
        </div>

        <div class="mt-3 mb-3">
            <label for="tahun_berdiri">Tahun Berdiri</label>
            <input type="text" name="tahun_berdiri" class="form-control" id="tahun_berdiri" value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}">
        </div>

        <div class="mt-3 mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control">{{ old('deskripsi', $profil->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Profil</button>
        <a href="{{ route('operator.profil') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection