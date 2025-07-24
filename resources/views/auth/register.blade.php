@extends('layouts')

@section('content')

<!-- ✅ Tambahkan FontAwesome CDN -->


<div class="flex flex-col items-center justify-center mt-20 p-2">
  <div class="w-full max-w-md ">
    <h1 class="text-4xl font-extrabold text-blue-700 tracking-wide text-center drop-shadow-md mb-6">
      Konco <span class="text-yellow-500">Sinau</span>
    </h1>
    
    <!-- Form Start -->
    <form action="/register" method="POST" class="bg-white rounded-lg shadow-lg p-8 border">
      @csrf
      <h2 class="text-2xl font-bold text-center text-blue-800 mb-6 mt-3">Create an Account</h2>

      <!-- Username -->
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
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">
        <button type="button" onclick="togglePassword('password', this)"
          class="absolute right-3 top-10 text-blue-600 focus:outline-none">
          <i class="fa-solid fa-eye"></i>
        </button>
        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mb-6 relative">
        <label for="password_confirmation" class="block text-blue-700 font-semibold mb-2">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="off"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">
        <button type="button" onclick="togglePassword('password_confirmation', this)"
          class="absolute right-3 top-10 text-blue-600 focus:outline-none">
          <i class="fa-solid fa-eye"></i>
        </button>
        @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Submit Button -->
      <div class="flex items-center justify-center">
        <button type="submit"
          class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Register
        </button>
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
