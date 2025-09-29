@extends('layout')
@section('content')
<section>
    <style>

    </style>
    <div class="container mt-5">
        <table class="table table-borderless">
            <thead class="table-light">
                <tr class="table-secondary text-dark">
                    <th class="text-start" style="text-align: left;">No</th>
                    <th class="text-start" style="text-align: left;">Nama Sekolah</th>
                    <th class="text-start" style="text-align: left;">Kepala Sekolah</th>
                    <th class="text-start" style="text-align: left;">Foto Sekolah</th>
                    <th class="text-start" style="text-align: left;">Logo Sekolah</th>
                    <th class="text-start" style="text-align: left;">NPSN</th>
                    <th class="text-start" style="text-align: left;">Alamat</th>
                    <th class="text-start" style="text-align: left;">Kontak</th>
                    <th class="text-start" style="text-align: left;">Visi Misi</th>
                    <th class="text-start" style="text-align: left;">Tahun Berdiri</th>
                    <th class="text-start" style="text-align: left;">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ps as $item)
                <tr>
                       <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_sekolah }}</td>
                            <td>{{ $item->kepala_sekolah }}</td>
                            <td>
                                @if ($item->foto)
                                    <img src="{{ asset('uploads/' . $item->foto) }}" class="img-fluid"
                                        width="60" height="60" alt="Foto Sekolah">
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->logo)
                                    <img src="{{ asset('uploads/' . $item->logo) }}" class="rounded-circle"
                                        width="60" height="60" alt="Logo Sekolah">
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>{{ $item->npsn }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->kontak }}</td>
                            <td>{{ $item->visi_misi }}</td>
                            <td>{{ $item->tahun_berdiri }}</td>
                            <td class="long-text">{{ $item->deskripsi }}</td>
                </tr>
            </tbody>
                @endforeach
        </table>
    </div>
</section>
@endsection