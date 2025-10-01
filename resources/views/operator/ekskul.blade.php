@extends('operator.layout')
@section('content')
<section class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Ekstrakurikuler</h3>
        <a class="btn btn-success" href="{{ route('operator.ekskul-create') }}">+ Tambah Ekskul</a>
    </div>
    <hr>
     @if (session('success'))
                <div class="alert alert-success alert-dismissible mt-10" style="margin-block: 20px">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Ekskul</th>
                    <th>Pembina</th>
                    <th>Jadwal_latihan</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($ekskul as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_pembina }}</td>
                        <td>{{ $item->jadwal_latihan }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}" width="80" class="rounded">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.ekskul.edit', Crypt::encrypt($item->id_ekskul)) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('admin.ekskul.delete', Crypt::encrypt($item->id_ekskul)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus berita ini?')">Hapus</a>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</section>
@endsection
