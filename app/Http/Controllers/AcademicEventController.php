<?php

namespace App\Http\Controllers;

use App\Models\AcademicEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicEventController extends Controller
{
    // Menampilkan seluruh agenda milik pengguna
    public function index()
    {
        $events = Auth::user()
            ->academicEvents()
            ->orderBy('start_at', 'asc')
            ->get();

        return view('academic-events.index', compact('events'));
    }

    // Menampilkan halaman tambah agenda
    public function create()
    {
        return view('academic-events.create');
    }

    // Menyimpan agenda baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_at' => 'required|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'location' => 'nullable|string|max:255',
            'type' => 'required|string|max:100',
        ]);

        Auth::user()->academicEvents()->create($validated);

        return redirect()
            ->route('academic-events.index')
            ->with('success', 'Agenda berhasil ditambahkan!');
    }

    // Menampilkan halaman edit agenda
    public function edit(AcademicEvent $academicEvent)
    {
        $event = Auth::user()
            ->academicEvents()
            ->findOrFail($academicEvent->id);

        return view('academic-events.edit', compact('event'));
    }

    // Memperbarui agenda
    public function update(Request $request, AcademicEvent $academicEvent)
    {
        $event = Auth::user()
            ->academicEvents()
            ->findOrFail($academicEvent->id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_at' => 'required|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'location' => 'nullable|string|max:255',
            'type' => 'required|string|max:100',
        ]);

        $event->update($validated);

        return redirect()
            ->route('academic-events.index')
            ->with('success', 'Agenda berhasil diperbarui!');
    }

    // Menghapus agenda
    public function destroy(AcademicEvent $academicEvent)
    {
        $event = Auth::user()
            ->academicEvents()
            ->findOrFail($academicEvent->id);

        $event->delete();

        return redirect()
            ->route('academic-events.index')
            ->with('success', 'Agenda berhasil dihapus!');
    }
}
