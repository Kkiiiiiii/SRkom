@extends('layout')
@section('content')
<section class="galeri my-5">
    <h2 class="section-title text-center">Galeri Foto</h2>
    <div class="container">
        <div style="overflow-x:auto; white-space: nowrap; padding-bottom: 10px;">
            @foreach ($galeri as $item)
            <div style="display: inline-block; width: 250px; margin-right: 15px; vertical-align: top;">
                <div class="card border-0 shadow-sm">
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->file ?? 'Galeri Foto'}}" style="height: 180px; object-fit: cover;">
                    @if($item->judul)
                    <div class="card-body p-2 text-center">
                        <small>{{ $item->judul }}</small>
                    </div>
                    <p class="card-text px-2">{{ $item->keterangan }}</p>
                    <p class="card-text px-2"><small>{{ $item->kategori }}</small></p>
                    <p class="card-text px-2"><small>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small></p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection