@extends('admin-layouts')

@section('content')

<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-8 mb-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Buat Post Baru</h2>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        {{-- Title --}}
        <div>
            <label for="title" class="block text-gray-700 font-medium mb-1">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="w-full p-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg shadow-sm">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div>
            <label for="category_id" class="block text-gray-700 font-medium mb-1">Kategori</label>
            <select name="category_id" id="category_id"
                class="w-full p-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg shadow-sm">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image --}}
        <div>
            <label for="image" class="block text-gray-700 font-medium mb-1">Gambar (Opsional)</label>
            <input type="file" name="image" id="image"
                 class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <img id="preview" class="mt-3 hidden w-32 rounded-lg shadow">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Content (Trix Editor) --}}
        <div>
            <label for="content" class="block text-gray-700 font-medium mb-1">Konten</label>
            <input id="content" type="hidden" name="content" value="{{ old('content') }}">
            <trix-editor input="content"></trix-editor>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="flex justify-end gap-6">
             <a href="{{route('posts.index')}}"
                class="bg-slate-300  px-5 py-2 rounded-lg hover:bg-slate-200 transition shadow-md">
                Cancel
            </a>
            <button type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow-md">
                Simpan
            </button>
        </div>
    </form>
</div>

{{-- Script Preview Gambar --}}
<script>
    document.getElementById('image').addEventListener('change', function (e) {
        const [file] = this.files;
        const preview = document.getElementById('preview');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    });

    // Mencegah upload file di Trix
    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    });
</script>

@endsection
