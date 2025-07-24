@extends('admin-layouts')


@section('content')
<div class="flex justify-center">
  <div>
    <div class="text-center text-xl font-semibold">Welcome, {{ Auth::user()->username }}</div>   
   
    <div class="flex flex-col gap-4 mt-6">
      <a href="{{route('note.index')}}">
        <div
          class="mt-3 text-center text-blue-700 py-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700 w-56">
         Notes

        </div>
      </a>
    </div>
    <div class="flex flex-col gap-4 mt-6">
      <a href="{{route('game.create')}}">
        <div
          class="mt-3 text-center text-blue-700 py-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700 w-56">
         Create Game
        </div>
      </a>
    </div>
    <div class="flex flex-col gap-4 mt-6">
      <a href="{{route('question.create')}}">
        <div
          class="mt-3 text-center text-blue-700 py-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700 w-56">
         Question of Game
        </div>
      </a>
    </div>
    <div class="flex flex-col gap-4 mt-6">
      <a href="{{route('posts.index')}}">
        <div
          class="mt-3 text-center text-blue-700 py-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700 w-56">
         Blog Posts
        </div>
      </a>
    </div>
    <div class="flex flex-col gap-4 mt-6">
      <a href="{{route('messages.index')}}">
        <div
          class="mt-3 text-center text-blue-700 py-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700 w-56">
        Messages
        </div>
      </a>
    </div>
    <div class="flex flex-col gap-4 mt-6">
      <a href="{{route('users.index')}}">
        <div
          class="mt-3 text-center text-blue-700 py-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700 w-56">
        Users
        </div>
      </a>
    </div>

  </div>

</div>
@endsection