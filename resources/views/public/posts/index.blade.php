@extends('layouts') {{-- Sesuaikan dengan layout publik Anda --}}

@section('content')
<div class="max-w-6xl mx-auto mt-24 px-4">

    {{-- Search & Filter --}}
    <form action="{{ route('public.posts.index') }}" method="GET" class="mb-6 flex space-x-2">
        <input type="text" name="search" placeholder="Cari post..."
               value="{{ request('search') }}"
               class="border-gray-300 p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg shadow-sm w-full">

        <select name="category"
                class="border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg shadow-sm">
            <option value="">Semua Kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Cari
        </button>
    </form>

    {{-- Grid Card --}}
    @if($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition">
                @if($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}" 
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                        Tidak ada gambar
                    </div>
                @endif

                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">
                        <a href="{{ route('public.posts.show', $post->slug) }}" class="hover:text-blue-600">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-sm text-gray-500 mb-2">
                        {{ $post->category->name ?? '-' }} • {{ $post->created_at->format('d M Y') }}
                    </p>
                   
                    <a href="{{ route('public.posts.show', $post->slug) }}"
                       class="inline-block text-blue-600 hover:underline text-sm font-medium">
                        Baca selengkapnya →
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4 text-sm">
    {{-- Previous --}}
    {{$posts->links()}}
</div>

    @else
        <p class="text-center text-gray-500">Tidak ada postingan ditemukan.</p>
    @endif
</div>
@endsection
