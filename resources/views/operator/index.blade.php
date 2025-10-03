    @extends('operator.layout')
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

        .box-berita .card {
            background: linear-gradient(135deg, #42a5f5, #66bb6a);
        }

        .box-ekskul .card {
            background: linear-gradient(135deg, #ff7043, #f44336);
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


    <h3 class="mt-4">Dashboard Operator</h3>
    <hr>
    <section class="container pb-5 mt-5">
        <div class="row g-4">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="box-siswa">
                    <div class="card stat-card p-3 text-center">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <h5>Jumlah Siswa</h5>
                        <p class="stat-number">{{ $siswa->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="box-berita">
                    <div class="card stat-card p-3 text-center">
                        <i class="fa-solid fa-newspaper"></i>
                        <h5>Jumlah Berita</h5>
                        <p class="stat-number">{{ $berita->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="box-galeri">
                    <div class="card stat-card p-3 text-center">
                        <i class="fa-solid fa-photo-film"></i>
                        <h5>Jumlah Galeri</h5>
                        <p class="stat-number">{{ $galeri->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="box-ekskul">
                    <div class="card stat-card p-3 text-center">
                        <i class="fa-solid fa-sitemap"></i>
                        <h5>Jumlah Ekstrakurikuler</h5>
                        <p class="stat-number">{{ $ekskul->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Aksi Cepat --}}
        <div class="mt-5">
            <h5 class="text-center">Aksi Cepat</h5>
            <div class="d-flex flex-wrap gap-3 mt-3 justify-content-center">
                <a href="{{ route('operator.siswa') }}" class="btn btn-success">
                    <i class="fa-solid fa-user-graduate"></i> Tambah Siswa
                </a>
                <a href="{{ route('operator.berita-create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-newspaper"></i> Buat Berita
                </a>
                <a href="{{ route('operator.galeri') }}" class="btn btn-info text-white">
                    <i class="fa-solid fa-image"></i> Upload Galeri
                </a>
                <a href="{{ route('operator.ekskul-create') }}" class="btn btn-danger">
                    <i class="fa-solid fa-sitemap"></i> Tambah Ekskul
                </a>
                <a href="{{ route('operator.profil-create') }}" class="btn btn-warning text-white">
                    <i class="fa-solid fa-school"></i> Tambah Info Sekolah
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