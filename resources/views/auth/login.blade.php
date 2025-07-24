@extends('layouts')

@section('content')
<!-- resources/views/livewire/register-form.blade.php -->
<div class="flex items-center justify-center mt-20 p-2">
  <div class="w-full max-w-md ">

    @if (session()->has('loginError'))
      <div class="flex items-center justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span>{{ session('loginError') }}</span>
          <button type="button" class="text-red-700 hover:text-red-900" onclick="this.parentElement.remove()">
              ✕
          </button>
      </div>
    @endif


 

    <h1 class="text-4xl font-extrabold text-blue-700 tracking-wide text-center drop-shadow-md mb-6">
           Konco <span class="text-yellow-500">Sinau</span>
    </h1>
    <!-- Form Start -->
    <form action="/login" method="POST" class="bg-white rounded-lg shadow-lg p-8 border">
      @csrf
      
      <h2 class="text-2xl font-bold text-center text-blue-800 mb-6">Login</h2>
      <!-- Email -->
      <div class="mb-4">
        <label for="username" class="block text-blue-700 font-semibold mb-2">Username</label>
        <input type="text" id="username" name="username"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="{{ old('username') }}">
        @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Password -->
      <div class="mb-4 relative">
        <label for="password" class="block text-blue-700 font-semibold mb-2">Password</label>
        <input type="password" id="password" name="password" autocomplete="off"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
           <button type="button" onclick="togglePassword('password', this)"
          class="absolute right-3 top-10 text-blue-600 focus:outline-none">
          <i class="fa-solid fa-eye"></i>
        </button>
        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>


      <!-- Submit Button -->
      <div class="flex items-center justify-center">
        <button type="submit"
          class="bg-blue-600 w-full text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Login
        </button>
      </div>
      <div class="mt-3">
        <p>Belum punya akun? <a href="/register" class="text-sm text-blue-600 font-semibold">daftar</a></p>
      </div>
    </form>
    <!-- Form End -->
  </div>
</div>

<!-- ✅ Script Toggle Password -->
<script>
  function togglePassword(id, btn) {
    const input = document.getElementById(id);
    const icon = btn.querySelector("i");
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>
@endsection