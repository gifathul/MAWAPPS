
<x-app-layout>
     @include('layouts.navbar')
<div class="notes-page">
    <div class="notes-header">
        <div>
            <p class="notes-eyebrow">MAWAPPS / AKADEMIK</p>
            <h1>Kalender Akademik</h1>
            <p>Kelola jadwal dan agenda kegiatan akademikmu.</p>
        </div>

        <a href="{{ route('academic-events.create') }}" class="note-button">
            + Tambah Agenda
        </a>
    </div>
    <a href="{{ route('dashboard') }}" class="note-button">
        ← Kembali ke Dashboard
    </a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($events->isEmpty())
        <div class="note-form-page">
            <h3>Belum ada agenda</h3>
            <p>Tambahkan agenda akademik pertamamu.</p>
        </div>
    @else
        <div class="notes-list">
            @foreach($events as $event)
                <div class="note-form-page">
                    <div class="notes-header">
                        <div>
                            <span class="notes-eyebrow">
                                {{ ucfirst($event->type) }}
                            </span>

                            <h2>{{ $event->title }}</h2>

                            @if($event->course)
                                <p>{{ $event->course }}</p>
                            @endif
                        </div>

                        <div>
                            <a href="{{ route('academic-events.edit', $event) }}"
                               class="note-button">
                                Edit
                            </a>

                            <form action="{{ route('academic-events.destroy', $event) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="note-button">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    <p>
                        <strong>Mulai:</strong>
                        {{ $event->start_at->format('d M Y, H:i') }}
                    </p>

                    @if($event->end_at)
                        <p>
                            <strong>Selesai:</strong>
                            {{ $event->end_at->format('d M Y, H:i') }}
                        </p>
                    @endif

                    @if($event->location)
                        <p><strong>Lokasi:</strong> {{ $event->location }}</p>
                    @endif

                    @if($event->description)
                        <p>{{ $event->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
</x-app-layout>
