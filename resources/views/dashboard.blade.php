<x-app-layout>
    @include('layouts.navbar')

    <main class="dashboard-home dashboard-v2">
        <section class="dashboard-welcome-panel">
            <div class="dashboard-welcome-copy">
                <p class="dashboard-eyebrow">MAWAPPS / WORKSPACE</p>
                <h1>Selamat datang, {{ Auth::user()->name }}.</h1>
                <p>Atur tugas, pantau tenggat waktu, dan simpan materi kuliahmu dalam satu ruang kerja.</p>
                <a href="{{ route('tasks.index') }}" class="dashboard-primary-action">
                    Buka Manajemen Tugas <span aria-hidden="true">↗</span>
                </a>
            </div>
            <div class="dashboard-welcome-mark" aria-hidden="true">
                <span>MW</span>
                <small>STUDENT WORKSPACE</small>
            </div>
        </section>
        
<section class="dashboard-panel dashboard-schedule-panel">

    <div class="dashboard-panel-heading">
        <div>
            <p class="dashboard-panel-kicker">YOUR SCHEDULE</p>
            <h2>Academic Schedule</h2>
            <p>Agenda akademik terdekat milikmu.</p>
        </div>

        <span class="dashboard-panel-symbol" aria-hidden="true">
            CAL
        </span>
    </div>

    @forelse($upcomingEvents as $event)

        <div class="dashboard-action-row">
            <span class="dashboard-row-icon" aria-hidden="true">
                {{ $event->start_at->format('d') }}
            </span>

            <span class="dashboard-row-copy">
                <strong>{{ $event->title }}</strong>

                <small>
                    {{ $event->start_at->translatedFormat('l, d F Y') }}
                    · {{ $event->start_at->format('H:i') }}

                    @if($event->end_at)
                        - {{ $event->end_at->format('H:i') }}
                    @endif
                </small>

                <small>
                    {{ ucfirst($event->type) }}

                    @if($event->course)
                        · {{ $event->course }}
                    @endif

                    @if($event->location)
                        · {{ $event->location }}
                    @endif
                </small>
            </span>

            <span class="dashboard-row-arrow" aria-hidden="true">
                →
            </span>
        </div>

    @empty

        <div class="dashboard-schedule-empty">
            <strong>Belum ada jadwal mendatang.</strong>
            <p>Tambahkan agenda akademik agar jadwalmu muncul di sini.</p>
        </div>

    @endforelse

    <div class="dashboard-panel-footer">
        <a href="{{ route('academic-events.index') }}">
            Lihat semua agenda →
        </a>
    </div>

</section>

        <section class="dashboard-section-heading">
            <div>
                <p class="dashboard-section-kicker">YOUR WORKSPACE</p>
                <h2>Ringkasan aktivitas</h2>
            </div>
            <p class="dashboard-section-note">Semua kebutuhan kuliah, lebih teratur.</p>
        </section>
        
        <section class="dashboard-v2-grid">
            <div class="dashboard-panel dashboard-task-panel">
                <div class="dashboard-panel-heading">
                    <div>
                        <p class="dashboard-panel-kicker">STAY ON TRACK</p>
                        <h2>Fokus perkuliahan</h2>
                    </div>
                    <span class="dashboard-panel-symbol" aria-hidden="true">↗</span>
                </div>

                <a href="{{ route('tasks.index') }}" class="dashboard-action-row">
                    <span class="dashboard-row-icon" aria-hidden="true">01</span>
                    <span class="dashboard-row-copy">
                        <strong>Periksa daftar tugas</strong>
                        <small>Lihat status pengerjaan dan tenggat waktu tugas.</small>
                    </span>
                    <span class="dashboard-row-arrow" aria-hidden="true">→</span>
                </a>

                <a href="{{ route('tasks.index') }}" class="dashboard-action-row">
                    <span class="dashboard-row-icon" aria-hidden="true">02</span>
                    <span class="dashboard-row-copy">
                        <strong>Prioritaskan tenggat terdekat</strong>
                        <small>Pastikan tugas penting tidak terlewat.</small>
                    </span>
                    <span class="dashboard-row-arrow" aria-hidden="true">→</span>
                </a>

                <a href="{{ route('notes.index') }}" class="dashboard-action-row">
                    <span class="dashboard-row-icon" aria-hidden="true">03</span>
                    <span class="dashboard-row-copy">
                        <strong>Buka kembali materi kuliah</strong>
                        <small>Temukan catatan yang kamu simpan sebelumnya.</small>
                    </span>
                    <span class="dashboard-row-arrow" aria-hidden="true">→</span>
                </a>

                <div class="dashboard-panel-footer">
                    <span class="dashboard-status-dot"></span>
                    <span>Ruang kerja siap digunakan</span>
                </div>
            </div>

            <aside class="dashboard-side-column">
                <a href="{{ route('tasks.index') }}" class="dashboard-feature-card dashboard-feature-tasks">
                    <div class="dashboard-feature-topline">
                        <span class="dashboard-feature-icon" aria-hidden="true">T</span>
                        <span class="dashboard-feature-arrow" aria-hidden="true">↗</span>
                    </div>
                    <p class="dashboard-feature-label">TASK MANAGEMENT</p>
                    <h2>Manajemen Tugas</h2>
                    <p>Atur tugas, prioritas, status, dan deadline perkuliahan.</p>
                    <span class="dashboard-feature-link">Lihat daftar tugas <span aria-hidden="true">→</span></span>
                </a>

                <a href="{{ route('notes.index') }}" class="dashboard-feature-card dashboard-feature-notes">
                    <div class="dashboard-feature-topline">
                        <span class="dashboard-feature-icon" aria-hidden="true">N</span>
                        <span class="dashboard-feature-arrow" aria-hidden="true">↗</span>
                    </div>
                    <p class="dashboard-feature-label">ACADEMIC NOTES</p>
                    <h2>Catatan Kuliah</h2>
                    <p>Simpan dan buka kembali materi kuliah dengan mudah.</p>
                    <span class="dashboard-feature-link">Buka catatan <span aria-hidden="true">→</span></span>
                </a>

                <a href="{{ route('academic-events.index') }}" class="dashboard-feature-card dashboard-feature-notes">
                    <div class="dashboard-feature-topline">
                        <span class="dashboard-feature-icon" aria-hidden="true">K</span>
                        <span class="dashboard-feature-arrow" aria-hidden="true">↗</span>
                    </div>
                    <p class="dashboard-feature-label">ACADEMIC CALENDAR</p>
                    <h2>Kalender Akademik</h2>
                    <p>Kelola jadwal kuliah, ujian, seminar,dan agenda akademik lainnya..</p>
                    <span class="dashboard-feature-link">Buka kalender<span aria-hidden="true">→</span></span>
                </a>
            </aside>
        </section>

        <footer class="dashboard-bottom-note">
            <span>MAWAPPS</span>
            <span>Belajar teratur, selangkah lebih maju.</span>
        </footer>
    </main>
</x-app-layout>
