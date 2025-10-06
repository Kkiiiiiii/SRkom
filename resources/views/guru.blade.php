@extends('layout')
@section('content')
<div class="container my-5">
    <h3 class="mb-4 fw-medium">Daftar Guru</h3>
    <hr>
    @if ($guru->count() > 0)
    <div class="row g-4">
        @foreach ($guru as $item)
        <div class="col-md-4 d-flex">
            <div class="card shadow-sm w-100">
                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->nama_guru }}</h5>
                    <p class="card-text text-muted mb-2">{{ $item->nip }}</p>
                    <p class="card-text text-muted mb-2">{{ $item->mapel }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
      @else
        <div class="alert alert-warning text-center mt-4" role="alert">
            Belum ada data guru yang diinput.
        </div>
    @endif
</div>
@endsection
