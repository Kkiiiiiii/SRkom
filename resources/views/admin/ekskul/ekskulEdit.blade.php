@extends('admin.layout')

@section('content')
<div class="container my-5">
    <h3>Edit Ekskul</h3>
    <hr>

    <form action="{{ route('admin.ekskul.update', Crypt::encrypt($ekskul->id_ekskul)) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_ekskul" class="form-label">Nama Ekskul</label>
            <input type="text" name="nama_ekskul" id="nama_ekskul" class="form-control"
                   value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}" required>
        </div>

        <div class="mb-3">
            <label for="pembina" class="form-label">Pembina</label>
            <input type="text" name="pembina" id="pembina" class="form-control"
                   value="{{ old('pembina', $ekskul->pembina) }}">
        </div>

        <div class="mb-3">
            <label for="jadwal_latihan" class="form-label">Jadwal Latihan</label>
            <input type="text" name="jadwal_latihan" id="jadwal_latihan" class="form-control"
                   value="{{ old('jadwal_latihan', $ekskul->jadwal_latihan) }}">
        </div>

          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
             @if($ekskul->gambar)
                <img src="{{ asset('storage/'.$ekskul->gambar) }}" width="100" class="rounded mb-2"><br>
            @endif
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

        <div class="mt-3">
            <a href="{{ route('admin.Ekskul') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
