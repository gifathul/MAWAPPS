<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = auth()->user()->tasks()->latest();

        if ($request->filled('status')) {
            $request->validate([
                'status' => [
                    Rule::in([
                        'pending',
                        'in_progress',
                        'completed',
                    ]),
                ],
            ]);

            $query->where('status', $request->status);
        }

        $tasks = $query->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => [
                'required',
                Rule::in(['low', 'medium', 'high']),
            ],
        ]);

        $validated['status'] = 'pending';

        auth()->user()->tasks()->create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function edit(Task $task)
    {
        $task = auth()->user()
            ->tasks()
            ->findOrFail($task->id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task = auth()->user()
            ->tasks()
            ->findOrFail($task->id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => [
                'required',
                Rule::in(['low', 'medium', 'high']),
            ],
            'status' => [
                'required',
                Rule::in([
                    'pending',
                    'in_progress',
                    'completed',
                ]),
            ],
        ]);

        $task->update($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Task $task)
    {
        $task = auth()->user()
            ->tasks()
            ->findOrFail($task->id);

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tugas berhasil dihapus.');
    }
}
