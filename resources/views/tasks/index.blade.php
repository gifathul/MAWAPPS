<x-app-layout>
  @include('layouts.navbar')
    <main class="tasks-page">
        <div class="tasks-header">
            <div>
                <p class="tasks-eyebrow">MAWAPPS / ACADEMIC</p>
                <h1>Manajemen Tugas</h1>
                <p>Atur tugas kuliah dan selesaikan tepat waktu.</p>
            </div>
            
            <a href="{{ route('tasks.create') }}" class="task-button">
                + Tambah Tugas
            </a>
        </div>
        <a href="{{ route('dashboard') }}" class="back-dashboard">
            ← Kembali ke Dashboard
        </a>
        @if (session('success'))
            <div class="task-alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tasks.index') }}" method="GET"
              class="task-filter">
            <label for="status">Filter status:</label>

            <select name="status" id="status" onchange="this.form.submit()">
                <option value="">Semua Tugas</option>
                <option value="pending"
                    {{ request('status') === 'pending' ? 'selected' : '' }}>
                    Belum Dikerjakan
                </option>
                <option value="in_progress"
                    {{ request('status') === 'in_progress' ? 'selected' : '' }}>
                    Sedang Dikerjakan
                </option>
                <option value="completed"
                    {{ request('status') === 'completed' ? 'selected' : '' }}>
                    Selesai
                </option>
            </select>
        </form>

        @if ($tasks->isEmpty())
            <div class="tasks-empty">
                <h2>Belum ada tugas</h2>
                <p>Tambahkan tugas kuliah pertamamu.</p>

                <a href="{{ route('tasks.create') }}" class="task-button">
                    Buat Tugas
                </a>
            </div>
        @else
            <div class="tasks-grid">
                @foreach ($tasks as $task)
                    <article class="task-card">

                        <div class="task-card-top">
                            <span class="task-priority priority-{{ $task->priority }}">
                                Prioritas:
                                {{ [
                                    'low' => 'Rendah',
                                    'medium' => 'Sedang',
                                    'high' => 'Tinggi'
                                ][$task->priority] }}
                            </span>

                            <span class="task-status status-{{ $task->status }}">
                                {{ [
                                    'pending' => 'Belum Dikerjakan',
                                    'in_progress' => 'Sedang Dikerjakan',
                                    'completed' => 'Selesai'
                                ][$task->status] }}
                            </span>
                        </div>

                        <p class="task-course">{{ $task->course }}</p>

                        <h2>{{ $task->title }}</h2>

                        <p class="task-due">
                            Tenggat:
                            {{ $task->due_date?->format('d M Y') ?? 'Belum ditentukan' }}
                        </p>

                        @if ($task->due_date && $task->status !== 'completed')
                            @if ($task->due_date->lt(today()))
                                <p class="task-deadline overdue">
                                    Tenggat telah lewat
                                </p>
                            @elseif ($task->due_date->isToday())
                                <p class="task-deadline due-today">
                                    Tenggat hari ini
                                </p>
                            @endif
                        @endif

                        @if ($task->description)
                            <p class="task-description">
                                {{ \Illuminate\Support\Str::limit($task->description, 140) }}
                            </p>
                        @endif

                        <div class="task-actions">
                            <a href="{{ route('tasks.edit', $task) }}">
                                Edit
                            </a>

                            <form action="{{ route('tasks.destroy', $task) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
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
