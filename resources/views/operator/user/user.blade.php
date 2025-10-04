@extends('operator.layout')
@section('content')
    <section class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Data Users</h3>
                <a class="btn btn-success" href="{{ route('admin.User-create') }}"><i class="bi bi-plus-circle"></i> Tambah Data User</a>
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
                    <td>{{ $item->role }}</td>
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