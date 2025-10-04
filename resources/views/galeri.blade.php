@extends('layout')
@section('content')
<section class="my-5 container">
    <h3 class="mb-4 fw-medium">Daftar Galeri</h3>
    <hr>
@if ($galeri->count() > 0)
    <div class="container">
        <div class="row g-4">
            @foreach ($galeri as $item)
                @php
                    $ext = strtolower(pathinfo($item->file, PATHINFO_EXTENSION));
                    $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
                    $isVideo = in_array($ext, ['mp4', 'mov', 'avi', 'mkv']);
                @endphp

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        {{-- Media --}}
                        @if($isImage)
                            <img src="{{ asset('storage/' . $item->file) }}" class="card-img-top" alt="{{ $item->judul ?? 'Galeri' }}" style="height: 180px; object-fit: cover;">
                        @elseif($isVideo)
                            <video class="card-img-top" controls style="height: 180px; object-fit: cover;">
                                <source src="{{ asset('storage/' . $item->file) }}" type="video/{{ $ext }}">
                                Browser tidak mendukung video.
                            </video>
                        @endif

                        {{-- Konten --}}
                        <div class="card-body p-3 d-flex flex-column">
                            <h6 class="card-title text-center">{{ $item->judul ?? '-' }}</h6>
                            <p class="text-muted text-center mb-1"><small>{{ $item->kategori }}</small></p>
                            <p class="text-muted text-center mb-2"><small>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small></p>

                            @if($item->keterangan)
                                <details>
                                    <summary style="cursor: pointer; color: #007BFF;">Keterangan</summary>
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
    </div>
      @else
            <div class="alert alert-warning text-center mt-4" role="alert">
                Belum ada Galeri yang diinput.
            </div>
    @endif
    </section>
@endsection
