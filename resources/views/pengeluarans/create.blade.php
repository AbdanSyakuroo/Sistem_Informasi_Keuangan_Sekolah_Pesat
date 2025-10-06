<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/pesat.png" type="image/x-icon" />
    <title>Tambah Pengeluaran</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font "Inter" untuk tipografi yang modern -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <!-- Card container for the form -->
    <div class="w-full max-w-2xl mx-auto bg-white bg-opacity-95 backdrop-blur-sm shadow-2xl rounded-3xl p-10 transform transition-all duration-300">
        <!-- Header Section with gradient -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-blue-800 tracking-tight">Tambah Pengeluaran</h1>
             @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <p class="text-gray-600 mt-2">Formulir untuk mencatat pengeluaran baru.</p>
        </div>

        <!-- Contoh tampilan pesan error -->
        <!-- @if ($errors->any()) -->
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg shadow-sm">
            <ul class="list-none m-0 p-0 text-sm">
                <li>Tanggal tidak boleh kosong.</li>
                <li>Kegiatan harus dipilih.</li>
            </ul>
        </div>
        <!-- @endif -->

        <!-- Form utama -->
        <form action="{{ route('pengeluarans.store') }}" method="POST">
            @csrf 
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Field Tanggal -->
                <div class="mb-4 md:mb-0">
                    <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
                    <input 
                        type="date" 
                        id="tanggal" 
                        name="tanggal" 
                        value="{{ old('tanggal') }}"
                        class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200"
                    >
                </div>
                
                <!-- Field Nominal -->
                <div class="mb-4 md:mb-0">
                    <label for="nominal" class="block text-sm font-semibold text-gray-700 mb-2">Nominal</label>
                    <input 
                        type="number" 
                        id="nominal" 
                        name="nominal" 
                       value="{{ old('nominal') }}"
                        placeholder="Contoh: 150000"
                        class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200"
                    >
                </div>
            </div>

            <!-- Field Kegiatan -->
            <div class="mt-6">
                <label for="kegiatan_id" class="block text-sm font-semibold text-gray-700 mb-2">Kegiatan</label>
                <select 
                    id="kegiatan_id" 
                    name="kegiatan_id" 
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200"
                >
                    <option value="">-- Pilih Kegiatan --</option>
                    @foreach ($kegiatans as $kegiatan)
                        <option value="{{ $kegiatan->id }}" {{ old('kegiatan_id') == $kegiatan->id ? 'selected' : '' }}>
                            {{ $kegiatan->nama_kegiatan }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Field Sumber Dana -->
            <div class="mt-6">
                <label for="sumber_dana_id" class="block text-sm font-semibold text-gray-700 mb-2">Sumber Dana</label>
                <select 
                    id="sumber_dana_id" 
                    name="sumber_dana_id" 
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200"
                >
                    <option value="">-- Pilih Sumber Dana --</option>
                    @foreach ($sumberDanas as $sumber)
                        <option value="{{ $sumber->id }}"
                            {{ old('sumber_dana_id') == $sumber->id ? 'selected' : '' }}>
                            {{ $sumber->nama_sumber }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Field Uraian -->
            <div class="mt-6">
                <label for="uraian" class="block text-sm font-semibold text-gray-700 mb-2">Uraian</label>
                <textarea 
                    name="uraian" 
                    id="uraian"
                    rows="3"
                    placeholder="Contoh: Pembelian material renovasi gedung"
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200"
                >Pembelian material untuk renovasi gedung kantor pusat.</textarea>
            </div>

            <!-- Tombol aksi -->
            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3 mt-8">
                <a href="{{ route('pengeluarans.index') }}" class="w-full sm:w-auto px-8 py-3 bg-gray-200 text-gray-700 font-semibold rounded-full shadow-md hover:bg-gray-300 transition-colors duration-200 text-center">
                    Batal
                </a>
                <button type="submit" class="w-full sm:w-auto px-8 py-3 font-semibold rounded-full text-white shadow-lg bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 transition-all duration-200 transform hover:scale-105">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</body>
</html>
