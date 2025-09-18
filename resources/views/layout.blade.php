    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-h">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/logo.webp') }}" alt="Logo" width="50" height="50" class="rounded-circle">
                    Sekolah
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('beranda') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('info') }}">Info Sekolah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('berita') }}">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('galeri') }}">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('ekskul') }}">Ekstrakurikuler</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
        
        @include('footer')
    <script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/fontawesome/js/all.min.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('.nav-link').on('click', function() {
                    $('.nav-link').removeClass('active');
                    $(this).addClass('active');
                });
            });
        </script>
    </body>
    </html>