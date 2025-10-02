@extends('admin.layout')
@section('content')
    <section class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Data Users</h3>
                <a class="btn btn-success" href="{{ route('admin.User-create') }}"><i class="bi bi-plus-circle"></i> Tambah Data User</a>
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

    <form action="{{ route('admin.User') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari User Berdasarkan Role..."
                value="{{ request('search') }}"
            >
            <button class="btn btn-outline-secondary" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>
    </form>
     {{ $user->appends(['search' => request('search')])->links() }}

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->role }}</td>
                     <td style="min-width: 130px;">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                {{-- Tombol Edit --}}
                                <a
                                    href="{{ route('admin.User-edit',Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-primary">
                                 <i class="bi bi-pencil"></i> Edit</a>

                                {{-- Tombol Hapus --}}
                                <a href="{{ route('admin.User-delete', Crypt::encrypt($item->id)) }}"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin data profil Sekolah ini dihapus?')">
                                 <i class="bi bi-trash"></i>Hapus</a>
                            </div>
                        </td>
                </tr>
                @endforeach
                </tbody>
        </div>
    </section>
@endsection