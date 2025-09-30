@extends('admin.layout')

@section('content')
<div class="container my-5">
    <h3>Tambah Ekskul</h3>
    <hr>

    <form action="{{ route('admin.ekskul.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_ekskul" class="form-label">Nama Ekskul</label>
            <input type="text" name="nama_ekskul" id="nama_ekskul" class="form-control" value="{{ old('nama_ekskul') }}" required>
            @error('nama_ekskul') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        
        <div class="mb-3">
            <label for="pembina" class="form-label">Pembina</label>
            <input type="text" name="pembina" id="pembina" class="form-control" value="{{ old('pembina') }}">
            @error('pembina') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        
        <div class="mb-3">
            <label for="jadwal_latihan" class="form-label">Jadwal Latihan</label>
            <input type="text" name="jadwal_latihan" id="jadwal_latihan" class="form-control" value="{{ old('jadwal_latihan') }}">
            @error('jadwal_latihan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control">{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

          <div class="mb-3 mt-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.Ekskul') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
