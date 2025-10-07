@extends('admin.layout')
@section('content')
<style>
     table#guru thead th {
            text-align: center;
            /* rata tengah horizontal */
            vertical-align: middle;
            /* rata tengah vertikal */
        }

        /* Styling untuk badge oval di dalam tabel */
        .circle-bg {
            background-color: #6F9496;
            /* warna merah yang enak dilihat */
            color: white;
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            min-width: 60px;
            text-align: center;
            font-weight: 600;
            font-size: 0.9rem;
            white-space: nowrap;
            /* supaya teks tidak pecah ke baris baru */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            /* efek sedikit shadow supaya naik */
            transition: background-color 0.3s ease;
        }
</style>
<section class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Guru</h3>
        <a class="btn btn-success" href="{{ route('admin.Guru-create') }}">
            <i class="bi bi-plus-circle"></i> Tambah Data Guru
        </a>
    </div>
    <hr>
    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mt-10" style="margin-block: 20px">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped text-center align-middle" id="guru">
            <thead class="table-dark">
                <tr>
                    <th>ID Guru</th>
                    <th>Nama Guru</th>
                    <th>NIP</th>
                    <th>Mapel</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_guru }}</td>
                        <td>{{ $item->nip }}</td>
                        <td><span class="circle-bg">{{ $item->mapel }}</span></td>
                        <td>
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="rounded-circle" width="60" height="60" alt="Foto Guru">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td style="min-width: 130px;">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="{{ route('admin.Guru-edit', Crypt::encrypt($item->id_guru)) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('admin.Guru-delete', Crypt::encrypt($item->id_guru)) }}"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin data Guru ini dihapus?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>



@push('scripts')
<script>
    $(document).ready(function() {
        $('#guru').DataTable({
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
