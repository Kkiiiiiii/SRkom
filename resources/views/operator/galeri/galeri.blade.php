    @extends('operator.layout')
    @section('content')
    <style>
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
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle text-center" id="galeri">
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
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->keterangan, 50) }}</td>
                        <td>
                        @php
                            $kategori = strtolower($item->kategori);
                        @endphp

                        @if($kategori === 'foto')
                            <img src="{{ asset('storage/' . $item->file) }}" class="img-thumbnail" style="max-width: 100px;">
                        @elseif($kategori === 'video')
                            <video width="150" controls>
                                <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                                Your browser does not support video.
                            </video>
                        @endif
                        </td>
                        <td><span class="circle-bg">{{ ucfirst($item->kategori) }}</span></td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-M-Y') }}</td>
                        <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editGaleriModal{{ $item->id_galeri  }}">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                               <a href="{{ route('operator.Galeri-delete', Crypt::encrypt($item->id_galeri)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus berita ini?')">
                                 <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                        <!-- Modal Edit Galeri -->
                    <div class="modal fade" id="editGaleriModal{{ $item->id_galeri }}" tabindex="-1" aria-labelledby="editGaleriModalLabel{{ $item->id_galeri }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                        <form action="{{ route('operator.Galeri-update', $item->id_galeri) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="modal-header">
                            <h5 class="modal-title" id="editGaleriModalLabel{{ $item->id_galeri }}">Edit Galeri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                                <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $item->judul) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $item->keterangan) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">File (Gambar/Video)</label>
                                    <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.png,.mp4">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti file.</small>

                                    {{-- Preview file lama --}}
                                    @php
                                        $isImage = Str::endsWith($item->file, ['.jpg', '.jpeg', '.png', '.gif']);
                                    @endphp
                                    @if($isImage)
                                        <img src="{{ asset('storage/' . $item->file) }}" alt="Media" class="img-thumbnail mt-2" style="max-width: 150px;">
                                    @else
                                        <video width="200" controls class="mt-2">
                                            <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                                            Browser kamu tidak mendukung video.
                                        </video>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $item->kategori) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $item->tanggal) }}" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="7" class="text-muted">Belum ada data galeri.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Tambah Galeri -->
    <div class="modal fade" id="createGaleriModal" tabindex="-1" aria-labelledby="createGaleriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
        <form action="{{ route('operator.Galeri-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="createGaleriModalLabel">Tambah Galeri Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">File (Gambar/Video)   </label>
                    <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.png,.mp4" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
        </div>
    </div>
    </div>
        </div>
    </div>
{{-- Untuk Mengambil script dari layout --}}
@push('scripts')
<script>
    $(document).ready(function() {
        $('#galeri').DataTable({
            // untuk mengatur data table
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
