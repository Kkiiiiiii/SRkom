@extends('operator.layout')
@section('content')
<section class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Berita</h3>
        <a class="btn btn-success" href="{{ route('operator.berita-create') }}">
          <i class="bi bi-plus-circle"></i>  Tambah Berita</a>
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
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->isi, 50) }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}" width="80" class="rounded">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('operator.berita-edit', Crypt::encrypt($item->id_berita)) }}" class="btn btn-sm btn-warning">
                                 <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="{{ route('operator.berita-delete', Crypt::encrypt($item->id_berita)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus berita ini?')">
                                 <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Belum ada data berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
{{-- Untuk Mengambil script dari layout --}}
@push('scripts')
<script>
    $(document).ready(function() {
        $('#berita').DataTable({
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
