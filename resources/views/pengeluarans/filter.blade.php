<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Filter Pengeluaran</h1>

    <form action="{{ route('pengeluarans.bySumberDana') }}" method="GET" class="bg-white shadow-md rounded p-4">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Sumber Dana</label>
            <select name="sumber_dana_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Sumber Dana --</option>
                @foreach($sumberDanas as $sumber)
                    <option value="{{ $sumber->id }}">{{ $sumber->nama_sumber }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="w-full border rounded p-2">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Tampilkan
            </button>
        </div>
    </form>
</div>
</x-app-layout>
