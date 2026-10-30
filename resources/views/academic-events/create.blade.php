
<x-app-layout>

<div class="academic-page">

    <div class="academic-header">
        <p class="academic-eyebrow">MAWAPPS / ACADEMIC CALENDAR</p>
        <h1>Tambah Agenda</h1>
        <p>Catat dan atur jadwal kegiatan akademikmu.</p>
    </div>

    @if($errors->any())
        <div class="academic-error">
            <strong>Periksa kembali data yang dimasukkan:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="academic-form">

        <form action="{{ route('academic-events.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Agenda</label>
                <input type="text" name="title"
                    value="{{ old('title') }}"
                    placeholder="Contoh: Ujian Basis Data" required>
            </div>

            <div class="form-group">
                <label>Mata Kuliah</label>
                <input type="text" name="course"
                    value="{{ old('course') }}"
                    placeholder="Contoh: Basis Data">
            </div>

            <div class="form-group">
                <label>Jenis Agenda</label>
                <select name="type" required>
                    @foreach(['kuliah', 'tugas', 'ujian', 'seminar', 'lainnya'] as $type)
                        <option value="{{ $type }}"
                            {{ old('type', 'lainnya') === $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal dan Waktu Mulai</label>
                <input type="datetime-local" name="start_at"
                    value="{{ old('start_at') }}" required>
            </div>

            <div class="form-group">
                <label>Tanggal dan Waktu Selesai</label>
                <input type="datetime-local" name="end_at"
                    value="{{ old('end_at') }}">
            </div>

            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="location"
                    value="{{ old('location') }}"
                    placeholder="Contoh: Ruang Laboratorium">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description"
                    placeholder="Tambahkan keterangan agenda...">{{ old('description') }}</textarea>
            </div>

            <div class="academic-actions">
                <button type="submit" class="academic-button">
                    Simpan Agenda
                </button>

                <a href="{{ route('academic-events.index') }}"
                    class="academic-button secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>

</x-app-layout>
