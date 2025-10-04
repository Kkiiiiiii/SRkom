@extends('admin.layout')
@section('content')
<section class="container my-5">
    <h3>Edit User</h3>
    <hr>
    <form action="{{ route('admin.User-update', Crypt::encrypt($user->id)) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" value="{{ $user->username }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (isi jika ingin ganti)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator</option>
            </select>
        </div>

        <a href="{{ route('admin.User') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</section>
@endsection
