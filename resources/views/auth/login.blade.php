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
<body class="bg-blue-50 text-slate-800 min-h-screen flex items-center justify-center p-4">

    <!-- Main Container -->
    <div class="w-full max-w-xl relative">
        <!-- Card Container -->
        <div class="bg-white rounded-3xl overflow-hidden border border-blue-200 shadow-xl">
            <div class="px-8 py-10 md:px-12 md:py-16">
                <!-- Header Section -->
                <div class="text-center mb-8">
                    <!-- Placeholder Logo or Title -->
                    <div class="mb-4">
                        <h1 class="text-4xl font-bold text-blue-600 tracking-tight"><span class="text-gray-800">FINSchool</span> ITXPRO</h1>
                        <p class="text-sm font-medium text-gray-800 mt-1">Sistem Keuangan Profesional</p>
                    </div>
                    <h2 class="text-3xl font-semibold text-gray-800">Masuk ke Akun Anda</h2>
                    <p class="mt-2 text-sm text-gray-500">
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
                        <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            autofocus
                            autocomplete="username"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            class="w-full px-5 py-3 rounded-xl bg-blue-50 border border-blue-200 placeholder-slate-400 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out"
                        />
                        <x-input-error :messages="$errors->get('email')" class="text-xs text-red-500 mt-1" />
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-2 relative">
                        <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                        <div class="relative">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••"
                                class="w-full px-5 py-3 rounded-xl bg-blue-50 border border-blue-200 placeholder-slate-400 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out"
                            />
                            <!-- Password Toggle Button -->
                            <button
                                type="button"
                                aria-label="Toggle password visibility"
                                onclick="togglePasswordVisibility()"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-blue-400 hover:text-blue-600 transition-colors"
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
                        <x-input-error :messages="$errors->get('password')" class="text-xs text-red-500 mt-1" />
                    </div>

                    <!-- Options Section -->
                    <div class="flex items-center justify-between text-sm">
                        <label for="remember_me" class="inline-flex items-center gap-2 text-slate-600">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="h-4 w-4 rounded bg-blue-50 text-blue-600 border-blue-300 focus:ring-blue-400"
                            />
                            <span>Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">
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

<script>
function togglePasswordVisibility() {
    const passwordInput = document.getElementById("password");
    const eyeOpen = document.getElementById("eye-open");
    const eyeClosed = document.getElementById("eye-closed");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeOpen.classList.add("hidden");
        eyeClosed.classList.remove("hidden");
    } else {
        passwordInput.type = "password";
        eyeOpen.classList.remove("hidden");
        eyeClosed.classList.add("hidden");
    }
}
</script>
</body>
</html>
