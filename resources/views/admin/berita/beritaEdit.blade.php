@extends('admin.layout')
@section('content')
<section class="container my-5">
    <h3>Edit Berita</h3>
    <hr>

    <form action="{{ route('admin.Berita-update', Crypt::encrypt($berita->id_berita)) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Berita</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" required>{{ old('isi', $berita->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $berita->tanggal) }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar (opsional)</label><br>
            @if($berita->gambar)
                <img src="{{ asset('storage/'.$berita->gambar) }}" width="100" class="rounded mb-2"><br>
            @endif
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

            <a href="{{ route('admin.Berita') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</section>
@endsection
