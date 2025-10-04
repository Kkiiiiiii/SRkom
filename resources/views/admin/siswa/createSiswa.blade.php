@extends('admin.layout')
@section('content')
<div class="container my-5">
    <h3>Tambahkan data Siswa</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.Siswa-store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 mt-3">
            <label for="nisn" class="form-label">NISN Siswa</label>
            <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Masukan Nisn" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="nama_siswa" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukan Nama Siswa" required>
        </div>

        <div class="mb-3 mt-3">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <br>
           <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" required> Laki-laki
           <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" required> Perempuan
        </div>

        <div class="mb-3 mt-3">
            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
            <input type="year" class="form-control" id="tahun_masuk" name="tahun_masuk" required>
        </div>

        <div class="mb-3 mt-3">
            <input type="submit" value="SIMPAN" class="btn btn-success form-control">
        </div>
    </form>
</div>
@endsection
