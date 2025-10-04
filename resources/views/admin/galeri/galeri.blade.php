@extends('admin.layout')
@section('content')
    <style>
        /* Styling header tabel */
        table#galeri thead th {
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

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">📸 Daftar Galeri</h2>
            <!-- Tombol trigger modal -->
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createGaleriModal">
                <i class="bi bi-plus-circle"></i> Tambah Galeri
            </button>
        </div>

        <hr>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle text-center" id="galeri">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>File</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galeri as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ Str::limit($item->keterangan, 50) }}</td>
                            <td>
                                @php $kategori = strtolower($item->kategori); @endphp

                                @if ($kategori === 'foto')
                                    <img src="{{ asset('storage/' . $item->file) }}" alt="Media" class="img-thumbnail"
                                        style="max-width:100px;">
                                @elseif($kategori === 'video')
                                    <video width="100" controls>
                                        <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                                        Your browser does not support video.
                                    </video>
                                @endif
                            </td>
                            <td><span class="circle-bg">{{ ucfirst($item->kategori) }}</span></td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-M-Y') }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editGaleriModal{{ $item->id_galeri }}">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <a href="{{ route('admin.Galeri-delete', Crypt::encrypt($item->id_galeri)) }}"
                                    class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus berita ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-muted">Belum ada data galeri.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- <table class="table table-hover table-striped align-middle text-center" id="galeri">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>File</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeri as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->keterangan, 50) }}</td>
                        <td>
                            @php
                                $kategori = strtolower($item->kategori);
                            @endphp

                            @if ($kategori === 'foto')
                                <img src="{{ asset('storage/' . $item->file) }}" alt="Media" class="img-thumbnail">
                            @elseif($kategori === 'video')
                                <video width="100" controls>
                                    <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                                    Your browser does not support video.
                                </video>
                            @endif
                        </td>
                        <td>{{ ucfirst($item->kategori) }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-M-Y') }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editGaleriModal{{ $item->id_galeri }}">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                            <a href="{{ route('admin.Galeri-delete', Crypt::encrypt($item->id_galeri)) }}"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin hapus berita ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <!-- Modal Edit Galeri -->
                    <!-- ... modal content tetap sama ... -->
                @empty
                    <tr>
                        <td colspan="7" class="text-muted">Belum ada data galeri.</td>
                    </tr>
                @endforelse
            </tbody>
        </table> --}}

            <!-- Modal Tambah Galeri -->
            <!-- ... modal content tetap sama ... -->
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#galeri').DataTable({
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
