@extends('operator.layout')
@section('content')
    <section class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Data Siswa</h3>
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createSiswaModal">
                <i class="bi bi-plus-circle"></i> Tambah Data Siswa 
            </button>
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
            <table class="table table-md table-secondary text-center align-middle" id="siswa">
                <thead class="table-dark">
                    <tr>
                        <th>ID Siswa</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
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
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editSiswaModal{{ $item->id_siswa }}">
                                    <i class="bi bi-pencil"></i>Edit
                                </button>
                                    <a href="{{ route('operator.siswa-delete', Crypt::encrypt($item->id_siswa)) }}"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin data profil Sekolah ini dihapus?')">
                                    <i class="bi bi-trash"></i>Edit</a></a>

                                </div>
                            </td>
                    </tr>
                    <!-- Modal Edit Siswa -->
                    <div class="modal fade" id="editSiswaModal{{ $item->id_siswa }}" tabindex="-1" aria-labelledby="editSiswaModalLabel{{ $item->id_siswa }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                        <form action="{{ route('operator.Siswa-update', $item->id_siswa) }}" method="POST">
                            @csrf
                            <div class="modal-header">
                            <h5 class="modal-title" id="editSiswaModalLabel{{ $item->id_siswa }}">Edit Data Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">

                            <div class="mb-3">
                                <label for="nisn{{ $item->id_siswa }}" class="form-label">NISN Siswa</label>
                                <input type="number" class="form-control" id="nisn{{ $item->id_siswa }}" name="nisn" value="{{ $item->nisn }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_siswa{{ $item->id_siswa }}" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa{{ $item->id_siswa }}" name="nama_siswa" value="{{ $item->nama_siswa }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label><br>
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ $item->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
                                <input type="radio" name="jenis_kelamin" value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}> Perempuan
                            </div>

                            <div class="mb-3">
                                <label for="tahun_masuk{{ $item->id_siswa }}" class="form-label">Tahun Masuk</label>
                                <input type="number" class="form-control" id="tahun_masuk{{ $item->id_siswa }}" name="tahun_masuk" value="{{ $item->tahun_masuk }}" required>
                            </div>

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>  
                    @endforeach
            </tbody>
               
            </table>
            {{-- Modal Tambah Siswa --}}
            <div class="modal fade" id="createSiswaModal" tabindex="-1" aria-labelledby="createSiswaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createGaleriModalLabel">Tambah Data Siswa</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('operator.siswa-store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 mt-3">
            <label for="nisn" class="form-label">NISN Siswa</label>
            <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Masukan Nisn" required>
        </div>

        <div class="mb-3 mt-3">
            <label for="nama_siswa" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukan Nama Siswa" required>
        </div>

        <div class="mb-3 mt-3">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <br>
           <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" required> Laki-laki
           <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" required> Perempuan
        </div>

        <div class="mb-3 mt-3">
            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
            <input type="year" class="form-control" id="tahun_masuk" name="tahun_masuk" required>
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
    </section>
    {{-- Untuk Mengambil script dari layout --}}
@push('scripts')
<script>
    $(document).ready(function() {
        $('#siswa').DataTable({
       // untuk mengatur data table
            pageLength: 5,
            lengthChange: true,
            info: false,
            responsive: false,
            ordering: false,
            searching: true,               
        });
    });
</script>
@endpush
@endsection