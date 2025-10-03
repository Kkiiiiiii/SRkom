@extends('operator.layout')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />

<section class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Data Profil Sekolah</h3>
        {{-- Tombol Tambah --}}
        <a class="btn btn-success" href="{{ route('operator.profil-create') }}">
            <i class="bi bi-plus-circle"></i> Tambah Profil</a>
    </div>
    <hr>

    {{-- Alert Success --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mt-10" style="margin-block: 20px">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Alert Error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle" id="ps">
            <thead class="table-dark">
                <tr>
                    <th>ID Profil</th>
                    <th>Nama Sekolah</th>
                    <th>Kepala Sekolah</th>
                    <th>Foto</th>
                    <th>Logo</th>
                    <th>NPSN</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Visi Misi</th>
                    <th>Tahun Berdiri</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ps as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_sekolah }}</td>
                        <td>{{ $item->kepala_sekolah }}</td>
                        <td>
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid" width="60" height="60" alt="Foto Sekolah">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->logo)
                                <img src="{{ asset('storage/' . $item->logo) }}" class="rounded-circle" width="60" height="60" alt="Logo Sekolah">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td>{{ $item->npsn }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->kontak }}</td>
                        <td>{{ Str::limit($item->visi_misi, 50)}}</td>
                        <td>{{ $item->tahun_berdiri }}</td>
                        <td>
                            {{ Str::limit($item->deskripsi, 50) }}
                        </td>
                        <td style="min-width: 130px;">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('operator.profil-edit', Crypt::encrypt($item->id_profil)) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>Edit</a>
                                </a>

                                {{-- Tombol Hapus --}}
                                <a href="{{ route('operator.profil-delete', Crypt::encrypt($item->id_profil)) }}"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin data profil Sekolah ini dihapus?')">
                                       <i class="bi bi-trash"></i>Hapus</a>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

{{-- Untuk Mengambil script dari layout --}}
@push('scripts')
<script>
    $(document).ready(function() {
        $('#ps').DataTable({
          // untuk mengatur data table
            pageLength: 5,
            lengthChange: false,
            info: false,
            responsive: false,
            ordering: false,
            searching: true,         
        });
    });
</script>
@endpush

@endsection
