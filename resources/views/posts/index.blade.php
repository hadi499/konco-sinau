@extends('admin-layouts')

@section('content')

<div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Post</h2>
        <a href="{{ route('posts.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow">
            + Tambah Post
        </a>
    </div>

    {{-- Search & Filter --}}
    <form action="{{ route('posts.index') }}" method="GET" class="mb-4 flex space-x-2">
        {{-- Search --}}
        <input type="text" name="search" placeholder="Cari post..."
               value="{{ request('search') }}"
               class="border-gray-300 p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg shadow-sm w-full">

        {{-- Filter kategori --}}
        <select name="category" 
                class="border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg shadow-sm">
            <option value="">Semua Kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        {{-- Tombol --}}
        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Cari
        </button>
        @if(request('search') || request('category'))
            <a href="{{ route('posts.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
               Reset
            </a>
        @endif
    </form>

    {{-- Tabel Post --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-100">
                <tr class="text-left">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Judul</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $index => $post)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $posts->firstItem() + $index }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('posts.show', $post->slug) }}" 
                              class="text-blue-600 hover:underline">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td class="px-4 py-2">{{ $post->category->name ?? '-' }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                           
                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 cursor-pointer text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                            Tidak ada post ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>

@endsection
