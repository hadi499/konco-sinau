@extends('admin-layouts')

@section('content')
<div class="max-w-lg mx-auto mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Game</h2>

    <form action="{{ route('game.update', $game->id) }}" method="POST" class="space-y-4 bg-white shadow-md rounded-xl p-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Game</label>
            <input type="text" name="name" value="{{ old('name', $game->name) }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Topik</label>
            <input type="text" name="topic" value="{{ old('topic', $game->topic) }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Jumlah Pertanyaan</label>
            <input type="number" name="number_of_questions" value="{{ old('number_of_questions', $game->number_of_questions) }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Waktu (detik)</label>
            <input type="number" name="time" value="{{ old('time', $game->time) }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Nilai Minimal Lulus</label>
            <input type="number" name="required_score_to_pass" value="{{ old('required_score_to_pass', $game->required_score_to_pass) }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div class="flex justify-end gap-6">
             <a href="{{route('game.create')}}"
                class="bg-slate-300  px-5 py-2 rounded-lg hover:bg-slate-200 transition shadow-md">
                Cancel
            </a>
            <button type="submit"
                class=" bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                Simpan
            </button>

        </div>

    </form>
</div>
@endsection
