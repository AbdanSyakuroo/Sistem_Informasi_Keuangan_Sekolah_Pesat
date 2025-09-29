<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        /* Styling untuk input saat ada error */
        .input-error {
            border-color: #ef4444; /* red-500 */
            box-shadow: 0 0 0 1px #ef4444;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    

    <!-- Card container for the form -->
    <div class="w-full max-w-lg mx-auto bg-white bg-opacity-95 backdrop-blur-sm shadow-2xl rounded-3xl p-10 transform transition-all hover:scale-100 duration-300">
        
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-blue-800 tracking-tight">Edit User</h1>
            <p class="text-gray-600 mt-2">Memperbarui data pengguna :{{ $user->name ?? '...' }}.</p>
        </div>

        <!-- Tampilan pesan error dari Laravel ($errors->any()) -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg shadow-sm">
                <ul class="list-disc list-inside m-0 p-0 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Form utama: Menggunakan method POST dengan @method('PUT') untuk update -->
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- 1. Nama Lengkap --}}
            <div class="mb-5">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Nama lengkap user"
                    {{-- Menggunakan old('name') jika ada error, jika tidak gunakan $user->name --}}
                    value="{{ old('name', $user->name ?? '') }}" 
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 
                    @error('name') input-error @enderror"
                >
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- 2. Email --}}
            <div class="mb-5">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Alamat email user"
                    value="{{ old('email', $user->email ?? '') }}" 
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 
                    @error('email') input-error @enderror"
                >
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            

            <hr class="my-8 border-gray-200">
            
            <p class="text-sm text-gray-500 mb-4 font-medium">
                Isi kolom <strong> Password Saat Ini</strong>, <strong>Password Baru</strong>, dan <strong>Konfirmasi Password Baru</strong>  jika Anda ingin mengganti password. Jika tidak, biarkan kosong.
            </p>

            {{-- 5. Password Baru (Opsional) --}}
            <div class="mb-5">
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan password baru (opsional)"
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 
                    @error('password') input-error @enderror"
                >
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- 6. Konfirmasi Password Baru --}}
            <div class="mb-5">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="Ulangi password baru"
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200"
                >
            </div>


            <!-- Tombol aksi -->
            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3 mt-8">
                <a href="{{ route('users.index') }}" class="w-full sm:w-auto px-8 py-3 bg-gray-200 text-gray-700 font-semibold rounded-full shadow-md hover:bg-gray-300 transition-colors duration-200 text-center">
                    Batal
                </a>
                <button type="submit" class="w-full sm:w-auto px-8 py-3 font-semibold rounded-full text-white shadow-lg bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 transition-all duration-200 transform hover:scale-105">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</body>
<script>
    console.log("Halaman Edit User dimuat. Kolom Password Saat Ini telah ditambahkan.");
</script>
</html>
