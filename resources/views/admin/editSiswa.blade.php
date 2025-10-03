@extends('admin.layout')
@section('content')
<div class="container my-5">
    <h1>Edit Data Siswa</h1>

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
    <form action="{{ route('admin.Siswa-update', Crypt::encrypt($siswa->id_siswa)) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="mt-3 mb-3">
            <label for="nisn">NISN</label>
            <input type="number" name="nisn" class="form-control" id="nisn" value="{{ old('nisn', $siswa->nisn) }}" required>
        </div>

        <div class="mt-3 mb-3">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required>
        </div>


            <div class="mt-3 mb-3">
            <label>Jenis Kelamin</label><br>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-laki"
                    {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'checked' : '' }} required>
                <label class="form-check-label" for="laki">Laki-laki</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"
                    {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }} required>
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <label for="tahun_masuk">Tahun Masuk</label>
            <input type="year" name="tahun_masuk" class="form-control" id="tahun_masuk" value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}" required>

            <div class="mt-3">
                <a href="{{ route('admin.Siswa') }}" class="btn btn-secondary">Batal</a>
              <button type="submit" class="btn btn-primary">Update Data Siswa</button>
            </div>
    </form>
</div>
@endsection