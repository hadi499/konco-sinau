<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index()
    {
        $questions = Pertanyaan::all();
        return view('questions.index', [
            'questions' => $questions
        ]);
    }

    public function create()
    {
        $quizzes = Game::all(); // Ambil semua kuis untuk dropdown pilihan
        $questions = Pertanyaan::all();
        return view('questions.create', [
            'title' => 'create question',
            'quizzes' => $quizzes,
            'questions' => $questions
        ]);
    }

    public function store(Request $request)
    {

        // Validasi input
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'title' => 'required',
            'answers.*.title' => 'required',
            'answers.*.correct' => 'required|boolean',
        ]);

        // Simpan pertanyaan
        $question = Pertanyaan::create([
            'title' => $request->title,
            'game_id' => $request->game_id,
        ]);

        // Simpan jawaban
        foreach ($request->answers as $answer) {
            Jawaban::create([
                'title' => $answer['title'],
                'correct' => $answer['correct'],
                'pertanyaan_id' => $question->id,
            ]);
        }

        return redirect()->back();
    }

    // ✅ Function Edit (Menampilkan form edit)
    public function edit($id)
    {
        $question = Pertanyaan::with('jawabans')->findOrFail($id);
        $quizzes = Game::all();

        return view('questions.edit', [
            'question' => $question,
            'quizzes' => $quizzes
        ]);
    }

    // ✅ Function Update (Menyimpan perubahan dari edit)
    public function update(Request $request, $id)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'title' => 'required',
            'answers.*.title' => 'required',
            'answers.*.correct' => 'required|boolean',
        ]);

        $question = Pertanyaan::findOrFail($id);
        $question->update([
            'title' => $request->title,
            'game_id' => $request->game_id,
        ]);

        // Update jawaban
        foreach ($request->answers as $answerId => $answerData) {
            $answer = Jawaban::find($answerId);
            if ($answer) {
                $answer->update([
                    'title' => $answerData['title'],
                    'correct' => $answerData['correct'],
                ]);
            }
        }

        return redirect()->route('question.create')->with('success', 'Pertanyaan berhasil diperbarui!');
    }

    // ✅ Function Delete (Menghapus pertanyaan beserta jawabannya)
    public function destroy($id)
    {
        $question = Pertanyaan::findOrFail($id);

        // Hapus semua jawaban terkait
        Jawaban::where('pertanyaan_id', $question->id)->delete();

        // Hapus pertanyaan
        $question->delete();

        return redirect()->back()->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
