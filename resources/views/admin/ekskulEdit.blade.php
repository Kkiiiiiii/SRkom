@extends('admin.layout')

@section('content')
<div class="container my-5">
    <h3>Edit Ekskul</h3>
    <hr>

    <form action="{{ route('admin.ekskul.update', Crypt::encrypt($ekskul->id_ekskul)) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Ekskul</label>
            <input type="text" name="nama" id="nama" class="form-control" 
                   value="{{ old('nama', $ekskul->nama) }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="pembina" class="form-label">Pembina</label>
            <input type="text" name="pembina" id="pembina" class="form-control" 
                   value="{{ old('pembina', $ekskul->pembina) }}">
            @error('pembina') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="jadwal" class="form-label">Jadwal</label>
            <input type="text" name="jadwal" id="jadwal" class="form-control" 
                   value="{{ old('jadwal', $ekskul->jadwal) }}">
            @error('jadwal') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.ekskul.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
