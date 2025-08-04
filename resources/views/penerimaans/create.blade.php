<x-app-layout>
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold mb-4">Tambah Penerimaan</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penerimaans.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" 
                       value="{{ old('tanggal') }}" 
                       class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Uraian</label>
                <input type="text" name="uraian" 
                       value="{{ old('uraian') }}" 
                       class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Nominal</label>
                <input type="number" name="nominal" 
                       value="{{ old('nominal') }}" 
                       class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('penerimaans.index') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
