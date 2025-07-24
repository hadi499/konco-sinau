@extends('admin-layouts')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">📩 Daftar Pesan</h1>



    <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700">
                    <th class="py-3 px-4 font-semibold border-b">Nama</th>
                    <th class="py-3 px-4 font-semibold border-b">Email</th>
                    <th class="py-3 px-4 font-semibold border-b">Pesan</th>
                    <th class="py-3 px-4 font-semibold border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($messages as $message)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4 border-b">{{ $message->name }}</td>
                    <td class="py-3 px-4 border-b">{{ $message->email }}</td>
                    <td class="py-3 px-4 border-b">{{ $message->message }}</td>
                    <td class="py-3 px-4 border-b text-center">
                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">
                        Belum ada pesan masuk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
