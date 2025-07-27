<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User - Pelajaranku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body { background: #092a6dff; color: #fff; }
        .card { border-radius: 1rem; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Bootstrap" width="30" height="24">
            Pelajaranku</a>
        <div>
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-info btn-sm me-2">
                Edit Profil
            </a>
            <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Materi Tersedia</h2>
        <a href="{{ route('materials.create') }}" class="btn btn-primary">Upload Materi</a>
    </div>

    @if($materials->count() > 0)
        <div class="row">
            @foreach($materials as $material)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-2">{{ $material->title }}</h5>
                            <div class="mb-1 text-muted small">{{ $material->type }}</div>
                            <p class="card-text mb-3">{{ \Illuminate\Support\Str::limit($material->description, 100) }}</p>
                            <a href="{{ route('materials.show', $material->id) }}" class="btn btn-primary">Lihat Materi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">Belum ada materi yang disetujui.</div>
    @endif
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
