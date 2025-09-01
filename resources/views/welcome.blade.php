<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Sistem Keuangan Sekolah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css') {{-- Pastikan Vite aktif --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col antialiased">

    {{-- Navbar --}}
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                    <span class="text-2xl font-semibold text-gray-800 tracking-tight">FINS<span class="text-indigo-600">chool</span></span>
            </div>
            <div>
                <a href="{{ route('register') }}" class="inline-block px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-base font-medium transition-all duration-300 ease-in-out shadow-md hover:shadow-lg">
                    Registrasi
                </a>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <main class="flex-1 flex items-center justify-center py-20 px-6 lg:px-8 bg-gradient-to-br from-indigo-50 to-white">
        <div class="max-w-3xl text-center p-10 bg-white rounded-xl shadow-2xl transform hover:scale-105 transition-transform duration-500 ease-in-out">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                Kelola Keuangan <br class="hidden sm:inline"> Sekolah Anda dengan <span class="text-indigo-600">Mudah & Transparan</span>
            </h1>
            <p class="text-gray-600 text-lg mb-12 max-w-xl mx-auto">
                Website pengelolaan keuangan sekolah yang modern, aman, dan efisien.
            </p>
            <a href="{{ route('login') }}" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full text-lg font-semibold transition-all duration-300 ease-in-out shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                Masuk ke Sistem
            </a>
            <p class="mt-8 text-sm text-gray-500">Sistem Keuangan Terpercaya untuk Masa Depan Pendidikan</p>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="text-center text-sm text-gray-500 py-6 border-t border-gray-200 bg-white">
        &copy; {{ date('Y') }} Sistem Keuangan Sekolah. Dibuat dengan ❤️ di Bogor, Indonesia.
    </footer>

</body>
</html>