<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 02 Gunungputri - Web</title>

    {{-- CSS Bootstrap & Font --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        /* Logo & teks sekolah */
        .navbar-brand img {
            margin-right: 10px;
        }

        .navbar {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        /* Navbar container untuk pisahkan logo di kiri dan menu di kanan */
        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Menu otomatis ke kanan di desktop */
        .navbar-collapse {
            justify-content: flex-end;
        }

        /* Responsif di HP */
        @media (max-width: 991px) {
            .navbar-collapse {
                justify-content: flex-start;
            }
        }

        .img-thumbnail {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-h shadow-sm sticky-top">
        <div class="container">
            <!-- Logo kiri -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('assets/image/logo_sekolah.png') }}" alt="Logo" width="45" height="45"
                    class="rounded-circle img-thumbnail">
                <span class="ms-2 fw-semibold">SMPN 02 Gunungputri</span>
            </a>

            <!-- Toggler (Tombol Navbar) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu kanan -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}"
                            href="{{ route('beranda') }}"><i class="fas fa-home me-1"></i>Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('guru', 'info') ? 'active' : '' }}"
                            href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil Sekolah
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('info') ? 'active' : '' }}"
                                    href="{{ route('info') }}"><i class="fa-solid fa-school me-1"></i>Profil Umum</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('guru') ? 'active' : '' }}"
                                    href="{{ route('guru') }}"><i class="fa-solid fa-user-tie me-1"></i>Staff
                                    Pengajar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}"
                            href="{{ route('berita') }}"><i class="fas fa-newspaper me-1"></i>Berita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('foto', 'video') ? 'active' : '' }}"
                            href="#" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Galeri Sekolah
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="galeriDropdown">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('foto') ? 'active' : '' }}"
                                    href="{{ route('foto') }}">
                                    <i class="fa-solid fa-panorama me-1"></i>Foto
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('video') ? 'active' : '' }}"
                                    href="{{ route('video') }}">
                                    <i class="fa-solid fa-video me-1"></i>Video
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ekskul') ? 'active' : '' }}"
                            href="{{ route('ekskul') }}"><i class="fa-solid fa-users me-1"></i>Ekstrakurikuler</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Dinamis -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('footer')

    <!-- Script -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>
</html>

