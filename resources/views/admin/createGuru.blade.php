@extends('admin.layout')
@section('content')
<div class="container my-5">
    <h3>Tambahkan data Guru</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.Guru-store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 mt-3">
            <label for="nama_guru" class="form-label">Nama Guru</label>
            <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Masukan Nama guru" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="number" class="form-control" id="nip" name="nip" placeholder="Masukan NIP" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="mapel" class="form-label">Mapel</label>
            <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Masukan Mapel" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="foto_guru" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>

        <div class="mb-3 mt-3">
            <input type="submit" value="SIMPAN" class="btn btn-success form-control">
        </div>
    </form>
</div>
@endsection
