@extends('operator.layout')
@section('content')
<style>
     table#user thead th {
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
            <h3>Data Users</h3>
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
            <table class="table table-bordered table-striped text-center align-middle" id="user">
                <thead class="table-dark">
                    <tr>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td><span class="circle-bg">{{ $item->role }}</span></td>
                </tr>
                @endforeach
                </tbody>
        </div>
    </section>
    {{-- Mengambil script dari layout --}}
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
@endpush
@endsection
