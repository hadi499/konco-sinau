@extends('layouts')

@section('scripts')
<script src="{{ asset('js/quiz.js') }}"></script>
@endsection

@section('content')
<div class="max-w-4xl mx-auto mt-20">

    <div class="flex justify-center gap-3 my-4">
        <div class="mt-4"> 
            <a href="{{ route('game.index') }}" class="border border-gray-800 text-gray-800 px-4 py-2 rounded hover:bg-gray-100">
                Menu Quiz
            </a>
        </div>
        <div id="start-lagi" class="mt-4"></div>
    </div>
    
    <div class="flex justify-between items-center border-b border-gray-500 p-3">
        <div>
            <h3 class="text-xl font-semibold">{{ $quiz->name }}</h3>           
            <h6 class="mb-3 text-gray-600">Score to pass: {{ $quiz->required_score_to_pass }}</h6>
        </div>
    
        <div class="flex justify-center">
            <div id="wrap-timer" class="border border-blue-500 shadow bg-gray-100 rounded w-16">
                <div id="timer-box" class="text-center text-lg font-bold mt-2 mb-1"></div>
            </div>
        </div>
    </div>
    
    <div class="flex justify-center mt-5">
        <div class="w-full md:w-2/3 mt-3">
            <form id="quiz-form">
                @csrf
    
                <div id="quiz-box" class="flex justify-evenly flex-wrap"></div>
                <div class="flex justify-end mr-4">

                    <button type="submit" class="border border-blue-500 text-blue-500 px-4 py-2 rounded mt-3 ms-3 hover:bg-blue-50">
                        Submit
                    </button>

                </div>
    
            </form>
    
            <div id="score-box" class="text-3xl font-bold mb-2 text-center"></div>
            <div id="result-box" class="my-5 text-center flex flex-col items-center justify-center"></div>
        </div>
    </div>

</div>


@endsection
