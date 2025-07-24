@extends('layouts')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6 mt-24 mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $note->title }}</h1>

    @if($note->image)
        <img src="{{ asset('storage/' . $note->image) }}" 
             alt="{{ $note->title }}" 
             class="w-full h-64 object-cover rounded-lg mb-4">
    @endif

    <div class="text-gray-700 leading-relaxed text-lg">
        {!! $note->content !!}
    </div>

    <a href="{{ route('student.note') }}" 
       class="inline-block mt-6 text-blue-600 hover:text-blue-800">
        ← Kembali ke Note
    </a>
</div>
@endsection
