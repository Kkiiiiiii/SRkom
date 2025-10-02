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

            <form action="{{ route('operator.ekskul') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari Ekstrakurikuler atau jadwal-latihan..."
                value="{{ request('search') }}"
            >
            <button class="btn btn-outline-secondary" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Ekskul</th>
                    <th>Pembina</th>
                    <th>Jadwal Latihan</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ekskul as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_ekskul }}</td>
                        <td>{{ $item->pembina }}</td>
                        <td>{{ $item->jadwal_latihan }}</td>
                        <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}" width="80" class="rounded">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('operator.ekskul-edit', Crypt::encrypt($item->id_ekskul)) }}" class="btn btn-sm btn-warning">
                                 <i class="bi bi-pencil"></i>Edit</a>
                            <a href="{{ route('operator.ekskul-delete', Crypt::encrypt($item->id_ekskul)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus berita ini?')">
                                 <i class="bi bi-trash"></i>Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
           {{ $ekskul->appends(['search' => request('search')])->links() }}
    </div>
    </div>
</section>
@endsection
