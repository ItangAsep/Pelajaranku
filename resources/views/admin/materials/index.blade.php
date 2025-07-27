@extends('admin.app') {{-- pastikan file layout admin ini ada --}}

@section('content')
<div class="container">
    <h2>Daftar Materi Menunggu Persetujuan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tipe</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($materials as $material)
            <tr>
                <td>{{ $material->title }}</td>
                <td>{{ $material->description }}</td>
                <td>{{ $material->type }}</td>
                <td>{{ $material->is_approved ? 'Disetujui' : 'Menunggu' }}</td>
                <td>
                    @if (!$material->is_approved)
                    <form action="{{ route('admin.materials.approve', $material->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success btn-sm" onclick="return confirm('Setujui materi ini?')">Setujui</button>
                    </form>
                    @endif
                    <a href="{{ route('admin.materials.show', $material->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.materials.edit', $material->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.materials.destroy', $material->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus materi ini?')" class="btn btn-danger btn-sm">
                    Hapus
                    </button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
