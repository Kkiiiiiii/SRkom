<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
</head>
<style>
    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
    }

    .sidebar a.active {
        background-color: #6F9496;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: #40585a;
        color: white;
    }

    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }

    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .sidebar a {
            float: left;
        }

        div.content {
            margin-left: 0;
        }
    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style>

<body>
    <div class="sidebar">
        <div class="d-flex">
            <img src="{{ asset('assets/image/logo_sekolah.png') }}" width="50" height="50" class="rounded-circle my-3 ms-2">
            <h5 class="mt-4  ms-2">SMPN 02</h5>
        </div>
        <a  href="{{ route('admin.dash')}}" class="{{ request()->routeIs('admin.dash') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.profilSek') }}" class="{{ request()->routeIs('admin.profilSek') ? 'active' : '' }}">Profil Sekolah</a>
        <a href="{{ route('admin.Berita') }}" class="{{ request()->routeIs('admin.Berita') ? 'active' : '' }}">Berita</a>
        <a href="{{ route('admin.Galeri') }}"class="{{ request()->routeIs('admin.Galeri') ? 'active' : '' }}">Galeri</a>
        <a href="{{ route('admin.Ekskul') }}"class="{{ request()->routeIs('admin.Ekskul') ? 'active' : '' }}">Ekstrakurikuler</a>
        <hr>
        <a href="{{ route('admin.User') }}" class="{{ request()->routeIs('admin.User') ? 'active' : '' }}">Users</a>
        <a href="{{ route('admin.Guru') }}" class="{{ request()->routeIs('admin.Guru') ? 'active' : '' }}">Guru</a>
        <a href="{{ route('admin.Siswa') }}" class="{{ request()->routeIs('admin.Siswa') ? 'active' : '' }}">Siswa</a>
        <hr>
        <li class="nav-item">
            <a class="nav-link" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </div>

    <div class="content">
        @yield('content')
    </div>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>
