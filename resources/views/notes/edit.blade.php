
<x-app-layout>
    <main class="note-form-page">
        <a href="{{ route('notes.index') }}" class="note-back">
            ← Kembali ke Catatan
        </a>

        <h1>Edit Catatan</h1>
        <p class="form-description">
            Perbarui materi perkuliahanmu.
        </p>

        <form action="{{ route('notes.update', $note) }}"
              method="POST" class="note-form">
            @csrf
            @method('PUT')

            <label for="title">Judul Catatan</label>
            <input id="title" name="title" type="text"
                   value="{{ old('title', $note->title) }}" required>
            @error('title') <p class="field-error">{{ $message }}</p> @enderror

            <label for="course">Mata Kuliah</label>
            <input id="course" name="course" type="text"
                   value="{{ old('course', $note->course) }}" required>
            @error('course') <p class="field-error">{{ $message }}</p> @enderror

            <label for="lecture_date">Tanggal Perkuliahan</label>
            <input id="lecture_date" name="lecture_date" type="date"
                   value="{{ old('lecture_date', $note->lecture_date?->format('Y-m-d')) }}">
            @error('lecture_date') <p class="field-error">{{ $message }}</p> @enderror

            <label for="content">Isi Catatan</label>
            <textarea id="content" name="content" rows="10"
                      required>{{ old('content', $note->content) }}</textarea>
            @error('content') <p class="field-error">{{ $message }}</p> @enderror

            <button type="submit" class="note-button">
                Simpan Perubahan
            </button>
        </form>
    </main>
</x-app-layout>
