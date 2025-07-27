@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg mt-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6">Edit Materi</h2>
        
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-semibold">Judul Materi</label>
                <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2 mt-1"
                    value="{{ old('title', $material->title) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-semibold">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2 mt-1" required>{{ old('description', $material->description) }}</textarea>
            </div>

            <!-- Contoh: File upload (opsional) -->
            <div class="mb-4">
                <label for="file" class="block font-semibold">Upload File (Optional, ganti jika ingin update)</label>
                <input type="file" name="file" id="file" class="w-full border rounded px-3 py-2 mt-1">
                @if ($material->file_path)
                    <div class="mt-2 text-sm">
                        File saat ini: <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="underline text-blue-600">Lihat File</a>
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="is_approved" class="block font-semibold">Status</label>
                <select name="is_approved" id="is_approved" class="w-full border rounded px-3 py-2 mt-1" required>
                <option value="0" {{ old('is_approved', $material->is_approved) == 0 ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ old('is_approved', $material->is_approved) == 1 ? 'selected' : '' }}>Approved</option>
                </select>
                </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black rounded px-4 py-2">
                    Update Materi
                </button>
                <a href="{{ route('admin.materials.index') }}" class="text-gray-600 hover:underline mt-2">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
