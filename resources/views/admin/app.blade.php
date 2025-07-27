<!-- resources/views/admin/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Pelajaranku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <span class="text-white">Hi, {{ auth()->user()->name }}</span>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar -->
                <ul class="list-group">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item">Dashboard</a>
                    <a href="{{ route('admin.materials.index') }}" class="list-group-item">Materi</a>
                    <a href="{{ route('profile.edit') }}" class="list-group-item">Profil</a>
                </ul>
            </div>
            <div class="col-md-9">
                <!-- Main content -->
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
