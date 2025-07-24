@extends('admin-layouts')

@section('content')
<div class="flex justify-center mt-16 ">
    <div class="w-full flex flex-col md:flex-row max-w-4xl gap-6 p-4 justify-center">
        
        {{-- Kolom kiri (Form) --}}
        <div class="w-full md:w-1/2 ">   

            <form action="{{ route('question.update', $question->id) }}" method="POST" class="border py-5 px-6 rounded shadow bg-white">
                @csrf

                <h5 class="text-center text-lg font-semibold mb-4">Edit Question</h5>

                <!-- Pilih Kuis -->
                <div class="mb-4">
                    <p class="font-semibold">Pertanyaan</p>

                    <div class="mb-3">
                        <label for="quiz_id" class="block text-sm font-medium mb-1">Pilih Kuis</label>
                        <select name="game_id" id="game_id" 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                required>
                            <option value="">Pilih kuis</option>
                            @foreach($quizzes as $quiz)
                            <option value="{{ $quiz->id }}" {{ $quiz->id == $question->game_id ? 'selected' : '' }}>
                                {{ $quiz->name }} - {{ $quiz->topic }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pertanyaan -->
                    <div class="mb-3">
                        <label for="title" class="block text-sm font-medium mb-1">Title</label>
                        <input type="text" name="title" id="title"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            value="{{ $question->title }}" required>
                    </div>
                </div>

                <!-- Jawaban -->
                <div id="answers">
                    <p class="font-semibold mb-2">Jawaban</p>

                    @foreach($question->jawabans as $index => $answer)
                    <div class="answer mb-3 flex items-center gap-4">
                        <input type="text" name="answers[{{ $answer->id }}][title]"
                            class="border border-gray-300 rounded px-2 py-1 w-24 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            value="{{ $answer->title }}" required autocomplete="off">

                        <div class="flex items-center gap-2">
                            <input class="text-blue-600 focus:ring-blue-400" 
                                type="radio" 
                                name="answers[{{ $answer->id }}][correct]" 
                                id="correct_{{ $index }}_true" 
                                value="1" {{ $answer->correct == 1 ? 'checked' : '' }}>
                            <label for="correct_{{ $index }}_true" class="text-sm">Benar</label>
                        </div>

                        <div class="flex items-center gap-2">
                            <input class="text-blue-600 focus:ring-blue-400" 
                                type="radio" 
                                name="answers[{{ $answer->id }}][correct]" 
                                id="correct_{{ $index }}_false" 
                                value="0" {{ $answer->correct == 0 ? 'checked' : '' }}>
                            <label for="correct_{{ $index }}_false" class="text-sm">Salah</label>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="flex justify-evenly gap-4">
                    <a href="{{route('question.create')}}"
                        class="bg-slate-300 text-slate-800 text-center px-4 py-2 rounded hover:bg-slate-400 mt-3 w-full">
                   Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-3 w-full">
                    Update
                </button>

                </div>

            </form>
        </div>
    </div>
</div>



@endsection