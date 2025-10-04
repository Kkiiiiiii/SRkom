@extends('admin.layout')
@section('content')
    <style>
        table#berita thead th {
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
            <h3>Data Berita</h3>
            <a class="btn btn-success" href="{{ route('admin.Berita-create') }}">
                <i class="bi bi-plus-circle"></i> Tambah Berita
            </a>
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
            <table class="table table-bordered text-center align-middle" id="berita">
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
                            <td><span class="circle-bg">{{ $item->judul }}</span></td>
                            <td>{{ Str::limit($item->isi, 50) }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" width="80" class="rounded"
                                        alt="Gambar Berita">
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.Berita-edit', Crypt::encrypt($item->id_berita)) }}"
                                    class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('admin.Berita-delete', Crypt::encrypt($item->id_berita)) }}"
                                    class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus berita ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Belum ada data berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#berita').DataTable({
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
