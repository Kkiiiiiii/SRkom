@extends('admin.layout')
@section('content')
<div class="container my-5">
    <h3>Tambahkan data Profil Sekolah</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.profilSek-store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 mt-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Masukan Nama sekolah" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="kepala_sekolah" class="form-label">Kepala Sekolah</label>
            <input type="text" class="form-control" id="kepala_sekolah" name="kepala_sekolah" placeholder="Masukan Nama kepala sekolah" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="foto" class="form-label">Foto Sekolah</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="logo" class="form-label">Logo Sekolah</label>
            <input type="file" class="form-control" id="logo" name="logo" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="npsn" class="form-label">NPSN</label>
            <input type="number" class="form-control" id="npsn" name="npsn" placeholder="Masukan NPSN sekolah" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="alamat" class="form-label">Alamat Sekolah</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukan alamat sekolah" required></textarea>
        </div>

        <div class="mb-3 mt-3">
            <label for="kontak" class="form-label">Kontak Sekolah</label>
            <input type="number" class="form-control" id="kontak" name="kontak" placeholder="Masukan kontak sekolah" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="visi_misi" class="form-label">Visi Misi</label>
            <textarea class="form-control" id="visi_misi" name="visi_misi" placeholder="Masukan visi misi sekolah" required></textarea>
        </div>

        <div class="mb-3 mt-3">
            <label for="tahun_berdiri" class="form-label">Tahun Berdiri Sekolah</label>
            <input type="number" class="form-control" id="tahun_berdiri" name="tahun_berdiri" placeholder="Masukan tahun berdiri sekolah" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="deskripsi" class="form-label">Deskripsi Sekolah</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukan deskripsi sekolah" required></textarea>
        </div>

        <div class="mb-3 mt-3">
            <input type="submit" value="SIMPAN" class="btn btn-primary form-control">
        </div>
    </form>
</div>
@endsection
