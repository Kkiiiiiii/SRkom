@extends('layout')
@section('content')
<section>
    <div class="container mt-5">
           <h2 class="mb-4 fw-medium">Profil Sekolah</h2>
         <hr>
        @foreach ($ps as $item)
        <table class="table table-borderless align-middle table-striped">
            <tbody>
                <tr>
                    <th class="text-start">Nama Sekolah</th>
                    <td class="text-end">{{ $item->nama_sekolah }}</td>
                </tr>
                <tr>
                    <th class="text-start">Kepala Sekolah</th>
                    <td class="text-end">{{ $item->kepala_sekolah }}</td>
                </tr>
                <tr>
                    <th class="text-start">Foto Sekolah</th>
                    <td class="text-end">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" 
                                 class="img-fluid rounded shadow-sm"
                                 width="120" alt="Foto Sekolah">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Logo Sekolah</th>
                    <td class="text-end">
                        @if ($item->logo)
                            <img src="{{ asset('storage/' . $item->logo) }}" 
                                 class="rounded-circle shadow-sm"
                                 width="80" alt="Logo Sekolah">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="text-start">NPSN</th>
                    <td class="text-end">{{ $item->npsn }}</td>
                </tr>
                <tr>
                    <th class="text-start">Alamat</th>
                    <td class="text-end">{{ $item->alamat }}</td>
                </tr>
                <tr>
                    <th class="text-start">Kontak</th>
                    <td class="text-end">{{ $item->kontak }}</td>
                </tr>
                <tr>
                    <th class="text-start">Visi Misi</th>
                    <td class="text-end">{{ $item->visi_misi }}</td>
                </tr>
                <tr>
                    <th class="text-start">Tahun Berdiri</th>
                    <td class="text-end">{{ $item->tahun_berdiri }}</td>
                </tr>
                <tr>
                    <th class="text-start">Deskripsi</th>
                    <td class="text-end long-text">{{ $item->deskripsi }}</td>
                </tr>
            </tbody>
        </table>
        @endforeach
    </div>
</section>
@endsection
