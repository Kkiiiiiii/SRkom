@extends('layout')
@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0 ">
        <div class="row g-0 align-items-center">
            <!-- Gambar Kiri -->
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                     class="img-fluid rounded-start w-00 h-100 object-fit-cover"
                     alt="{{ $berita->judul }}">
            </div>

            <!-- Teks Kanan -->
            <div class="col-md-7">
                <div class="card-body p-4">
                    <h2 class="card-title mb-3">{{ $berita->judul }}</h2>
                    <p class="text-muted mb-3">
                        Diposting oleh
                        <strong>{{ $berita->user->username ?? 'Unknown' }}</strong>
                        pada {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                    </p>
                    <p class="card-text text-justify" style="line-height: 1.8;">
                        {{ $berita->isi }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
