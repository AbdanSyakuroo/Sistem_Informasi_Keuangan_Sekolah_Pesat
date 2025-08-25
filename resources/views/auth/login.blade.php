<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Keuangan</title>
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
<body class="bg-slate-100 dark:bg-slate-900 text-slate-800 dark:text-slate-200 min-h-screen flex items-center justify-center p-4">

    <!-- Main Container -->
    <div class="w-full max-w-xl relative">

        {{-- <!-- Dark Mode Toggle Button -->
        <button id="theme-toggle" class="absolute top-4 right-4 p-2 rounded-full bg-slate-200 dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
            <!-- Sun Icon -->
            <svg id="sun-icon" class="h-6 w-6 text-slate-600 dark:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <!-- Moon Icon -->
            <svg id="moon-icon" class="h-6 w-6 text-slate-600 dark:text-white hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button> --}}

        <!-- Card Container -->
        <div class="bg-white dark:bg-slate-800 rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-xl">
            <div class="px-8 py-10 md:px-12 md:py-16">
                <!-- Header Section -->
                <div class="text-center mb-8">
                    <!-- Placeholder Logo or Title -->
                    <div class="mb-4">
                        <h1 class="text-4xl font-bold text-blue-600 dark:text-blue-500 tracking-tight">Finance Admin</h1>
                        <p class="text-sm font-medium text-slate-600 dark:text-slate-400 mt-1">Sistem Keuangan Profesional</p>
                    </div>
                    <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-100">Masuk ke Akun Anda</h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Silakan masukkan email dan password untuk melanjutkan.
                    </p>
                </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                <!-- Form Section -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <!-- Email Input -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            autofocus
                            autocomplete="username"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            class="w-full px-5 py-3 rounded-xl bg-gray-100 dark:bg-slate-700 border border-slate-300 dark:border-slate-600 placeholder-slate-400 dark:placeholder-slate-500 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out"
                        />
                        <x-input-error :messages="$errors->get('email')" class="text-xs text-red-400 mt-1" />
                        <!-- Placeholder for error messages -->
                        <!-- <span class="text-xs text-red-500 mt-1">Pesan Error</span> -->
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-2 relative">
                        <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Password</label>
                        <div class="relative">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••"
                                class="w-full px-5 py-3 rounded-xl bg-gray-100 dark:bg-slate-700 border border-slate-300 dark:border-slate-600 placeholder-slate-400 dark:placeholder-slate-500 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out"
                            />
                            <!-- Password Toggle Button -->
                            <button
                                type="button"
                                aria-label="Toggle password visibility"
                                onclick="togglePasswordVisibility()"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 transition-colors"
                            >
                                <!-- Eye Open Icon -->
                                <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <!-- Eye Closed Icon -->
                                <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7 1.274-4.057 5.065-7 9.542-7c.797 0 1.57.108 2.316.314M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="text-xs text-red-400 mt-1" />

                        <!-- Placeholder for error messages -->
                        <!-- <span class="text-xs text-red-500 mt-1">Pesan Error</span> -->
                    </div>

                    <!-- Options Section -->
                    <div class="flex items-center justify-between text-sm">
                        <label for="remember_me" class="inline-flex items-center gap-2 text-slate-600 dark:text-slate-400">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="h-4 w-4 rounded bg-gray-100 dark:bg-slate-700 text-blue-500 border-slate-300 dark:border-slate-600 focus:ring-blue-400"
                            />
                            <span>Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-gray-500 dark:text-slate-50 hover:underline">
                                    Lupa Kata Sandi
                                </a>
                            @endif
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl tracking-wide transition-all duration-200 ease-in-out shadow-lg shadow-blue-500/30">
                            MASUK
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Toggle password visibility
        function togglePasswordVisibility() {
            const pwd = document.getElementById('password');
            const openIcon = document.getElementById('eye-open');
            const closedIcon = document.getElementById('eye-closed');

            if (pwd.type === 'password') {
                pwd.type = 'text';
                openIcon.classList.add('hidden');
                closedIcon.classList.remove('hidden');
            } else {
                pwd.type = 'password';
                openIcon.classList.remove('hidden');
                closedIcon.classList.add('hidden');
            }
        }

        // Dark mode toggle
        const themeToggle = document.getElementById('theme-toggle');
        const htmlElement = document.documentElement;
        const sunIcon = document.getElementById('sun-icon');
        const moonIcon = document.getElementById('moon-icon');

        // Check for saved theme preference or system preference on load
        function loadTheme() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (savedTheme === null && prefersDark)) {
                htmlElement.classList.add('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                htmlElement.classList.remove('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            }
        }

        // Toggle theme on button click
        themeToggle.addEventListener('click', () => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            } else {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            }
        });

        // Load the theme when the page loads
        document.addEventListener('DOMContentLoaded', loadTheme);

    </script>
</body>
</html>
