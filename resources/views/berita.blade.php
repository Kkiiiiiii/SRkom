@extends('layout')

@section('content')
<div class="container my-5">
    <h3>Daftar Berita</h3>
    <div class="row">
        @foreach ($berita as $item)
        <div class="col-md-4">
            <div class="card shadow-sm mb-3">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text">{{ Str::limit($item->isi, 100) }}</p>
                    <a href="" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
