@extends('admin-layouts')

@section('content')
<div class="flex justify-center mt-16">
    <div class="w-full flex flex-col md:flex-row max-w-4xl gap-6 p-4">
        
        {{-- Kolom kiri (Form) --}}
        <div class="w-full md:w-1/2">           

            <form action="{{ route('question.store') }}" method="POST" class="border py-5 px-6 rounded shadow bg-white">
                @csrf

                <h5 class="text-center text-lg font-semibold mb-4">Add Question</h5>

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
                            <option value="{{ $quiz->id }}">{{ $quiz->name }} - {{ $quiz->topic }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pertanyaan -->
                    <div class="mb-3">
                        <label for="title" class="block text-sm font-medium mb-1">Title</label>
                        <input type="text" name="title" id="title"
                               class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                               placeholder="Masukkan pertanyaan" required>
                    </div>
                </div>

                <!-- Jawaban (dynamic) -->
                <div id="answers">
                    <p class="font-semibold mb-2">Jawaban</p>

                    @for ($i = 0; $i < 3; $i++)
                    <div class="answer mb-3 flex items-center gap-4">
                        <input type="text" name="answers[{{ $i }}][title]"
                               class="border border-gray-300 rounded px-2 py-1 w-24 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                               required autocomplete="off">

                        <div class="flex items-center gap-2">
                            <input class="text-blue-600 focus:ring-blue-400" 
                                   type="radio" 
                                   name="answers[{{ $i }}][correct]" 
                                   id="correct_{{ $i }}_true" 
                                   value="1" required>
                            <label for="correct_{{ $i }}_true" class="text-sm">Benar</label>
                        </div>

                        <div class="flex items-center gap-2">
                            <input class="text-blue-600 focus:ring-blue-400" 
                                   type="radio" 
                                   name="answers[{{ $i }}][correct]" 
                                   id="correct_{{ $i }}_false" 
                                   value="0" required>
                            <label for="correct_{{ $i }}_false" class="text-sm">Salah</label>
                        </div>
                    </div>
                    @endfor
                </div>

                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-3 w-full">
                    Simpan
                </button>
            </form>
        </div>

        {{-- Kolom kanan (Daftar Pertanyaan) --}}
        <div class="w-full md:w-1/2 bg-white border rounded shadow p-4 h-fit">
            <h5 class="text-lg font-semibold mb-3">Daftar Pertanyaan</h5>
            @foreach($questions as $q)
            <div class="mb-2 flex items-center">
                <span class="mr-2 font-medium">{{ $loop->iteration }}.</span>
                <span class="text-gray-700 hover:text-blue-600"><a href="{{ route('question.edit', $q->id) }}">{{ $q->title }}</a></span>
                <span class="text-gray-700  mx-6">{{ $q->game->name }}</span>
               
                    <form action="{{ route('question.delete', $q->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" text-red-600 mb-1 text-lg font-bold  cursor-pointer">x</button>
                    </form>
                </span>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
