<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/pesat.png" type="image/x-icon" />
    <title>Welcome - FINSchool ITXPRO</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css') {{-- Pastikan Vite aktif --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Custom responsive styles */
        @media (max-width: 640px) {
            .hero-title {
                font-size: 2rem;
                line-height: 1.2;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .hero-button {
                font-size: 1rem;
                padding: 0.75rem 1.5rem;
            }
            
            .hero-container {
                padding: 1.5rem;
            }
        }
        
        @media (min-width: 641px) and (max-width: 1024px) {
            .hero-title {
                font-size: 2.5rem;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col antialiased">

    {{-- Navbar --}}
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2 sm:space-x-4">
                {{-- Logo bisa ditambahkan di sini --}}
                <span class="text-xl sm:text-2xl font-semibold text-gray-800 tracking-tight">FINSchool<span class="text-indigo-600"> ITXPRO</span></span>
            </div>
            {{-- <div>
                <a href="{{ route('register') }}" class="inline-block px-4 sm:px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm sm:text-base font-medium transition-all duration-300 ease-in-out shadow-md hover:shadow-lg">
                    Registrasi
                </a>
            </div> --}}
        </div>
    </header>

    {{-- Hero Section --}}
    <main class="flex-1 flex items-center justify-center py-12 sm:py-16 lg:py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-indigo-50 to-white">
        <div class="hero-container max-w-3xl w-full text-center p-6 sm:p-8 lg:p-10 bg-white rounded-xl shadow-2xl transform hover:scale-[1.02] transition-transform duration-500 ease-in-out">
            <h1 class="hero-title text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-4 sm:mb-6 leading-tight">
                Kelola Keuangan <br class="hidden sm:inline"> Sekolah Anda dengan <span class="text-indigo-600">Mudah & Transparan</span>
            </h1>
            <p class="hero-subtitle text-gray-600 text-base sm:text-lg mb-8 sm:mb-12 max-w-xl mx-auto">
                Website pengelolaan keuangan sekolah yang modern, aman, dan efisien.
            </p>
            <a href="{{ route('login') }}" class="hero-button inline-block px-6 sm:px-8 lg:px-10 py-3 sm:py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full text-base sm:text-lg font-semibold transition-all duration-300 ease-in-out shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                Masuk ke Sistem
            </a>
            <p class="mt-6 sm:mt-8 text-xs sm:text-sm text-gray-500">Sistem Keuangan Terpercaya untuk Masa Depan Pendidikan</p>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="text-center text-xs sm:text-sm text-gray-500 py-4 sm:py-6 px-4 border-t border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto">
            &copy; {{ date('Y') }} Sistem Keuangan Sekolah. Dibuat dengan ❤️ di Bogor, Indonesia.
        </div>
    </footer>

</body>

</html>