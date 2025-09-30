@extends('layout')
@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
    }

    .utama {
        background: url('storage/utama.jpg') center/cover no-repeat;
        color: white;
        padding: 100px 20px;
        text-align: center;
        min-height: 65vh;
        box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.5);
    }

    .utama h1 {
        font-size: 3rem;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
    }

    .section-title {
        text-decoration: none;
        text-align: center;
        margin: 50px 0 30px;
        font-weight: bold;
        color: #333;
    }

    .section-title a {
        text-decoration: none;

    }

    .stat-card {
        border: none;
        color: white;
        transition: transform 0.3s ease;
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

<section class="utama">
    <div class="container">
        <h1>Selamat Datang di Sekolah</h1>
        <p>Mendidik generasi cerdas, kreatif, dan berkarakter.</p>
    </div>
</section>

{{-- PROFIL SEKOLAH DAN JUMLAH GURU, MURID --}}
<section class="container my-5">
    <h2 class="section-title"><a href="{{ route('info') }}" class="text-dark">Profil Sekolah</a></h2>
    <div class="row align-items-center">
        {{-- profil sekolah --}}
        <div class="col-md-6 d-flex align-items-center">
            <a href="{{ route('info') }}">
                <img src="{{ asset('assets/image/logo_sekolah.png') }}" alt="Logo Sekolah" class="me-3 rounded-circle" width="80" height="80">
            </a>
            <p class="mb-0">
                SMPN 02 Gunungputri adalah sekolah unggulan yang berkomitmen mencetak generasi berprestasi, disiplin tinggi, dan berkarakter.
                Dengan fasilitas memadai serta tenaga pendidik profesional, kami mendukung siswa dalam meraih potensi terbaiknya.
            </p>
        </div>

        {{-- jumlah guru dan murid --}}
        <div class="col-md-6">
            <div class="row g-4">
                <div class="col-md-6 box-siswa">
                    <div class="card stat-card p-3 text-center">
                        <i class="fa-solid fa-graduation-cap" style="font-size: 40px"></i>
                        <h5>Jumlah Siswa</h5>
                        <p class="stat-number">{{ $siswa->count() }}</p>
                    </div>
                </div>
                <div class="col-md-6 box-guru">
                    <div class="card stat-card p-3 text-center">
                        <i class="fa-solid fa-person-chalkboard"  style="font-size: 40px"></i>
                        <h5>Jumlah Guru</h5>
                        <p class="stat-number">{{ $guru->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- EKSKUL --}}
<section class="ekskul">
    <h2 class="section-title"><a href="{{ route('info') }}" class="text-dark">Ekstrakurikuler</a></h2>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('assets/image/ekskul/pramuka.webp') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Pramuka</h5>
                        <p class="card-text">Kegiatan pramuka melatih kepemimpinan, kerja tim, dan keterampilan luar ruangan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('assets/image/ekskul/pmr.png') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">PMR</h5>
                        <p class="card-text">Ekskul futsal meningkatkan Pengetahuan, disiplin, dan kesehatan jasmani.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('assets/image/ekskul/paskib.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Paskibra</h5>
                        <p class="card-text">Ekskul paskibra melatih kedisiplinan, koordinasi, dan keterampilan baris-berbaris.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        {{-- BERITA --}}  
    <section class="berita">
    <h2 class="section-title">
        <a href="{{ route('berita') }}" class="text-dark">Berita Terbaru</a>
    </h2>
    <div class="container">
        <div class="row g-4">
            @foreach ($berita as $item)
            <div class="col-md-4 d-flex">
                <div class="card shadow-sm mb-3 flex-fill h-100">
                    {{-- Gambar --}}
                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                         class="card-img-top" 
                         style="height: 200px; object-fit: cover;">

                    {{-- Isi Card --}}
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate" style="max-width: 100%;">
                            {{ $item->judul }}
                        </h5>
                        <p class="card-text flex-grow-1" style="font-size: 14px; text-align: justify;">
                            {{ Str::limit($item->isi, 135) }}
                        </p>
                        <a href="{{ route('berita') }}" class="btn btn-primary mt-auto w-100">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
