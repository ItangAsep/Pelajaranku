<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Pelajaranku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body {
            background: #f5f8ff;
            min-height: 100vh;
        }
        .register-container {
            max-width: 900px;
        }
        .register-card {
            border: none;
            box-shadow: 0 0 32px 0 rgba(80,112,251,0.07), 0 1.5px 4px 0 rgba(0,0,0,0.03);
        }
        .form-control, .form-control:focus {
            background: #f7faff;
            border: 1.5px solid #d1d9e6;
            box-shadow: none;
        }
        .btn-register {
            background: #157afe;
            color: #fff;
            border-radius: 9px;
            font-size: 1.1rem;
        }
        .btn-register:hover {
            background: #2069d6;
            color: #fff;
        }
        .input-group-text {
            background: #f7faff;
            border-right: none;
        }
    </style>
</head>
<body>
<div class="container register-container d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 shadow rounded-4 bg-white p-0">
        <!-- Kiri: Ilustrasi & Welcome -->
        <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center align-items-center p-5 rounded-4" style="background: #f1f7ff;">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Register" style="max-width: 250px;" class="mb-4">
            <h3 class="fw-bold mb-2">Gabung bersama kami!</h3>
            <p class="text-muted text-center">Daftar sekarang untuk mulai belajar tanpa batas.</p>
        </div>
        <!-- Kanan: Form Register -->
        <div class="col-lg-6 col-12 py-5 px-4 px-lg-5 d-flex align-items-center">
            <div class="w-100">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" id="name" name="name" class="form-control border-start-0" required autofocus placeholder="Enter your name" value="{{ old('name') }}">
                        </div>
                        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="email" name="email" class="form-control border-start-0" required placeholder="Enter your email address" value="{{ old('email') }}">
                        </div>
                        @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password" name="password" class="form-control border-start-0" required placeholder="Enter your password">
                        </div>
                        @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control border-start-0" required placeholder="Repeat your password">
                        </div>
                        @error('password_confirmation')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-register w-100 py-2 mb-2">Register</button>
                </form>
                <div class="text-center mt-2 small text-muted">
                    Already registered? <a href="{{ route('login') }}" class="text-primary">Log in</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- (Opsional) Tambah FontAwesome CDN jika ingin ikon, atau ganti dengan SVG simple/icon custom -->
</body>
</html>
