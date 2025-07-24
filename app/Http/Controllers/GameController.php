<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $quizzes = Game::all();

        return view('game.index', [
            'quizzes' => $quizzes,
            'title' => 'game asah otak'
        ]);
    }

    public function show($id)
    {
        $quiz = Game::findOrFail($id);
        return view('game.show', [
            'quiz' => $quiz
        ]);
    }

    public function create()
    {
        $games = Game::all();
        return view('game.create', [
            'games' => $games,
            'title' => 'admin game create'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'number_of_questions' => 'required|integer|min:1',
            'time' => 'required|integer|min:10', // detik
            'required_score_to_pass' => 'required|integer|min:0|max:100'
        ]);

        Game::create($validated);

        return redirect()->back()->with('success', 'Game berhasil dibuat!');
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);

        return view('game.edit', [
            'game' => $game,
            'title' => 'admin game edit'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'number_of_questions' => 'required|integer|min:1',
            'time' => 'required|integer|min:10', // detik
            'required_score_to_pass' => 'required|integer|min:0|max:100'
        ]);

        $game = Game::findOrFail($id);
        $game->update($validated);

        return redirect()->route('game.create')->with('success', 'Game berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('game.create')->with('success', 'Game berhasil dihapus!');
    }


    // Function to retrieve quiz data via AJAX
    public function data($id)
    {
        $quiz = Game::findOrFail($id);
        $questions = [];

        foreach ($quiz->getPertanyaans() as $q) {
            $answers = [];
            foreach ($q->getJawabans() as $a) {
                $answers[] = $a->title; // Ambil teks jawaban
            }

            // Ubah ke format yang sesuai
            $questions[] = [
                $q->title => $answers // Gunakan atribut 'text' dari pertanyaan
            ];
        }

        return response()->json([
            'data' => $questions,
            'time' => $quiz->time,
        ]);
    }



    public function save(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = $request->except('_token');


            $newData = [];
            foreach ($data as $key => $value) {
                $newKey = str_replace('_', ' ', $key); // Ganti underscore dengan spasi
                $newData[$newKey] = $value;
            }

            $questions = []; // Array untuk menyimpan detail pertanyaan
            foreach (array_keys($newData) as $key) {
                $question = Pertanyaan::where('title', $key)->first();
                if ($question) {
                    // Menyimpan objek pertanyaan ke dalam array
                    $questions[] = $question;
                }
            }

            $score = 0;
            $quiz = Game::findOrFail($id);
            $multiplier = 100 / $quiz->number_of_questions;
            $results = [];
            $correct_answer = null;

            foreach ($questions as $q) {
                $title =  str_replace(' ', '_', $q->title);
                $a_selected = $request->input($title);

                if (!empty($a_selected)) {
                    $question_answers = Jawaban::where('pertanyaan_id', $q->id)->get();
                    foreach ($question_answers as $a) {
                        if ($a_selected == $a->title && $a->correct) {
                            $score++; // Menambah skor jika jawaban benar
                            $correct_answer = $a->title;
                        } elseif ($a->correct) {
                            $correct_answer = $a->title; // Menyimpan jawaban benar untuk referensi
                        }
                    }
                    $results[] = [strval($q) => ['correct_answer' => $correct_answer, 'answered' => $a_selected]];
                } else {
                    $results[] = [strval($q) => 'not answered'];
                }
            }

            $final_score = $score * $multiplier;

            return response()->json([
                'passed' => $final_score >= $quiz->required_score_to_pass,
                'data' => $data,
                'questions' => $questions,
                'results' => $results,
                'score' => $final_score,
                'a' => $a_selected,
                't' => $title



            ]);
        }



        // Jika bukan AJAX request
        return response()->json(['message' => 'Invalid request'], 400);
    }
}
