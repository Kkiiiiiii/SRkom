@extends('operator.layout')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">📸 Daftar Galeri</h2>
        <!-- Tombol trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createGaleriModal">
            <i class="bi bi-plus-circle"></i> Tambah Galeri
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle text-center">
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
                            $isImage = Str::endsWith($item->file, ['.jpg', '.jpeg', '.png', '.gif']);
                        @endphp

                        @if($isImage)
                            <img src="{{ asset('storage/'.$item->file) }}" alt="Media" class="img-thumbnail" style="max-width: 100px;">
                        @else
                            <video width="120" controls>
                                <source src="{{ asset('storage/'.$item->file) }}" type="video/mp4">
                                Your browser does not support video.
                            </video>
                        @endif
                    </td>
                    <td>{{ ucfirst($item->kategori) }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-M-Y') }}</td>
                    <td>
                      <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editGaleriModal{{ $item->id_galeri }}">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <form action="{{ route('operator.Galeri-delete', Crypt::encrypt($item->id_galeri)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-muted">Belum ada data galeri.</td>
                </tr>
                <!-- Modal Edit Galeri -->
                <div class="modal fade" id="editGaleriModal{{ $item->id_galeri }}" tabindex="-1" aria-labelledby="editGaleriModalLabel{{ $galeri->id_galeri }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                    <form action="{{ route('operator.Galeri-update', $item->id_galeri) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST') {{-- ganti dengan method yang sesuai (POST/PUT) sesuai route kamu --}}
                        <div class="modal-header">
                        <h5 class="modal-title" id="editGaleriModalLabel{{ $galeri->id_galeri }}">Edit Galeri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                        
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $galeri->keterangan) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">File (Gambar/Video)</label>
                                <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.png,.mp4">
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti file.</small>

                                {{-- Preview file lama --}}
                                @php
                                    $isImage = Str::endsWith($galeri->file, ['.jpg', '.jpeg', '.png', '.gif']);
                                @endphp
                                @if($isImage)
                                    <img src="{{ asset('storage/'.$galeri->file) }}" alt="Media" class="img-thumbnail mt-2" style="max-width: 150px;">
                                @else
                                    <video width="200" controls class="mt-2">
                                        <source src="{{ asset('storage/'.$galeri->file) }}" type="video/mp4">
                                        Browser kamu tidak mendukung video.
                                    </video>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $galeri->kategori) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $galeri->tanggal) }}" required>
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
          
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">File (Gambar/Video)</label>
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
@endsection
