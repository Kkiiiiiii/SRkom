@extends('layout')

@section('content')
<section>
    <div class="container mt-5">
        <h2 class="mb-4 fw-medium">Profil Sekolah</h2>
        <hr>

        {{-- Sejarah Sekolah --}}
        <div class="mt-5">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <img src="{{ asset('assets/image/sj.jpg') }}" 
                         alt="Foto Sejarah Sekolah" 
                         class="img-fluid rounded shadow-sm w-100" 
                         style="max-width: 500px;">
                </div>
                <div class="col-md-8">
                    <h5 class="fw-semibold mb-4">Sejarah Sekolah</h5>
                    <p class="text-justify">
                        Sekolah ini didirikan pada tahun 1993 dengan tujuan memberikan pendidikan berkualitas bagi masyarakat sekitar.
                        Pada awal berdirinya, sekolah hanya memiliki 12 ruang kelas dan staff pengajar yang terbatas. Seiring berjalannya waktu, 
                        dengan dedikasi dan kerja keras semua pihak, sekolah ini berkembang menjadi salah satu institusi pendidikan 
                        unggulan di wilayahnya. Banyak prestasi telah diraih, baik di bidang akademik maupun non-akademik, yang turut 
                        mengharumkan nama sekolah di tingkat daerah hingga nasional.
                    </p>
                </div>
            </div>
        </div>

        {{-- Data Profil Sekolah --}}
        @foreach ($ps as $item)
            <table class="table table-borderless align-middle table-striped mt-4">
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
