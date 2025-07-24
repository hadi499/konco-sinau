@extends('layouts')

@section('content')
<div class="flex justify-center min-h-screen mt-20">
  
        <div class="w-full max-w-md p-4">
                <h4 class="text-center text-xl font-semibold mb-5">Mencari 1000 Hari</h4>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('images/time.png') }}" alt="time" class="w-full">

                    <div class="p-4">
                        <p class="text-center font-bold mb-3">Masukkan tanggal:</p>
                        <div class="flex gap-2">
                            <input 
                                type="date" 
                                id="start-date" 
                                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                            <button 
                                type="button" 
                                onclick="findNextDate()" 
                                class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-900 transition"
                            >
                                Cari
                            </button>
                        </div>

                        <div class="mt-4">
                            <h5 id="next-date" class="text-center text-lg font-medium text-gray-700"></h5>
                        </div>
                    </div>
                </div>
     

</div>

<script>
  function findNextDate() {
  // Dapatkan tanggal yang diinput oleh pengguna
  const date = new Date(document.getElementById("start-date").value);
  console.log(date);

  // Tambahkan 7 hari ke tanggal tersebut
  date.setDate(date.getDate() + 999);

  // Tampilkan tanggal di elemen dengan ID "next-date"
  document.getElementById("next-date").innerHTML = date.toLocaleDateString(
    "id-ID",
    {
      day: "numeric",
      month: "long",
      year: "numeric",
    }
  );
}
</script>
@endsection
