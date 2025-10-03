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
        color: #40585a;
        text-decoration: none;
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

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        width: 45px;
        height: 45px;
        background-size: 20px 20px;
    }
    /* Untuk Tampilan Card di section */
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
        <h1>Selamat Datang di SMPN 02 Gunungputri</h1>
        <p>Mendidik generasi cerdas, kreatif, dan berkarakter.</p>
    </div>
</section>

{{-- SAMBUTAN KEPALA SEKOLAH --}}
<section class="py-5 my-5 bg-h">
    <div class="container">
        <h2 class="section-title text-center">Sambutan Kepala Sekolah</h2>
        <div class="row align-items-start mt-4">
            <div class="col-md-3 text-center">
                <a href="{{ route('info') }}" rel="noopener noreferrer">
                    <img src="{{ asset('assets/image/tes.jpeg') }}" alt="Kepala Sekolah" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;"> 
                </a>
                <h6 class="mb-0">Bapak Kosasih Mpd</h6>
                <small>Kepala Sekolah</small>
            </div>
            <div class="col-md-9">
                <p style="text-align: justify">
                    Assalamu’alaikum Warahmatullahi Wabarakatuh,
                </p>
                <p style="text-align: justify">
                    Puji syukur kehadirat Allah SWT atas segala rahmat dan karunia-Nya. Kami mengucapkan selamat datang di website resmi SMPN 02 Gunungputri. Website ini menjadi media informasi dan komunikasi antara sekolah dengan seluruh masyarakat, orang tua, dan siswa.
                </p>
                <p style="text-align: justify">
                    SMPN 02 Gunungputri berkomitmen untuk menciptakan lingkungan belajar yang kondusif, aman, dan menyenangkan. Kami terus berupaya meningkatkan kualitas pendidikan melalui inovasi pembelajaran, peningkatan sarana dan prasarana, serta pengembangan karakter siswa yang berakhlak mulia.
                </p>
                <p style="text-align: justify">
                    Semoga melalui media ini, segala informasi mengenai kegiatan dan perkembangan sekolah dapat diakses dengan mudah dan bermanfaat bagi semua pihak.
                </p>
                <p style="text-align: justify">
                    Terima kasih atas kepercayaan dan dukungannya kepada SMPN 02 Gunungputri.
                </p>
                <p>
                    Wassalamu’alaikum Warahmatullahi Wabarakatuh.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- JUMLAH SISWA / GURU --}}
<section class="jumlah my-5 py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5 box-siswa mb-4 mb-md-0">
                <div class="stat-card p-4">
                    <i class="fa-solid fa-graduation-cap" style="font-size: 50px"></i>
                    <p class="stat-number">{{ $siswa->count() }}</p>
                    <h5>Jumlah Siswa</h5>
                </div>
            </div>
            <div class="col-md-5 box-guru">
                <div class="stat-card p-4">
                    <i class="fa-solid fa-person-chalkboard" style="font-size: 50px"></i>
                    <p class="stat-number">{{ $guru->count() }}</p>
                    <h5>Jumlah Guru</h5>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Ekstrakurikuler --}}
<section class="ekskul my-5 py-5 bg-h">
     <h2 class="section-title"><a href="{{ route('ekskul') }}">Ekstrakurikuler</a></h2>
    <div class="container">
        <div class="row g-4">
            @foreach ($ekskul as $e)
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <a href="{{ route('ekskul') }}" rel="noopener noreferrer">
                            <img src="{{ asset('storage/' . $e->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body text-center">
                            <h6 class="card-title">{{ $e->nama_ekskul }}</h6>
                            <p class="card-text">{{ $e->jadwal_latihan }}</p>
                            <p class="card-text">{{ Str::limit($e->deskripsi, 100) }}</p> 
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Berita Terbaru --}}
<section class="berita my-5 py-5 bg-light">
    <h2 class="section-title"><a href="{{ route('berita') }}">Berita Terbaru</a></h2>
    <div class="container">
        <div class="row g-4">
            @foreach ($berita as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <a href="{{ route('berita') }}" rel="noopener noreferrer">
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text text-justify">{{ Str::limit($item->isi, 150) }}</p>
                            <p class="card-text mt-auto">
                                <small class="text-muted">
                                    Diposkan oleh: {{ $item->user->name ?? 'Unknown' }} pada {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </small>
                            </p>
                            <a href="{{ route('berita') }}" class="btn btn-info mt-2 align-self-start text-white">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Galeri --}}
<section class="py-4 my-4 bg-h">
    <h2 class="section-title"><a href="{{ route('galeri') }}">Galeri Sekolah</a></h2>
    <div class="container">
        <div class="row g-4 justify-content-center">
            @foreach($galeri as $g)
                @php
                    $file = $g->file;
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
                    $isVideo = in_array($ext, ['mp4', 'mov', 'avi', 'mkv']);     
                    // Untuk Mnentukan tipe File Foto Dan Video
                @endphp

                <div class="col-md-3 col-sm-6">
                    <div class="shadow-sm">
                        @if($isImage)
                        {{-- Jika Gambar --}}
                        <a href="{{ route('galeri') }}" rel="noopener noreferrer">
                            <img src="{{ asset('storage/'.$file) }}" loading="lazy" alt="{{ $g->judul }}" class="img-fluid rounded" style="width:100%; height:200px; object-fit:cover;">
                            </a> 
                        @elseif($isVideo)
                        {{-- Jika Video --}}
                            <video controls muted class="w-100 rounded" loading="lazy" style="height:200px; object-fit:cover;">
                                <source src="{{ asset('storage/'.$file) }}" type="video/{{ $ext }}">
                                Browser tidak mendukung video.
                            </video>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Staff Pengajar Carousel --}}
<section class="staff-pengajar my-5 py-4 bg-light">
    <div class="container">
        <h2 class="section-title mb-4 text-center">
            <a href="#" class="text-decoration-none text-dark">Staff Pengajar</a>
        </h2>

        <div id="staffCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">

                @php
                    $perSlide = 4; // Agar Menampilkan 4 Guru per-slide 
                    $totalGuru = $guru->count();
                    $totalSlides = ceil($totalGuru / $perSlide);
                @endphp

                @for ($i = 0; $i < $totalSlides; $i++)
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <div class="row g-3 justify-content-center">
                            @foreach ($guru->slice($i * $perSlide, $perSlide) as $item)
                                <div class="col-6 col-md-3 d-flex">
                        {{-- ketika di tampilan lebih kecil atau di hp akan responsive(Menyesuaikan Tampilan) --}}
                                    <div class="card h-100 w-100 shadow-sm">
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama_guru }}" style="height: 240px; object-fit: cover;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $item->nama_guru }}</h5>
                                            <p class="card-text mb-1">{{ $item->nip }}</p>
                                            <p class="card-text text-muted">{{ $item->mapel }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endfor

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#staffCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#staffCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>
        </div>
    </div>
</section>
@endsection
