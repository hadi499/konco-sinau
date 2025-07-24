@extends('admin-layouts')

@section('content')
<div class="max-w-xl mx-auto p-6 border bg-white border-slate-400 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Catatan</h1>

    <form action="{{ route('note.update', $note->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ old('title', $note->title) }}"
                   class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700">Gambar</label>
            @if($note->image)
                <img src="{{ asset('storage/'.$note->image) }}" class="w-32 h-32 object-cover mb-2 rounded">
            @endif
            <input type="file" name="image"  class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700">Konten</label>
              <input id="content" type="hidden" name="content" value="{{ old('content', $note->content) }}">
            <trix-editor input="content"></trix-editor>
            @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end gap-6">
            <a href="{{route('note.index')}}"  class="bg-slate-300 hover:bg-slate-200 text-slate-800 px-4 py-2 rounded-lg">Cancel</a>
             <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Update</button>
        </div>

       
    </form>
</div>

<script>
    

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    });

    

</script>
@endsection
