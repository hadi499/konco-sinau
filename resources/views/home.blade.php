@extends('layouts')

@section('content')
<div class="max-w-5xl mx-auto text-xl text-center p-4 mt-20">
     
    <h1 class="text-4xl font-extrabold text-blue-700 tracking-wide drop-shadow-md mb-4">
        Konco <span class="text-yellow-500">Sinau</span>
    </h1>
    <p class="text-xl font-semibold text-gray-700 mb-8">
        Tempat belajar <span class="text-blue-600">Matematika</span>, 
        <span class="text-green-600">Bahasa Inggris</span>, dan 
        <span class="text-purple-600">Komputer</span>
    </p>

    <!-- 3 Images -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 p-2 shadow-lg rounded-lg">
        <div class="bg-white shadow-lg rounded-lg  overflow-hidden hover:scale-110 transition-transform duration-300">
            <img src="{{ asset('images/1.webp') }}" alt="Matematika" class="w-full h-72 object-cover transition-all duration-500 blur-md" onload="this.classList.remove('blur-md')">
          
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-110 transition-transform duration-300">
            <img src="{{ asset('images/2.webp') }}" alt="Bahasa Inggris" class="w-full h-72 object-cover transition-all duration-500 blur-md" onload="this.classList.remove('blur-md')">
           
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-110 transition-transform duration-300">
            <img src="{{ asset('images/3.webp') }}" alt="Komputer" class="w-full h-72 object-cover transition-all duration-500 blur-md"  onload="this.classList.remove('blur-md')">
           
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-110 transition-transform duration-300">
            <img src="{{ asset('images/4.webp') }}" alt="Komputer" class="w-full h-72 object-cover transition-all duration-500 blur-md" onload="this.classList.remove('blur-md')">
           
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-110 transition-transform duration-300">
            <img src="{{ asset('images/5.webp') }}" alt="Komputer" class="w-full h-72 object-cover transition-all duration-500 blur-md"  onload="this.classList.remove('blur-md')" >
           
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-110 transition-transform duration-300">
            <img src="{{ asset('images/6.webp') }}" alt="Komputer" class="w-full h-72 object-cover transition-all duration-500 blur-md"  onload="this.classList.remove('blur-md')">
           
        </div>
    </div>

    <!-- Join Button -->
    <div class="flex justify-center">
        <a href="{{route('join')}}">
            <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-400 text-white text-lg font-bold rounded-full shadow-lg hover:from-blue-500 hover:to-blue-300 transition-all duration-300">
                Join Sekarang
            </button>

        </a>
    </div>
    <div class="flex justify-center flex-col gap-4 mt-8">
          <h2 class="mb-4 font-bold text-2xl text-center text-red-500 tracking-wider" 
            style="text-shadow: 2px 2px 5px rgba(239,68,68,0.8)">
            Free App
         </h2>
        <a href="{{route('game.index')}}">
            <button class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-400 text-white text-lg font-bold rounded-full shadow-lg hover:from-red-500 hover:to-red-300 transition-all duration-300">
                Game Asah Otak Anak
            </button>

        </a>
        <a href="{{route('seribuhari')}}">
            <button class="px-6 py-3 bg-gradient-to-r from-orange-600 to-orange-400 text-white text-lg font-bold rounded-full shadow-lg hover:from-orange-500 hover:to-orange-300 transition-all duration-300">
                Seribu Hari App
            </button>

        </a>
    </div>
    <div class="mt-8 text-lg italic">
        <p class="font-semibold">Seberapa bagus anda, anak anda atau keponakan anda dalam berhitung ? </p>
        <p class="font-semibold">coba cari tahu dengan <span class="text-red-600"><a href="{{route('game.index')}}">Game Asah Otak Anak</a></span></p>
    </div>

    <div class="text-gray-600 mt-8 border border-slate-200 bg-blue-50 shadow-lg p-4 rounded-lg mb-8 mx-auto  w-full md:w-[600px] ">        
        <div class="text-xl italic ">
          Hidup adalah kompetisi, <br>
          <span class="text-green-600">yang menang jangan sombong</span>,  
          <span class="text-red-600">yang kalah jangan putus asa.</span>

        </div>
    </div>

   

</div>
@endsection
