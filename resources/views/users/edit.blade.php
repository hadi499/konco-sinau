@extends('admin-layouts')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="w-full border border-slate-300  rounded p-2 focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4 relative">
            <label class="block text-gray-700 font-semibold mb-2">Password (Kosongkan jika tidak diganti)</label>
            <input type="password" id="password" name="password" class="w-full border border-slate-300 rounded p-2 focus:ring focus:ring-blue-200">
             <button type="button" onclick="togglePassword('password', this)"
          class="absolute right-3 top-10 text-blue-600 focus:outline-none">
          <i class="fa-solid fa-eye"></i>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Role</label>
            <select name="role" class="w-full border-gray-300 rounded p-2">
                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="flex justify-end gap-4">
          <a href="{{ route('users.index') }}" class="bg-slate-200 text-slate-700 px-4 py-2 rounded hover:bg-blue-600">Batal</a>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
          

        </div>

    </form>
</div>

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
