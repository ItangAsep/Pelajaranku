<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Pelajaranku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body { background: #fff; }
        .sidebar {
            min-width: 220px;
            max-width: 250px;
        }
        .admin-navbar {
            background: #222c34;
            color: #fff;
            height: 48px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="admin-navbar d-flex align-items-center px-3 justify-content-between">
        <span>Admin Panel Pelajaranku</span>
        <div class="d-flex align-items-center gap-3">
        <span>Hi, {{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm ms-2">Logout</button>
        </form>
    </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 mb-3">
                <div class="list-group">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.materials.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.materials.*') ? 'active' : '' }}">Materi</a>
                    <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.edit') ? 'active' : '' }}">Profil</a>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <h1 class="fw-bold">Admin Dashboard</h1>
                <p>Selamat datang, {{ auth()->user()->name }}! Anda login sebagai <strong>Admin</strong>.</p>

                <div class="mt-3 mb-3">
                    <a href="{{ route('admin.materials.index') }}" class="btn btn-primary">Kelola Materi</a>
                    <a href="{{ route('materials.create') }}" class="btn btn-primary">Upload Materi</a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
