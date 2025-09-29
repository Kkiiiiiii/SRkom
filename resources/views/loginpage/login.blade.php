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
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #6F9496;
            background-size: cover;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .login-card form,
        .login-card h3 {
            position: relative;
            z-index: 2;
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
    </style>
</head>
<body>

    <div class="login-card">
        <img src="{{ asset('assets/image/logo_sekolah.png') }}" class="rounded-circle img-thumbnail mb-3" width="80" height="80" style="margin-left: 8rem">
        <h3 class="login-title">LoginPage</h3>
        <form action="{{ route('login') }}" method="POST">
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
            {{-- <div class="mt-3 text-center">
                <small>Belum punya akun? <a href="" class="text-light">Daftar di sini</a></small>
            </div> --}}
        </form>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
</body>
</html>
