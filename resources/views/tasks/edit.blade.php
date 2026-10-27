<x-app-layout>
    <main class="task-form-page">

        <a href="{{ route('tasks.index') }}" class="back-dashboard">
            ← Kembali ke Manajemen Tugas
        </a>

        <h1>Edit Tugas</h1>
        <p class="task-form-description">
            Perbarui informasi dan status tugasmu.
        </p>

        <form action="{{ route('tasks.update', $task) }}" method="POST"
              class="task-form">
            @csrf
            @method('PUT')

            <label for="title">Nama Tugas</label>
            <input id="title" name="title" type="text"
                   value="{{ old('title', $task->title) }}" required>
            @error('title')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="course">Mata Kuliah</label>
            <input id="course" name="course" type="text"
                   value="{{ old('course', $task->course) }}" required>
            @error('course')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="due_date">Tenggat Pengumpulan</label>
            <input id="due_date" name="due_date" type="date"
                   value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}">
            @error('due_date')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="priority">Prioritas</label>
            <select id="priority" name="priority" required>
                <option value="low"
                    {{ old('priority', $task->priority) === 'low' ? 'selected' : '' }}>
                    Rendah
                </option>
                <option value="medium"
                    {{ old('priority', $task->priority) === 'medium' ? 'selected' : '' }}>
                    Sedang
                </option>
                <option value="high"
                    {{ old('priority', $task->priority) === 'high' ? 'selected' : '' }}>
                    Tinggi
                </option>
            </select>
            @error('priority')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="status">Status Pengerjaan</label>
            <select id="status" name="status" required>
                <option value="pending"
                    {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>
                    Belum Dikerjakan
                </option>
                <option value="in_progress"
                    {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}>
                    Sedang Dikerjakan
                </option>
                <option value="completed"
                    {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>
                    Selesai
                </option>
            </select>
            @error('status')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="description">Deskripsi Tugas</label>
            <textarea id="description" name="description" rows="6">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <button type="submit" class="task-button">
                Simpan Perubahan
            </button>
        </form>

    </main>
</x-app-layout>
