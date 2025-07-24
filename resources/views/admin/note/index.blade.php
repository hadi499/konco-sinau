@extends('admin-layouts')

@section('content')
<div class="max-w-4xl mx-auto mt-8 px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Notes</h1>

 <div class="mb-8">
    <a href="{{ route('note.create') }}" 
       class="inline-flex items-center justify-center px-4 py-2 border text-md font-semibold shadow-md rounded-md bg-amber-200 hover:bg-amber-300">
        create note
    </a>
</div>
    {{-- Grid Card --}}
    <div class="flex justify-center flex-col w-[400px ] gap-3 ">
        @foreach($notes as $note)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
           
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800 ">{{ $note->title }}</h2>
                
                <div class="flex items-center gap-4">
                    <a href="{{ route('note.show', $note->id) }}"
                       class="inline-block hover:underline text-blue-600 hover:text-blue-800 text-sm font-medium">
                       Detail
                    </a>
                    <a href="{{ route('note.edit', $note->id) }}" 
                               class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('note.destroy', $note->id) }}" 
                                  method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $notes->links() }}
    </div>
</div>

@endsection