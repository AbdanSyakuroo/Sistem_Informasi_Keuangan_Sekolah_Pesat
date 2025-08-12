<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-[#004AAD] tracking-wide border-b-4 border-[#FFD700] pb-2">
        Filter Pengeluaran
    </h1>

    <form action="{{ route('pengeluarans.bySumberDana') }}" method="GET" 
          class="bg-gradient-to-br from-[#004AAD] to-[#003377] shadow-lg rounded-xl p-8 border border-[#003377] space-y-6">
        @csrf

        {{-- Sumber Dana --}}
        <div>
            <label class="block text-sm font-semibold text-white mb-2 uppercase tracking-wider">
                Sumber Dana
            </label>
            <select name="sumber_dana_id" 
                    class="w-full rounded-lg border-0 p-3 text-gray-800 focus:ring-4 focus:ring-[#FFD700] focus:outline-none bg-[#FFD700] font-medium shadow-sm"
                    required>
                <option value="">-- Pilih Sumber Dana --</option>
                @foreach($sumberDanas as $sumber)
                    <option value="{{ $sumber->id }}">{{ $sumber->nama_sumber }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal Mulai --}}
        <div>
            <label class="block text-sm font-semibold text-white mb-2 uppercase tracking-wider">
                Tanggal Mulai
            </label>
            <input type="date" name="tanggal_mulai" 
                   class="w-full rounded-lg border-0 p-3 text-gray-800 focus:ring-4 focus:ring-[#FFD700] focus:outline-none bg-[#FFD700] font-medium shadow-sm">
        </div>

        {{-- Tanggal Selesai --}}
        <div>
            <label class="block text-sm font-semibold text-white mb-2 uppercase tracking-wider">
                Tanggal Selesai
            </label>
            <input type="date" name="tanggal_selesai" 
                   class="w-full rounded-lg border-0 p-3 text-gray-800 focus:ring-4 focus:ring-[#FFD700] focus:outline-none bg-[#FFD700] font-medium shadow-sm">
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end">
            <button type="submit" 
                    class="px-6 py-3 rounded-lg shadow-md font-bold text-[#004AAD] bg-[#FFD700] hover:bg-yellow-400 transition-all duration-300 transform hover:scale-105">
                Tampilkan
            </button>
        </div>
    </form>
</div>
</x-app-layout>
