<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelajaranku</title>
    <!-- PERBAIKAN: Mengganti 'xintegrity' menjadi 'integrity' yang benar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://placehold.co/30x24/ffffff/000000?text=P" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <strong>Pelajaranku</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-light">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA DENGAN LAYOUT SPLIT-SCREEN -->
    <div class="container-fluid p-0">
        <div class="row g-0 main-container">
            
            <!-- KOLOM KIRI: Teks Sambutan -->
            <div class="row align-items-center min-vh-70">
    <!-- Kiri: Teks -->
    <div class="col-md-6 p-5">
        <h1 class="display-4 fw-bold">Belajar Tanpa Batas.</h1>
        <p class="lead text-muted my-4">
            Selamat datang di Pelajaranku Platform Pembelajaran gratis untuk semua kalangan. Jelajahi berbagai materi menarik yang telah kami siapkan untuk Anda. Mulai dari teknologi, sains, hingga kreativitas, semuanya ada di sini.
        </p>
    </div>
    <!-- Kanan: Gambar -->
    <div class="col-md-6 d-flex justify-content-center">
        <img src="{{ asset('assets/images/bukubertumpuk.jpg') }}" alt="Ilustrasi Belajar" class="img-fluid" style="max-width:370px;">
    </div>
</div>



        @if($materials->count())
            <div class="row">
                @foreach($materials as $material)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $material->title }}</h5>
                                <p class="card-text">{{ Str::limit($material->description, 100) }}</p>
                                <span class="badge bg-secondary">{{ ucfirst($material->type) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Belum ada materi yang disetujui.</p>
        @endif
    </div>

</body>
</html>
