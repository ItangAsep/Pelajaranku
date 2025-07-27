<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Pelajaranku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        body {
            background: #f5f8ff;
            min-height: 100vh;
        }
        .login-container {
            max-width: 900px;
        }
        .login-card {
            border: none;
            box-shadow: 0 0 32px 0 rgba(80,112,251,0.1), 0 1.5px 4px 0 rgba(0,0,0,0.04);
        }
        .form-control, .form-control:focus {
            background: #f7faff;
            border: 1.5px solid #d1d9e6;
            box-shadow: none;
        }
        .btn-login {
            background: #157afe;
            color: #fff;
            border-radius: 9px;
            font-size: 1.1rem;
        }
        .btn-login:hover {
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
<div class="container login-container d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 shadow rounded-4 bg-white p-0">
        <!-- Kiri: Ilustrasi & Welcome -->
        <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center align-items-center p-5 rounded-4" style="background: #f1f7ff;">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Welcome" style="max-width: 280px;" class="mb-4">
            <h3 class="fw-bold mb-2">Selamat Datang Kembali</h3>
            <p class="text-muted text-center">Masuk Sekarang untuk memulai</p>
        </div>
        <!-- Kanan: Form Login -->
        <div class="col-lg-6 col-12 py-5 px-4 px-lg-5 d-flex align-items-center">
            <div class="w-100">
                @if (session('status'))
                    <div class="alert alert-success mb-3">{{ session('status') }}</div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text"><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" class="me-1" viewBox="0 0 24 24"><path d="M4 4h16v16H4z"/><path d="M22,6 L12,13 L2,6"/></svg></span>
                            <input type="email" id="email" name="email" class="form-control border-start-0" required autofocus placeholder="Masukan alamat email anda" value="{{ old('email') }}">
                        </div>
                        @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" class="me-1" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/></svg></span>
                            <input type="password" id="password" name="password" class="form-control border-start-0" required placeholder="Masukan password anda" value="{{ old('password') }}">
                        </div>
                        @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <input type="checkbox" name="remember" id="remember" class="form-check-input me-1">
                            <label for="remember" class="form-check-label small">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="small text-primary text-decoration-none">Lupa password?</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-login w-100 py-2 mb-3">Login</button>
                </form>
                <div class="text-center mt-2 small text-muted">
                    Don’t have an account? <a href="{{ route('register') }}" class="text-primary">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
