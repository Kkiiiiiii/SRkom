@extends('admin.layout')
@section('content')
    <section class="container my-5">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
            <h3 class="mb-0">Data Profil Sekolah</h3>
            <a class="btn btn-success" href="{{ route('admin.profilSek-create') }}">
                <i class="bi bi-plus-circle me-1"></i> Tambah Profil
            </a>
        </div>
        <hr>

        {{-- Alert Success --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Alert Error --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($ps as $item)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top"
                                style="height: 180px; object-fit: cover;" alt="Foto Sekolah">
                        @endif

                        <div class="card-body">
                            {{-- Logo --}}
                            @if ($item->logo)
                                <div class="text-center mb-2">
                                    <img src="{{ asset('storage/' . $item->logo) }}" width="60" height="60" class="rounded-circle"
                                        alt="Logo Sekolah">
                                </div>
                            @endif

                            <h5 class="card-title text-center">{{ $item->nama_sekolah }}</h5>
                            <p class="mb-1"><strong>Kepala Sekolah:</strong> {{ $item->kepala_sekolah }}</p>
                            <p class="mb-1"><strong>NPSN:</strong> {{ $item->npsn }}</p>
                            <p class="mb-1"><strong>Alamat:</strong> {{ $item->alamat }}</p>
                            <p class="mb-1"><strong>Kontak:</strong> {{ $item->kontak }}</p>
                            <p class="mb-1"><strong>Tahun Berdiri:</strong> {{ $item->tahun_berdiri }}</p>
                            <p class="mb-1"><strong>Visi & Misi:</strong><br> {{ Str::limit($item->visi_misi, 100) }}</p>
                            <p class="mb-0"><strong>Deskripsi:</strong><br> {{ Str::limit($item->deskripsi, 100) }}</p>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('admin.profilSek-edit', Crypt::encrypt($item->id_profil)) }}"
                                class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="{{ route('admin.profilSek-delete', Crypt::encrypt($item->id_profil)) }}"
                                onclick="return confirm('Yakin data profil Sekolah ini dihapus?')"
                                class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

    {{-- Optional styling --}}
    <style>
        .card-body p {
            font-size: 0.9rem;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
    </style>

@endsection