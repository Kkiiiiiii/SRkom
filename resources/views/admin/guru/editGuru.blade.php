@extends('admin.layout')
@section('content')
<div class="container my-5">
    <h1>Edit Data Guru</h1>

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
    <form action="{{ route('admin.Guru-update', Crypt::encrypt($guru->id_guru)) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="mt-3 mb-3">
            <label for="nama_guru">Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" id="nama_guru" value="{{ old('nama_guru', $guru->nama_guru) }}" required>
        </div>

        <div class="mt-3 mb-3">
            <label for="nip">NIP</label>
            <input type="number" name="nip" class="form-control" id="nip" value="{{ old('nip', $guru->nip) }}" required>
        </div>
        
        <div class="mt-3 mb-3">
            <label for="mapel">Mapel</label>
            <input type="text" name="mapel" class="form-control" id="mapel" value="{{ old('mapel', $guru->mapel) }}" required>
        </div>

        <div class="mt-3 mb-3">
            <label for="foto">Foto Guru</label><br>
            @if($guru->foto)
                <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" width="100" class="mb-2">
                <br>
            @endif
            <input type="file" name="foto" id="foto" class="form-control-file">
        </div>

        <a href="{{ route('admin.Guru') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Update Data Guru</button>
    </form>
</div>
@endsection