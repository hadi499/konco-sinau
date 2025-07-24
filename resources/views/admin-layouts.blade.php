<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  {{-- trix --}}
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  @vite('resources/css/app.css')

  <title>{{ $title ?? 'Dashboard Admin' }}</title>
  <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

</head>

<body class="bg-blue-50">

  @include('partials.admin-navbar')


  <div class="relative">
    @if (session()->has('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)"
      class="absolute top-2 right-4 z-50 bg-green-200 w-2/3 md:w-[400px]  border border-green-400 px-4 py-6 rounded col-span-6"
      role="alert">
      {{ session('success') }}
      <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false" aria-label="Close">
        <span class="text-green-700">&times;</span>
      </button>
    </div>
    @endif

  </div>


  <div class="mt-5">

    @yield('content')

  </div>


</body>

</html>