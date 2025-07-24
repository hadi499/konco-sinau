@extends('layouts')

@section('content')
<div class="flex justify-center min-h-screen mt-20">
  <div class="max-w-6xl mx-auto p-6">
      <div class="border border-slate-400 bg-slate-50 shadow-lg w-[500px] mx-auto px-8 py-3 rounded-md">
        <h1 class="text-2xl font-semibold mb-3">Syarat & ketentuan:</h1>
        <ol class="list-decimal text-lg space-y-2 italic">
          <li>Minimal Kelas 5 SD.</li>       
          <li>Maksimal Kelas 3 SMP.</li>
          <li>Lancar Membaca.</li>
          <li>Anak Balonggarut.</li>
          <li>Biaya les : Rp. 50.000 / bulan.</li>
          <li>Waktu les : 18.00 - 20.00 WIB ( Senin - Jum'at )</li>
        </ol>
      </div>

      <div class="mt-8">
        <div class="text-center mb-8 text-lg font-semibold">
          <p>Alamat: </p>
          <p>Desa Balonggarut Rt.05 Rw.03</p>
        </div>
        <div class="text-center mb-10 ">
          <p class="text-lg font-semibold">Contact Person: </p>
          <p class="text-lg font-semibold">Mas Hadi</p>
          <p class="text-lg italic">( hadi.rx99@gmail.com )</p>         
        </div>
      </div>

      <p class="text-md italic text-center font-semibold">*Bagi yang telah bergabung dapat username dan password.</p>

      <!-- ✅ Form Message -->
      <div class="mt-12 max-w-md mx-auto border bg-slate-50 border-slate-200  p-6 rounded-md shadow-lg mb-6">
          <h2 class="text-xl font-semibold mb-4 text-center text-slate-600">Kirim Pesan</h2>

          @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
                {{ session('success') }}
            </div>
          @endif

          <form action="{{ route('messages.store') }}" method="POST" class="space-y-4">
    @csrf

    {{-- Nama --}}
    <div class="space-y-2">
        <label class="block font-medium text-slate-600">Nama</label>
        <input type="text" 
               name="name" 
               value="{{ old('name') }}" 
               class="w-full border @error('name') border-red-500 @else border-slate-100 @enderror rounded p-2 shadow-md" 
               placeholder="nama..." 
               required>
        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Email --}}
    <div class="space-y-2">
        <label class="block font-medium text-slate-600">Email</label>
        <input type="email" 
               name="email" 
               value="{{ old('email') }}" 
               class="w-full border @error('email') border-red-500 @else border-slate-100 @enderror rounded p-2 shadow-md" 
               placeholder="email..." 
               required>
        @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Pesan --}}
    <div class="space-y-2">
        <label class="block font-medium text-slate-600">Pesan</label>
        <textarea name="message" 
                  rows="4" 
                  class="w-full border @error('message') border-red-500 @else border-slate-100 @enderror rounded p-2 shadow-md" 
                  placeholder="max 200 karakter..." 
                  required>{{ old('message') }}</textarea>
        @error('message')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-end mt-3">
        <button type="submit" class="border text-slate-700 border-slate-400 bg-slate-50 hover:bg-blue-50 px-4 py-2 rounded shadow-md">
            Kirim Pesan
        </button>
    </div>
</form>

      </div>
  </div>
</div>
@endsection
