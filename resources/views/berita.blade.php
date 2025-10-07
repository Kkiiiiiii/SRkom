@extends('layout')
@section('content')
    <div class="container my-5">
        <h3 class="mb-4 fw-medium">Daftar Berita</h3>
        <hr>
        @if ($berita->count() > 0)
            <div class="row g-4">
                @foreach ($berita as $item)
                    <div class="col-md-4 d-flex">
                        <div class="card shadow-sm w-100">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="card-img-top"
                                style="height: 300px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text text-muted mb-2" style="font-size: 0.9rem;">
                                    Diposting oleh: {{ $item->user->username ?? 'Unknown' }} pada
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </p>
                                <a href="{{ route('detail-berita', ['id' => Crypt::encrypt($item->id_berita)]) }}"
                                    class="btn btn-primary mt-2 align-self-start text-white">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning text-center mt-4" role="alert">
                Belum ada Berita yang diinput.
            </div>
        @endif
    </div>
@endsection
