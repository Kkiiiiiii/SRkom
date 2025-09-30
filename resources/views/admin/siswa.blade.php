@extends('admin.layout')
@section('content')
    <section class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Data Siswa</h3>
                <a class="btn btn-success" href="{{ route('admin.Siswa-create') }}">+ Tambah Data Siswa</a>
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
            <table class="table table-md table-secondary text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID Siswa</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>JK</th>
                        <th>Tahun Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->tahun_masuk }}</td>
                         <td style="min-width: 130px;">
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    
                                    <a  
                                        href="{{ route('admin.Siswa-edit', Crypt::encrypt($item->id_siswa)) }}" class="btn btn-sm btn-info">Edit</a>

                                   
                                    <a href="{{ route('admin.Siswa-delete', Crypt::encrypt($item->id_siswa)) }}"
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