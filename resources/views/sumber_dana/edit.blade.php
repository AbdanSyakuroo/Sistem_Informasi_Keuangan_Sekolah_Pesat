<x-app-layout>
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold mb-4">Edit Sumber Dana</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sumber_dana.update', $sumber_dana->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Nama Sumber Dana</label>
                <input type="text" name="nama_sumber" 
                       value="{{ old('nama_sumber', $sumber_dana->nama_sumber) }}" 
                       class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            

            <div class="flex justify-end space-x-2">
                <a href="{{ route('sumber_dana.index') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" 
                        class="bg-blue-600 text-black px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
