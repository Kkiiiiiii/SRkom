@extends('admin.layout')
@section('content')
    <section class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Data Users</h3>
                <a class="btn btn-success" href="{{ route('admin.User-create') }}">+ Tambah Data User</a>
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
                    <td>{{ $item->Role }}</td>
                     <td style="min-width: 130px;">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                {{-- Tombol Edit --}}
                                <a
                                    href="{{ route('admin.User-edit',Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-info">Edit</a>

                                {{-- Tombol Hapus --}}
                                <a href="{{ route('admin.User-delete', Crypt::encrypt($item->id)) }}"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin data profil Sekolah ini dihapus?')">Hapus</a>
                            </div>
                        </td>
                </tr>
                @endforeach
                </tbody>
        </div>
    </section>
@endsection