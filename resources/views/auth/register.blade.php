<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin Keuangan</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body class="bg-blue-50 text-slate-800 min-h-screen flex items-center justify-center p-4">

    <!-- Main Container -->
    <div class="w-full max-w-xl relative">
        <!-- Card Container -->
        <div class="bg-white rounded-3xl overflow-hidden border border-blue-200 shadow-xl">
            <div class="px-8 py-10 md:px-12 md:py-16">
                <!-- Header Section -->
                <div class="text-center mb-8">
                    <div class="mb-4">
                        <h1 class="text-4xl font-bold text-blue-600 tracking-tight"><span class="text-gray-800">FINSchool</span> ITXPRO</h1>
                        <p class="text-sm font-medium text-gray-800 mt-1">Sistem Keuangan Profesional</p>
                    </div>
                    <h2 class="text-3xl font-semibold text-gray-800">Buat Akun Baru</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Silakan isi data berikut untuk membuat akun.
                    </p>
                </div>

                <!-- Form Section -->
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                            placeholder="Nama Anda"
                            class="w-full px-5 py-3 rounded-xl bg-blue-50 border border-blue-200 placeholder-slate-400 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out">
                        <x-input-error :messages="$errors->get('name')" class="text-xs text-red-500 mt-1" />
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                            placeholder="you@example.com"
                            class="w-full px-5 py-3 rounded-xl bg-blue-50 border border-blue-200 placeholder-slate-400 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out">
                        <x-input-error :messages="$errors->get('email')" class="text-xs text-red-500 mt-1" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full px-5 py-3 rounded-xl bg-blue-50 border border-blue-200 placeholder-slate-400 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out">
                        <x-input-error :messages="$errors->get('password')" class="text-xs text-red-500 mt-1" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Konfirmasi Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full px-5 py-3 rounded-xl bg-blue-50 border border-blue-200 placeholder-slate-400 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-xs text-red-500 mt-1" />
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between text-sm">
                        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                            Sudah punya akun?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl tracking-wide transition-all duration-200 ease-in-out shadow-lg shadow-blue-500/30">
                            DAFTAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
