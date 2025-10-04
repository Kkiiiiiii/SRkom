@extends('admin.layout')
@section('content')
    <style>
        table#ekskul thead th {
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

        /* Optional: Atur tinggi baris agar gambar dan isi teks tidak terlalu rapat */
        #berita tbody tr>td {
            vertical-align: middle;
            /* vertical center */
        }
    </style>
    <section class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Data Ekstrakurikuler</h3>
            <a class="btn btn-success" href="{{ route('admin.ekskul.create') }}"><i class="bi bi-plus-circle"></i> Tambah
                Ekskul</a>
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
            <table class="table table-bordered text-center align-middle" id="ekskul">
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
                    @foreach ($ekskul as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_ekskul }}</td>
                            <td>{{ $item->pembina }}</td>
                            <td><span class="circle-bg">{{ $item->jadwal_latihan }}</span></td>
                            <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                            <td>
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" width="80" class="rounded">
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.ekskul.edit', Crypt::encrypt($item->id_ekskul)) }}"
                                    class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('admin.ekskul.delete', Crypt::encrypt($item->id_ekskul)) }}"
                                    class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus ekskul ini?')">
                                    <i class="bi bi-trash"></i>Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    {{-- Mengambil script dari layout --}}
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#ekskul').DataTable({
                    // untuk mengatur data table
                    pageLength: 5,
                    lengthChange: false,
                    info: false,
                    responsive: true,
                    ordering: false,
                    searching: true,
                });
            });
        </script>
    @endpush
@endsection
