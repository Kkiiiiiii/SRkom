@extends('layout')
@section('content')
    <div class="container my-5">
    <h3>Daftar Ekskul</h3>
    <div class="row">
        @foreach ($ekskul as $item)
        <div class="col-md-4">
            <div class="card shadow-sm mb-3">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_ekskul }}</h5>
                    <p class="card-text" >{{ $item->pembina }}</p>
                    <p class="card-text" >{{ $item->jadwal_latihan }}</p>
                    <p class="card-text" style="text-align: justify">{{ Str::limit($item->deskripsi, 200) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection