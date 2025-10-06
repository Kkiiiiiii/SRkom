@extends('layout')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Galeri Foto</h1>

    @if ($foto->count())
        <div class="row g-4">
            @foreach ($foto as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        {{-- Media --}}
                        <img src="{{ asset('storage/' . $item->file) }}" class="card-img-top"
                            alt="{{ $item->judul ?? 'Galeri' }}" style="height: 180px; object-fit: cover;">

                        {{-- Konten --}}
                        <div class="card-body p-3 d-flex flex-column">
                            <h6 class="card-title text-center">{{ $item->judul ?? '-' }}</h6>
                            <p class="text-muted text-center mb-1">
                                <small>{{ $item->kategori }}</small>
                            </p>
                            <p class="text-muted text-center mb-2">
                                <small>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>
                            </p>

                            @if ($item->keterangan)
                                <details open>
                                    <summary>Keterangan</summary>
                                    <div style="max-height: 100px; overflow-y: auto; margin-top: 5px; text-align: justify;">
                                        <small>{{ $item->keterangan }}</small>
                                    </div>
                                </details>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Belum ada foto yang tersedia.</p>
    @endif
</div>
@endsection
