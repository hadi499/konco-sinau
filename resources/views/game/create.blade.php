@extends('admin-layouts')

@section('content')
<div class="max-w-lg mx-auto mt-10 ">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Buat Game Baru</h1>

    <form action="{{ route('game.store') }}" method="POST" class="space-y-4 bg-white shadow-md rounded-xl p-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Game</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label for="topic" class="block text-sm font-medium text-gray-700">Topik</label>
            <input type="text" name="topic" id="topic" value="{{ old('topic') }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label for="number_of_questions" class="block text-sm font-medium text-gray-700">Jumlah Soal</label>
            <input type="number" name="number_of_questions" id="number_of_questions" value="{{ old('number_of_questions') }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label for="time" class="block text-sm font-medium text-gray-700">Waktu (detik)</label>
            <input type="number" name="time" id="time" value="{{ old('time') }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <div>
            <label for="required_score_to_pass" class="block text-sm font-medium text-gray-700">Nilai Lulus</label>
            <input type="number" name="required_score_to_pass" id="required_score_to_pass" value="{{ old('required_score_to_pass') }}"
                class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
            Simpan
        </button>
    </form>

    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Daftar Game</h2>
        @foreach ($games as $game)
        <div class="flex items-center justify-between bg-gray-100 p-3 rounded-md mb-2">
            <div>
                <div class="font-semibold text-gray-800">{{ $game->name }}</div>
                <div class="text-sm text-gray-600">Topik: {{ $game->topic }}</div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('game.edit', $game->id) }}"
                    class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 text-sm">Edit</a>

                <form action="{{ route('game.destroy', $game->id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus game ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 text-sm">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
