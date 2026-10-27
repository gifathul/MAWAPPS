<x-app-layout>
    <main class="task-form-page">

        <a href="{{ route('tasks.index') }}" class="back-dashboard">
            ← Kembali ke Manajemen Tugas
        </a>

        <h1>Tambah Tugas</h1>
        <p class="task-form-description">
            Catat tugas kuliah dan tentukan tenggat pengumpulannya.
        </p>

        <form action="{{ route('tasks.store') }}" method="POST"
              class="task-form">
            @csrf

            <label for="title">Nama Tugas</label>
            <input id="title" name="title" type="text"
                   value="{{ old('title') }}" required>
            @error('title')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="course">Mata Kuliah</label>
            <input id="course" name="course" type="text"
                   value="{{ old('course') }}" required>
            @error('course')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="due_date">Tenggat Pengumpulan</label>
            <input id="due_date" name="due_date" type="date"
                   value="{{ old('due_date') }}">
            @error('due_date')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="priority">Prioritas</label>
            <select id="priority" name="priority" required>
                <option value="low"
                    {{ old('priority', 'medium') === 'low' ? 'selected' : '' }}>
                    Rendah
                </option>
                <option value="medium"
                    {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}>
                    Sedang
                </option>
                <option value="high"
                    {{ old('priority', 'medium') === 'high' ? 'selected' : '' }}>
                    Tinggi
                </option>
            </select>
            @error('priority')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="description">Deskripsi Tugas</label>
            <textarea id="description" name="description" rows="6"
                      placeholder="Tuliskan detail tugas...">{{ old('description') }}</textarea>
            @error('description')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <button type="submit" class="task-button">
                Simpan Tugas
            </button>
        </form>

    </main>
</x-app-layout>
