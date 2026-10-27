
<x-app-layout>
    <main class="note-form-page">
        <a href="{{ route('notes.index') }}" class="note-back">
            ← Kembali ke Catatan
        </a>

        <h1>Tambah Catatan</h1>
        <p class="form-description">
            Catat materi kuliahmu agar mudah dipelajari kembali.
        </p>

        <form action="{{ route('notes.store') }}" method="POST"
              class="note-form">
            @csrf

            <label for="title">Judul Catatan</label>
            <input id="title" name="title" type="text"
                   value="{{ old('title') }}" required>
            @error('title') <p class="field-error">{{ $message }}</p> @enderror

            <label for="course">Mata Kuliah</label>
            <input id="course" name="course" type="text"
                   value="{{ old('course') }}" required>
            @error('course') <p class="field-error">{{ $message }}</p> @enderror

            <label for="lecture_date">Tanggal Perkuliahan</label>
            <input id="lecture_date" name="lecture_date" type="date"
                   value="{{ old('lecture_date') }}">
            @error('lecture_date') <p class="field-error">{{ $message }}</p> @enderror

            <label for="content">Isi Catatan</label>
            <textarea id="content" name="content" rows="10"
                      required>{{ old('content') }}</textarea>
            @error('content') <p class="field-error">{{ $message }}</p> @enderror

            <button type="submit" class="note-button">
                Simpan Catatan
            </button>
        </form>
    </main>
</x-app-layout>
