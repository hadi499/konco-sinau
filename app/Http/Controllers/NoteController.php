<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->paginate(6);
        return view('admin.note.index', [
            'notes' => $notes,
            'title' => 'admin notes'
        ]);
    }

    public function studentNote()
    {
        $notes = Note::latest()->paginate(10);
        return view(
            'student-note',
            [
                'notes' => $notes,
                'title' => 'notes'
            ]
        );
    }

    public function create()
    {
        return view('admin.note.create', [
            'title' => 'admin create note'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|string',
        ]);

        // Upload image jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('notes', 'public');
        }

        Note::create($validated);

        return redirect()->route('note.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(Note $note)
    {
        return view('admin.note.show', [
            'note' => $note,
            'title' => 'detail note'
        ]);
    }
    public function showNoteStudent(Note $note)
    {
        return view('student-note-show', [
            'note' => $note,
            'title' => 'detail note'
        ]);
    }

    public function edit(Note $note)
    {
        return view('admin.note.edit', [
            'note' => $note,
            'title' => 'admin edit note'
        ]);
    }

    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|string',
        ]);

        // Update image jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($note->image && Storage::disk('public')->exists($note->image)) {
                Storage::disk('public')->delete($note->image);
            }
            $validated['image'] = $request->file('image')->store('notes', 'public');
        }

        $note->update($validated);

        return redirect()->route('note.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Note $note)
    {
        // Hapus gambar dari storage jika ada
        if ($note->image && Storage::disk('public')->exists($note->image)) {
            Storage::disk('public')->delete($note->image);
        }

        $note->delete();

        return redirect()->route('note.index')->with('success', 'Data berhasil dihapus!');
    }
}
