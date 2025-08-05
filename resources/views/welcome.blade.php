<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Sistem Keuangan Sekolah</title>
    @vite('resources/css/app.css') {{-- Pastikan Vite aktif --}}
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    {{-- Navbar --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/pesat.png') }}" alt="Logo" class="h-10 w-auto">
                <span class="text-xl font-semibold text-blue-700 tracking-wide">Sistem Keuangan Sekolah</span>
            </div>
            <div>
                <a href="{{ route('login') }}" class="inline-block px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-full text-sm font-medium transition-all">
                    Login
                </a>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <main class="flex-1 flex items-center justify-center py-24 px-6">
        <div class="max-w-2xl text-center">
            <h1 class="text-5xl font-extrabold text-blue-800 mb-6 leading-tight">
                Selamat Datang di<br>
                <span class="text-yellow-500">Sistem Keuangan Sekolah</span>
            </h1>
            <p class="text-gray-600 text-lg mb-10">
                Aplikasi pengelolaan keuangan sekolah yang aman, transparan, dan efisien. Silakan login untuk mulai menggunakan sistem.
            </p>
            <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full text-base font-medium transition-all shadow-md">
                Masuk Sekarang
            </a>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="text-center text-sm text-gray-500 py-6 border-t">
        &copy; {{ date('Y') }} Sistem Keuangan Sekolah. All rights reserved.
    </footer>

</body>
</html>
