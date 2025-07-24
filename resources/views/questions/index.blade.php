@extends('admin-layouts')

@section('content')
<div class="flex justify-center mt-20">
    <div class="w-full max-w-sm">
        <!-- Tombol Add Question -->
        <div class="mb-4">
            <a href="{{ route('question.create') }}" 
               class="border border-blue-500 text-blue-500 text-xs px-2 py-1 rounded hover:bg-blue-50">
                ADD QUESTION GAME
            </a>
        </div>

        <!-- Daftar Pertanyaan -->
        <div>
            @foreach($questions as $q)
            <div class="mb-2 flex items-center">
                <span class="mr-2 font-medium">{{ $loop->iteration }}.</span>
                <span class="text-gray-700">{{ $q->title }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
