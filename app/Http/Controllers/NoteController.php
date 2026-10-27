<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = auth()->user()
            ->notes()
            ->latest()
            ->get();

        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'lecture_date' => 'nullable|date',
            'content' => 'required|string',
        ]);

        auth()->user()->notes()->create($validated);

        return redirect()
            ->route('notes.index')
            ->with('success', 'Catatan berhasil disimpan.');
    }

    public function edit(Note $note)
    {
        $note = auth()->user()
            ->notes()
            ->findOrFail($note->id);

        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $note = auth()->user()
            ->notes()
            ->findOrFail($note->id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'lecture_date' => 'nullable|date',
            'content' => 'required|string',
        ]);

        $note->update($validated);

        return redirect()
            ->route('notes.index')
            ->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy(Note $note)
    {
        $note = auth()->user()
            ->notes()
            ->findOrFail($note->id);

        $note->delete();

        return redirect()
            ->route('notes.index')
            ->with('success', 'Catatan berhasil dihapus.');
    }
}
