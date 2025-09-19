@extends('admin.layout')
@section('content')
    <section class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Data Guru</h3>
                <a class="btn btn-success" href="{{ route('admin.Guru-create') }}">+ Tambah Data Guru</a>
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
            <table class="table table table-secondary text-center align-middle">
                <thead class="table-danger">
                    <tr>
                        <th>ID Guru</th>
                        <th>nama_guru</th>
                        <th>nip</th>
                        <th>mapel</th>
                        <th>foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_guru }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->mapel }}</td>
                          <td>
                                @if ($item->foto)
                                    <img src="{{ asset('uploads/guru/' . $item->foto) }}" class="rounded-circle" width="60" height="60">
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                         <td style="min-width: 130px;">
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    {{-- Tombol Edit --}}
                                    <a
                                        href="" class="btn btn-sm btn-info">Edit</a>

                                    {{-- Tombol Hapus --}}
                                    <a href=""
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