@extends('layout')
@section('content')
    <style>
        table#siswa thead th {
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
    <div class="container my-5">
        <h3 class="mb-4 fw-medium">Daftar Siswa</h3>
        <hr>
        @if ($siswa->count() > 0)
            <div class="table-responsive">
                <table class="table table-md table-secondary text-center align-middle" id="siswa">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Siswa</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td><span class="circle-bg">{{ $item->tahun_masuk }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    @endif
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#user').DataTable({
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
