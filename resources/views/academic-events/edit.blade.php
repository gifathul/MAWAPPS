
<x-app-layout>
@section('content')
<div class="note-form-page">
    <p class="notes-eyebrow">MAWAPPS / AKADEMIK</p>
    <h1>Edit Agenda</h1>
    <p>Perbarui informasi kegiatan akademikmu.</p>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('academic-events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Agenda</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $event->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="course" class="form-control"
                   value="{{ old('course', $event->course) }}">
        </div>

        <div class="mb-3">
            <label>Jenis Agenda</label>
            <select name="type" class="form-control" required>
                @foreach(['kuliah', 'tugas', 'ujian', 'seminar', 'lainnya'] as $type)
                    <option value="{{ $type }}"
                        {{ old('type', $event->type) === $type ? 'selected' : '' }}>
                        {{ ucfirst($type) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal dan Waktu Mulai</label>
            <input type="datetime-local" name="start_at"
                   class="form-control"
                   value="{{ old('start_at', $event->start_at->format('Y-m-d\TH:i')) }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Tanggal dan Waktu Selesai</label>
            <input type="datetime-local" name="end_at"
                   class="form-control"
                   value="{{ old('end_at', $event->end_at?->format('Y-m-d\TH:i')) }}">
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control"
                   value="{{ old('location', $event->location) }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"
                      rows="4">{{ old('description', $event->description) }}</textarea>
        </div>

        <button type="submit" class="note-button">
            Simpan Perubahan
        </button>

        <a href="{{ route('academic-events.index') }}" class="note-button">
            Batal
        </a>
    </form>
</div>
</x-app-layout>
