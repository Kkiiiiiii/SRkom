@extends('layout')
@section('content')

<style>
    details summary {
        cursor: pointer;
        color: #0d6efd; /* bootstrap primary color */
        font-weight: 600;
        list-style: none;
    }

    details summary::-webkit-details-marker {
        display: none;
    }

    details p {
        margin-top: 0.75rem;
        text-align: justify;
    }
</style>

<div class="container my-5">
    <h3 class="mb-4 fw-medium">Daftar Berita</h3>
    <hr>
    <div class="row g-4">
        @foreach ($berita as $item)
        <div class="col-md-4 d-flex">
            <div class="card shadow-sm w-100">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text text-muted mb-2" style="font-size: 0.9rem;">
                        Diposting oleh: {{ $item->user->name ?? 'Admin' }} pada {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </p>
                    <details>
                        <summary>Lihat Selengkapnya</summary>
                        <p>{{ Str::limit($item->isi, 200) }}</p>
                    </details>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
