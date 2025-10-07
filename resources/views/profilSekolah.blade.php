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
                        <img src="{{ asset('assets/image/sj.jpg') }}" alt="Foto Sejarah Sekolah"
                            class="img-fluid rounded shadow-sm w-100" style="max-width: 500px;">
                    </div>
                    <div class="col-md-8">
                        <h5 class="fw-semibold mb-4">Sejarah Sekolah</h5>
                        <p class="text-justify">
                            Sekolah ini didirikan pada tahun 1993 dengan tujuan memberikan pendidikan berkualitas bagi
                            masyarakat sekitar.
                            Pada awal berdirinya, sekolah ini hanya memiliki beberapa ruang kelas dan tenaga pengajar yang
                            terbatas.
                            Namun, dengan semangat dan komitmen yang tinggi, sekolah ini terus berkembang dari tahun ke
                            tahun.
                            Seiring berjalannya waktu, dengan dedikasi dan kerja keras semua pihak, sekolah ini berkembang
                            menjadi
                            salah satu institusi pendidikan unggulan di wilayahnya. Banyak prestasi telah diraih, baik di
                            bidang
                            akademik maupun non-akademik, yang turut mengharumkan nama sekolah di tingkat daerah hingga
                            nasional.
                        </p>
                    </div>
                </div>
            </div>

            @if ($ps->count() > 0)
                {{-- Data Informasi Profil Sekolah --}}
                @foreach ($ps as $item)
                    {{-- Visi & Misi Sekolah --}}
                    <div class="card shadow-sm border-0 my-4">
                        <div class="card-body p-4">
                            <h4 class="text-center text-primary fw-bold mb-4">
                                Visi & Misi
                            </h4>

                            {{-- Visi --}}
                            <div class="mb-4">
                                <h5 class="fw-semibold text-primary border-start border-4 border-primary ps-3 mb-3">
                                    Visi
                                </h5>
                                <p class="text-justify fs-6" style="line-height: 1.8;">
                                    “{{ $item->visi }}”
                                </p>
                            </div>

                            {{-- Misi --}}
                            @if (!empty($item->misi))
                                <div>
                                    <h5 class="fw-semibold text-primary border-start border-4 border-primary ps-3 mb-3">
                                        Misi
                                    </h5>
                                    <div class="text-justify fs-6" style="line-height: 1.8;">
                                        {{-- Kalau misi berisi beberapa poin, otomatis tampil terpisah --}}
                                        @php
                                            $misiList = preg_split("/[\r\n]+/", $item->misi);
                                        @endphp
                                        <ul class="list-group list-group-flush">
                                            @foreach ($misiList as $m)
                                                @if (trim($m) != '')
                                                    <li class="list-group-item border-0 ps-3">
                                                        <i class="bi bi-check-circle text-success me-2"></i>
                                                        {{ $m }}
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- Detail Sekolah --}}
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
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded shadow-sm"
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
                                        <img src="{{ asset('storage/' . $item->logo) }}" class="rounded-circle shadow-sm"
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
            @else
                <div class="alert alert-warning text-center mt-4" role="alert">
                    Belum ada Informasi Profil Sekolah yang diinput.
                </div>
            @endif
        </div>
    </section>
@endsection
