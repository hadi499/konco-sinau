@extends('layouts')

@section('content')
  <div class="flex justify-center mt-24 mb-8">
         <div class="w-full p-2 md:w-[400px]">     
            
            @foreach($notes as $note)
           
                <a href="{{ route('student.note.show', $note->id) }}">
                <div class="border border-indigo-600 text-sm font-semibold px-2 py-2 rounded-sm text-indigo-600 hover:bg-indigo-600 hover:text-white w-full text-center mb-3">
                 {{ $note->title }}
                </div>
                   
                </a>
            @endforeach
                
      
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-6 w-[400px] mx-auto">
        {{ $notes->links() }}
    </div>


@endsection