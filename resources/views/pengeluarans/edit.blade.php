<x-app-layout>
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold mb-4">Edit Pengeluaran</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengeluarans.update', $pengeluaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $pengeluaran->tanggal) }}"
                    class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Kegiatan</label>
                <select name="kegiatan_id" class="w-full border rounded p-2">
                    @foreach ($kegiatans as $kegiatan)
                        <option value="{{ $kegiatan->id }}"
                            {{ old('kegiatan_id', $pengeluaran->kegiatan_id) == $kegiatan->id ? 'selected' : '' }}>
                            {{ $kegiatan->nama_kegiatan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Sumber Dana</label>
                <select name="sumber_dana_id" class="w-full border rounded p-2">
                    @foreach ($sumberDanas as $sumber)
                        <option value="{{ $sumber->id }}"
                            {{ old('sumber_dana_id', $pengeluaran->sumber_dana_id) == $sumber->id ? 'selected' : '' }}>
                            {{ $sumber->nama_sumber }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Uraian</label>
                <textarea name="uraian" rows="3"
                    class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('uraian', $pengeluaran->uraian ?? '') }}</textarea>
            </div>


            <div class="mb-4">
                <label class="block text-gray-700">Nominal</label>
                <input type="number" name="nominal" value="{{ old('nominal', $pengeluaran->nominal) }}"
                    class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('pengeluarans.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
