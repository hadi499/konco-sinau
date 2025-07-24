@extends('layouts')

@section('content')
<div class="flex justify-center items-center min-h-screen ">
    <div class="bg-white shadow-lg rounded-2xl p-6 w-full max-w-4xl">
    <h1 class="text-2xl font-bold text-center text-gray-700 mb-4">
      Tabel Perkalian 1 - 9
    </h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      @for ($i = 1; $i <= 10; $i++)
        <div class="bg-gray-50 p-4 rounded-lg shadow">
          <h2 class="font-bold text-lg mb-2 text-gray-600">Perkalian {{ $i }}</h2>
          <ul class="space-y-1 text-gray-700">
            @for ($j = 1; $j <= 10; $j++)
              <li>{{ $i }} x {{ $j }} = {{ $i * $j }}</li>
            @endfor
          </ul>
        </div>
      @endfor
    </div>
  </div>
</div>
@endsection
