@extends('admin-layouts')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
    <p class="text-gray-500 text-sm mb-6">
        Kategori: <span class="font-medium text-gray-700">{{ $post->category->name ?? '-' }}</span> 
        • {{ $post->created_at->format('d M Y') }}
    </p>

    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="rounded-lg mb-6 object-cover w-full h-80 shadow">
    @endif

    <div class="prose max-w-none">
        {!! $post->content !!}
    </div>

    <div class="mt-6">
        <a href="{{ route('posts.index') }}" 
           class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            ← Kembali
        </a>
    </div>
</div>
@endsection
