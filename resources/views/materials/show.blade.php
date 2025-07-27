<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $material->title }} - Detail Materi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #1c2231; color: #f8f9fa; font-family: 'Segoe UI', Arial, sans-serif; margin:0; }
        .wrapper { max-width: 800px; margin: 2em auto; background: #22293a; padding: 2em; border-radius: 1em; }
        h1 { margin-bottom: .5em; }
        .meta { color: #b0b9c6; margin-bottom: 1em; }
        .preview { margin-bottom: 2em; }
        .comment-box, .reply-box { margin-bottom: 2em; }
        textarea, input[type=text] { width: 100%; padding: .5em; border-radius: .5em; border: none; margin-bottom: .5em; }
        textarea { min-height: 60px; }
        .btn { padding: .5em 1.5em; border: none; border-radius: .5em; background: #2e89ff; color: #fff; cursor: pointer; }
        .btn:hover { background: #1761b6; }
        .comment { margin-bottom: 1.2em; padding-left: 1em; border-left: 3px solid #356ba7; }
        .comment .user { font-weight: bold; color: #45a3ff;}
        .comment .time { font-size: .85em; color: #a5b3c4; }
        .reply { margin-left: 2em; margin-top: .6em; border-left: 2px solid #526b90; padding-left: 1em; }
    </style>
</head>
<body>
    <div class="wrapper">
        @php
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            $dashboardUrl = route('admin.dashboard');
        } else {
            $dashboardUrl = route('dashboard');
        }
    @endphp

    <a href="{{ $dashboardUrl }}" class="btn" style="background:#6c757d; margin-bottom:2em;">
        &larr; Kembali ke Dashboard
    </a>
        <h1>{{ $material->title }}</h1>
        <div class="meta">
            Tipe: <b>{{ $material->type }}</b><br>
            <span>{{ $material->description }}</span>
        </div>

        <div class="preview">
            @if(Str::endsWith($material->file_path, '.pdf'))
                <iframe src="{{ asset('storage/' . $material->file_path) }}" width="100%" height="400"></iframe>
            @elseif(Str::startsWith($material->type, 'image'))
                <img src="{{ asset('storage/' . $material->file_path) }}" alt="Gambar" style="max-width:100%; border-radius:.7em;" />
            @elseif(Str::startsWith($material->type, 'video'))
                <video src="{{ asset('storage/' . $material->file_path) }}" controls style="width:100%; border-radius:.7em;"></video>
            @elseif(Str::startsWith($material->type, 'audio'))
                <audio src="{{ asset('storage/' . $material->file_path) }}" controls style="width:100%"></audio>
            @else
                <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="btn">Download File</a>
            @endif
        </div>

        <h2 style="margin-bottom:.5em;">Diskusi & Komentar</h2>
        @auth
        <form action="{{ route('comments.store') }}" method="POST" class="comment-box">
            @csrf
            <input type="hidden" name="material_id" value="{{ $material->id }}">
            <textarea name="comment_text" placeholder="Tulis komentar..." required></textarea>
            <button type="submit" class="btn">Kirim</button>
        </form>
        @endauth

        @forelse ($comments as $comment)
            <div class="comment">
                <div class="user">{{ $comment->user->name }}</div>
                <div>{{ $comment->comment_text }}</div>
                <div class="time">{{ $comment->created_at->diffForHumans() }}</div>

                {{-- Balasan --}}
                @foreach ($comment->replies as $reply)
                    <div class="reply">
                        <div class="user">{{ $reply->user->name }}</div>
                        <div>{{ $reply->comment_text }}</div>
                        <div class="time">{{ $reply->created_at->diffForHumans() }}</div>
                    </div>
                @endforeach

                {{-- Form reply --}}
                @auth
                <form action="{{ route('comments.store') }}" method="POST" class="reply-box">
                    @csrf
                    <input type="hidden" name="material_id" value="{{ $material->id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <input type="text" name="comment_text" placeholder="Balas komentar..." required>
                    <button type="submit" class="btn">Reply</button>
                </form>
                @endauth
            </div>
        @empty
            <div class="text-muted">Belum ada komentar.</div>
        @endforelse

    </div>
</body>
</html>
