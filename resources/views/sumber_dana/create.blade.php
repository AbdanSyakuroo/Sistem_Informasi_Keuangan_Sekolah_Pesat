<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/pesat.png" type="image/x-icon" />
    <title>Tambah Sumber Dana</title>
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
    <div class="w-full max-w-xl mx-auto bg-white bg-opacity-95 backdrop-blur-sm shadow-2xl rounded-3xl p-10 transform transition-all hover:scale-105 duration-300">
        <!-- Header Section with gradient -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-blue-800 tracking-tight">Tambah Sumber Dana</h1>
            <p class="text-gray-600 mt-2">Formulir untuk menambahkan data sumber dana baru.</p>
        </div>

        <!-- Contoh tampilan pesan error -->
        <!-- @if ($errors->any()) -->
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg shadow-sm">
            <ul class="list-none m-0 p-0 text-sm">
                <li>Nama sumber dana tidak boleh kosong.</li>
                <li>Nama sumber dana minimal 3 karakter.</li>
            </ul>
        </div>
        <!-- @endif -->

@if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Form utama -->
        <form action="{{ route('sumber_dana.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="nama_sumber" class="block text-sm font-semibold text-gray-700 mb-2">Nama Sumber Dana</label>
                <input 
                    type="text" 
                    id="nama_sumber" 
                    name="nama_sumber" 
                    placeholder="Contoh: Dana Hibah 2024"
                    value="{{ old('nama_sumber') }}" 
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200"
                >
            </div>

            <!-- Tombol aksi -->
            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3 mt-8">
                <a href="{{ route('sumber_dana.index') }}" class="w-full sm:w-auto px-8 py-3 bg-gray-200 text-gray-700 font-semibold rounded-full shadow-md hover:bg-gray-300 transition-colors duration-200 text-center">
                    Batal
                </a>
                <button type="submit" id="createBtn" class="w-full sm:w-auto px-8 py-3 font-semibold rounded-full text-white shadow-lg bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 transition-all duration-200 transform hover:scale-105">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</body>

<script>
        document.getElementById("createBtn").addEventListener("click", function() {
            this.disabled = true;
            this.innerText = "Memproses..."; // optional
            this.form.submit();
        });
</script>
</html>
