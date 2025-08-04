<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Daftar Kegiatan</h1>
            <a href="{{ route('kegiatans.create') }}" 
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
                    <th class="px-4 py-2">Kode</th>
                    <th class="px-4 py-2">Nama Kegiatan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatans as $key => $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $kegiatans->firstItem() + $key }}</td>
                        <td class="px-4 py-2">{{ $item->kode_kegiatan }}</td>
                        <td class="px-4 py-2">{{ $item->nama_kegiatan }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('kegiatans.edit', $item->id) }}" 
                               class="text-blue-600">Edit</a>
                            <form action="{{ route('kegiatans.destroy', $item->id) }}" 
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
            {{ $kegiatans->links() }}
        </div>
    </div>
</x-app-layout>
