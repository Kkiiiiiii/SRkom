@extends('layout')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    .utama {
        background: url('storage/utama.jpg') center/cover no-repeat;
        color: white;
        padding: 100px 20px;
        text-align: center;
        min-height: 65vh;
        box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .utama h1 {
        font-size: 3rem;
        font-weight: 700;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        margin-bottom: 0.5rem;
    }

    .utama p {
        font-size: 1.2rem;
        font-weight: 400;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
    }

    .section-title {
        text-align: center;
        margin: 50px 0 30px;
        font-weight: 700;
        font-size: 1.8rem;
        color: #222;
    }

    .section-title a {
        text-decoration: none;
        color: inherit;
        transition: color 0.3s ease;
    }

    .section-title a:hover {
        color: #4caf50;
        text-decoration: underline;
    }

    .stat-card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        color: white;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 30px 15px;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .box-siswa .stat-card {
        background: linear-gradient(135deg, #81c784, #4caf50);
    }

    .box-guru .stat-card {
        background: linear-gradient(135deg, #ffb300, #fb8c00);
    }

    .stat-card i {
        font-size: 3rem;
        margin-bottom: 15px;
    }

    .stat-number {
        font-size: 2.2rem;
        font-weight: 700;
        margin: 0;
    }

    .card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .card-img-top {
        object-fit: cover;
        height: 200px;
        width: 100%;
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 20px;
        color: #333;
    }

    .card-title {
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 12px;
    }

    .card-text {
        font-size: 1rem;
        line-height: 1.5;
        color: #555;
    }

    .btn-info {
        background-color: #6F9496;
        border-color: #40585a;
        transition: background-color 0.3s ease;
    }

        /* .btn-info:hover {
            background-color: #;
            border-color: #388e3c;
        } */

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        width: 45px;
        height: 45px;
        background-size: 20px 20px;
    }

    @media (max-width: 768px) {
        .card-img-top {
            height: 150px !important;
        }

        .utama h1 {
            font-size: 2rem;
        }

        .utama p {
            font-size: 1rem;
        }

        .stat-card i {
            font-size: 2rem;
        }

        .stat-number {
            font-size: 1.6rem;
        }
    }
</style>

<section class="utama">
    <div class="container">
        <h1>Selamat Datang di SMP</h1>
        <p>Mendidik generasi cerdas, kreatif, dan berkarakter.</p>
    </div>
</section>

{{-- PROFIL SEKOLAH --}}
<section class="container my-5">
    <h2 class="section-title"><a href="{{ route('info') }}">Profil Sekolah</a></h2>
    <div class="row align-items-center">
        <div class="col-md-6 d-flex align-items-center">
            <a href="{{ route('info') }}">
                <img src="{{ asset('assets/image/logo_sekolah.png') }}" alt="Logo Sekolah" class="me-3 rounded-circle" width="80" height="80">
            </a>
            <p class="mb-0 ms-3">
                SMPN 02 Gunungputri adalah sekolah unggulan yang berkomitmen mencetak generasi berprestasi, disiplin tinggi, dan berkarakter.
                Dengan fasilitas memadai serta tenaga pendidik profesional, kami mendukung siswa dalam meraih potensi terbaiknya.
            </p>
        </div>
    </div>
</section>

{{-- JUMLAH SISWA / GURU --}}
<section class="jumlah my-5 py-5 bg-h">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5 box-siswa mb-4 mb-md-0">
                <div class="stat-card p-4">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h5>Jumlah Siswa</h5>
                    <p class="stat-number">{{ $siswa->count() }}</p>
                </div>
            </div>
            <div class="col-md-5 box-guru">
                <div class="stat-card p-4">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <h5>Jumlah Guru</h5>
                    <p class="stat-number">{{ $guru->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- EKSTRAKURIKULER --}}
<section class="ekskul my-5 py-5">
    <h2 class="section-title"><a href="{{ route('ekskul') }}">Ekstrakurikuler</a></h2>
    <div class="container">
        <div class="row g-4">
            @foreach ($ekskul as $ekskul)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100 border-0">
                        <img src="{{ asset('storage/'.$ekskul->gambar) }}" class="card-img-top rounded-top" alt="{{ $ekskul->nama_ekskul }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $ekskul->nama_ekskul }}</h5>
                            <p class="card-text flex-grow-1">{{ $ekskul->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
<section class="berita my-5 bg-h py-5">
    <h2 class="section-title text-white"><a href="{{ route('berita') }}">Berita Terbaru</a></h2>
    <div class="container">
        <div id="beritaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach ($berita->chunk(3) as $chunkIndex => $beritaChunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($beritaChunk as $item)
                                <div class="col-md-4">
                                    <div class="card h-100 shadow-sm">
                                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $item->judul }}</h5>
                                            <p class="card-text text-justify">
                                                {{ Str::limit($item->isi, 150) }}
                                            </p>
                                            <p class="card-text mt-auto">
                                                <small class="text-muted">
                                                    Diposkan oleh: {{ $item->user ? $item->user->name : 'Unknown' }} pada {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                                </small>
                                            </p>
                                            <a href="{{ route('berita') }}" class="btn btn-info mt-2 align-self-start text-white">Baca Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#beritaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#beritaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>

{{-- STAFF PENGAJAR --}}
<section class="staff-pengajar my-5 py-5">
    <h2 class="section-title"><a href="#">Staff Pengajar</a></h2>
    <div class="container">
        <div id="guru" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach ($guru->chunk(3) as $chunkIndex => $guruChunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($guruChunk as $item)
                                <div class="col-md-4">
                                    <div class="card h-100 shadow-sm">
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" style="height: 400px; object-fit: cover;" alt="{{ $item->nama_guru }}">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $item->nama_guru }}</h5>
                                            <p class="card-text">{{ $item->nip }}</p>
                                            <p class="card-text">{{ $item->mapel }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#guru" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#guru" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>
@endsection
