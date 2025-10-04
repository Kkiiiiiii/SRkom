<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sekolah</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6F9496, #ffffff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #6F9496;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-title {
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .form-label {
            color: #ddd;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.8);
        }

        .school-logo {
            display: block;
            margin: 0 auto 15px auto;
            width: 80px;
            height: 80px;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 20px;
            }

            .school-logo {
                width: 70px;
                height: 70px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card mx-auto">
            {{-- Notifikasi Error --}}
            @if (session('error'))
                <div class="alert alert-danger text-center" id="error">
                    {{ session('error') }}
                </div>
            @endif

            <img src="{{ asset('assets/image/logo_sekolah.png') }}" class="rounded-circle img-thumbnail school-logo" alt="Logo Sekolah">
            <h3 class="login-title">SMPN 02 GunungPutri</h3>
            
            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success text-white fw-bold">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script>
        setTimeout(function () {
            const alert = document.getElementById('error');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease'; // animasi ease
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 500); // untuk menghapus elemen alert dari dom setelah 0,5 deetik
            }
        }, 3000);
    </script>
</body>
</html>
