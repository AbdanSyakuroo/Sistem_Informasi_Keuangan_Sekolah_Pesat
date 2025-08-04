<x-app-layout>
    <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Daftar Pengeluaran</h1>
            <a href="{{ route('pengeluarans.create') }}" 
               class="bg-blue-500 text-black px-4 py-2 rounded">Tambah</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Kegiatan</th>
                    <th class="px-4 py-2">Sumber Dana</th>
                    <th class="px-4 py-2">Uraian</th>
                    <th class="px-4 py-2">Nominal</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengeluarans as $key => $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $pengeluarans->firstItem() + $key }}</td>
                        <td class="px-4 py-2">{{ $item->tanggal }}</td>
                        <td class="px-4 py-2">{{ $item->kegiatan->kode_kegiatan }}</td>
                        <td class="px-4 py-2">{{ $item->sumberDana->nama_sumber }}</td>
                        <td class="px-4 py-2">{{ $item->uraian }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('pengeluarans.edit', $item->id) }}" 
                               class="text-blue-600">Edit</a>
                            <form action="{{ route('pengeluarans.destroy', $item->id) }}" 
                                  method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 ml-2" 
                                        onclick="return confirm('Hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $pengeluarans->links() }}
        </div>
    </div>
</x-app-layout>