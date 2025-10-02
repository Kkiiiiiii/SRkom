@extends('layout')

@section('content')
    <div class="container my-5">
        <h3 class="mb-4 fw-bold">Daftar Ekstrakurikuler</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($ekskul as $item)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama_ekskul }}" style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_ekskul }}</h5>
                            <p class="card-text mb-1"><strong>Pembina:</strong> {{ $item->pembina }}</p>
                            <p class="card-text mb-2"><strong>Jadwal:</strong> {{ $item->jadwal_latihan }}</p>
                            <details>
                                <summary style="cursor: pointer; color: #007BFF;">Lihat deskripsi</summary>
                                <p class="mt-2" style="text-align: justify;">
                                    {{ $item->deskripsi }}
                                </p>
                            </details>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
