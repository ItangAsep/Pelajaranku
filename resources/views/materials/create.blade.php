<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Materi Edukasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #181e29; }
        .card { border-radius: 1rem; }
        label { font-weight: 500; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="mb-4 text-center fw-bold">Upload Materi Edukasi</h2>
                    {{-- ALERT SUCCESS --}}
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- ALERT ERROR --}}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

                    <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Materi</label>
                            <input type="text" name="title" id="title" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" rows="3" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Materi</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="" selected disabled>- Pilih tipe materi -</option>
                                <option value="article">Artikel</option>
                                <option value="pdf">PDF</option>
                                <option value="audio">Audio</option>
                                <option value="video">Video</option>
                                <option value="image">Gambar</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="file" class="form-label">Upload File</label>
                            <input class="form-control" type="file" name="file" id="file" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
