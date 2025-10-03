@extends('admin.layout')

@section('content')
<style>
    .stat-card {
        border: none;
        color: white;
        transition: transform 0.3s ease;
        width: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .box-siswa .card {
        background: linear-gradient(135deg, #81c784, #4caf50);
    }

    .box-guru .card {
        background: linear-gradient(135deg, #ffb300, #fb8c00);
    }

    .box-berita .card {
        background: linear-gradient(135deg, #42a5f5, #66bb6a);
    }

    .box-ekskul .card {
        background: linear-gradient(135deg, #ff7043, #f44336);
    }

    .box-user .card {
        background: linear-gradient(135deg, #0a0e71, #4f84d3);
    }

    .box-galeri .card {
        background: linear-gradient(135deg, #5c6bc0, #42a5f5);
    }

    .stat-card i {
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    .stat-number {
        font-size: 1.8rem;
        font-weight: bold;
        margin: 0;
    }
</style>
    {{-- Untuk Memberi pesan Ketika Login berhasil --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert" id="success">
            {{ session('success') }}
        </div>
    @endif

<h3 class="mt-4">Dashboard Admin</h3>
<hr>

<section class="container pb-5 mt-5">

    <div class="row g-4">
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="box-siswa">
                <div class="card stat-card p-3 text-center">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h5>Jumlah Siswa</h5>
                    <p class="stat-number">{{ $siswa->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="box-guru">
                <div class="card stat-card p-3 text-center">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <h5>Jumlah Guru</h5>
                    <p class="stat-number">{{ $guru->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="box-berita">
                <div class="card stat-card p-3 text-center">
                    <i class="fa-solid fa-newspaper"></i>
                    <h5>Jumlah Berita</h5>
                    <p class="stat-number">{{ $berita->count() }}</p>  
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="box-galeri">
                <div class="card stat-card p-3 text-center">
                    <i class="fa-solid fa-photo-film"></i>
                    <h5>Jumlah Galeri</h5>
                    <p class="stat-number">{{ $galeri->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="box-ekskul">
                <div class="card stat-card p-3 text-center">
                    <i class="fa-solid fa-sitemap"></i>
                    <h5>Jumlah Ekskul</h5>
                    <p class="stat-number">{{ $ekskul->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="box-user">
                <div class="card stat-card p-3 text-center">
                    <i class="fa-solid fa-user"></i>
                    <h5>Jumlah User</h5>
                    <p class="stat-number">{{ $user->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Aksi Cepat --}}
    <div class="mt-5">
        <h5 class="text-center">Aksi Cepat</h5>
        <div class="d-flex flex-wrap gap-3 mt-3 justify-content-center">
            <a href="{{ route('admin.Guru-create') }}" class="btn btn-outline-warning">
                <i class="fa-solid fa-user-plus"></i> Tambah Guru
            </a>
            <a href="{{ route('admin.Siswa-create') }}" class="btn btn-outline-success">
                <i class="fa-solid fa-user-graduate"></i> Tambah Siswa
            </a>
            <a href="{{ route('admin.Berita-create') }}" class="btn btn-outline-primary">
                <i class="fa-solid fa-newspaper"></i> Buat Berita
            </a>
            <a href="{{ route('admin.Galeri') }}" class="btn btn-outline-info">
                <i class="fa-solid fa-image"></i> Upload Galeri
            </a>
            <a href="{{ route('admin.ekskul.create') }}" class="btn btn-outline-danger">
                <i class="fa-solid fa-sitemap"></i> Tambah Ekskul
            </a>
            <a href="{{ route('admin.User-create') }}" class="btn btn-outline-secondary">
                <i class="fa-solid fa-circle-user"></i> Tambah User
            </a>
        </div>
    </div>
</section>
<script>
    function autoDismissAlert(id) {
        const alert = document.getElementById(id);
        if (alert) {
            setTimeout(() => {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500);
            }, 3000); // 3 detik
        }
    }

    autoDismissAlert('success');
</script>
@endsection
