@extends('admin-layouts') 

@section('content')
<div class="max-w-4xl mx-auto mt-8 p-6 bg-white rounded-xl shadow-md">

  <form action="{{ route('results.deleteAll') }}" method="POST" 
      onsubmit="return confirm('Yakin mau hapus semua score?');">
    @csrf
    @method('DELETE')
    <button type="submit" 
            class="mb-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
        Hapus Semua Score
    </button>
</form>
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">{{ $title }}</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Nama User</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Score</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($results as $index => $result)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-sm font-medium text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $result->user->username ?? 'Tidak diketahui' }}</td>
                        <td class="px-4 py-3 text-sm font-bold text-green-600">{{ $result->score }}</td>
                        <td class="px-4 py-3 text-sm text-gray-500">
                            {{ $result->created_at->format('d M Y H:i') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
