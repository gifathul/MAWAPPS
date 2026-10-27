
<x-app-layout>

    <main class="notes-page">
        <div class="notes-header">
            <div>
                <p class="notes-eyebrow">MAWAPPS / ACADEMIC</p>
                <h1>Catatan Kuliah</h1>
                <p>Simpan dan kelola materi perkuliahanmu.</p>
            </div>

            <a href="{{ route('notes.create') }}" class="note-button">
                + Catatan Baru
            </a>
        </div>
        <a href="{{ route('dashboard') }}" class="back-dashboard">
        ← Kembali ke Dashboard
        </a>
        @if (session('success'))
            <div class="note-alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($notes->isEmpty())
            <div class="notes-empty">
                <h2>Belum ada catatan</h2>
                <p>Mulai tulis materi kuliah pertamamu.</p>
                <a href="{{ route('notes.create') }}" class="note-button">
                    Buat Catatan
                </a>
            </div>
        @else
            <div class="notes-grid">
                @foreach ($notes as $note)
                    <article class="note-card">
                        <p class="note-course">{{ $note->course }}</p>

                        <h2>{{ $note->title }}</h2>

                        <p class="note-date">
                            {{ $note->lecture_date?->format('d M Y') ?? 'Tanggal belum diatur' }}
                        </p>

                        <p class="note-preview">
                            {{ \Illuminate\Support\Str::limit($note->content, 150) }}
                        </p>

                        <div class="note-actions">
                            <a href="{{ route('notes.edit', $note) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('notes.destroy', $note) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus catatan ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">Hapus</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </main>
</x-app-layout>
