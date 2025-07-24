@extends('layouts')

@section('scripts')
<script src="{{ asset('js/main.js') }}"></script>
@endsection

@section('content')
<div class="max-w-4xl mx-auto mt-20">
  

  <div class="text-center p-4">
    <h4 class="text-lg font-semibold">Selamat datang, </h4>
    <h6 class="text-sm text-gray-600">Klik salah satu menu untuk memulai !</h6>

    @foreach ($quizzes as $quiz)
    <div class="my-3">
      <button type="button"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition modal-button"
        data-id="{{$quiz->id}}"
        data-quiz="{{$quiz->name}}"
        data-questions="{{$quiz->number_of_questions}}"       
        data-time="{{$quiz->time}}"
        data-pass="{{$quiz->required_score_to_pass}}"
        data-modal-target="quizStartModal"
        data-modal-toggle="quizStartModal">
        {{$quiz->name}}
      </button>
    </div>
    @endforeach

  </div>

 
</div>

<!-- Modal -->
<div id="quizStartModal"
  class="hidden fixed inset-0 z-50 flex items-center justify-center p-4   bg-black/50">
  <div class="bg-blue-50 rounded-lg shadow-lg max-w-md w-full ">
    <div class="flex justify-between items-center border-b p-4">
      <h1 id="modal-title-confirm" class="text-lg font-semibold"></h1>
      <button type="button" class="text-gray-500 hover:text-gray-700" data-modal-hide="quizStartModal">
        ✕
      </button>
    </div>
    <div class="p-4" id="modal-body-confirm"></div>
    <div class="flex justify-end space-x-2 border-t p-4">
      <button type="button"
        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400"
        data-modal-hide="quizStartModal">Close</button>
      <button type="button" id="start-button"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Start</button>
    </div>
  </div>
</div>
@endsection
