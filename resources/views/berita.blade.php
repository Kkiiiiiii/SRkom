@extends('layout')
@section('content')
<style>
    .card-footer .penulis{
        font-weight: bold;
    }
</style>
<div class="container my-5">
    <h3>Daftar Berita</h3>
    <div class="row">
        @foreach ($berita as $item)
        <div class="col-md-4">
            <div class="card shadow-sm mb-3">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text"><small class="text-muted">Diposting oleh: {{ $item->user ? $item->user->name : 'Unknown' }} pada {{ \Carbon\Carbon::parse($item->tanggal)}}</small></p>
                         <details>
                                <summary style="cursor: pointer; color: #007BFF;">Lihat Selengkapnya</summary>
                                <p class="card-text" style="text-align: justify">{{ Str::limit($item->isi, 200) }}</p>           
                    </details>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
