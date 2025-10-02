@extends('admin.layout')
@section('content')
<section class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Berita</h3>
        <a class="btn btn-success" href="{{ route('admin.Berita-create') }}"><i class="bi bi-plus-circle"></i> Tambah Berita</a>
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

    <!-- Form Search -->
    <form action="{{ route('admin.Berita') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari judul berita..."
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
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($berita as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->isi, 50) }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}" width="80" class="rounded">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.Berita-edit', Crypt::encrypt($item->id_berita)) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="{{ route('admin.Berita-delete', Crypt::encrypt($item->id_berita)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus berita ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Belum ada data berita.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $berita->appends(['search' => request('search')])->links() }}
    </div>
</section>
@endsection
