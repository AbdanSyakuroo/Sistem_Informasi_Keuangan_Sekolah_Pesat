<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-none py-10 px-4">
        <div class="w-full max-w-lg min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-none">
           <div>
                <a href="/">
                    <img src="{{ asset('img/pesat.png') }}" alt="logo" class="w-70 h-40">
                </a>
            </div>

            <div class="rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-xl  bg-slate-50 dark:bg-slate-900">
                <div class="px-10 py-12 ">
                    <!-- Header -->
                    <div class="text-center mb-6">
                        <h2 class="text-3xl font-semibold text-gray-900 dark:text-slate-100">Masuk ke Akun Anda</h2>
                        <p class="mt-1 text-sm dark:text-gray-400">
                            Silakan masukkan email dan password untuk melanjutkan.
                        </p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Input -->
                        <div class="space-y-1">
                            <label for="email" class="block text-sm font-medium text-white">Email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                required
                                autofocus
                                autocomplete="username"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                class="w-full px-4 py-3 rounded-xl bg-gray-100 dark:bg-slate-800 border border-gray-600 dark:border-slate-700 placeholder-gray-400 dark:placeholder-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                            />
                            <x-input-error :messages="$errors->get('email')" class="text-xs text-red-400 mt-1" />
                        </div>

                        <!-- Password Input -->
                        <div class="space-y-1 relative">
                            <label for="password" class="block text-sm font-medium text-white">Password</label>
                            <div class="relative">
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="••••••••"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-100 dark:bg-slate-800 border border-gray-600 dark:border-slate-700 placeholder-gray-400 dark:placeholder-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                                />
                                <button
                                    type="button"
                                    aria-label="Toggle password visibility"
                                    onclick="togglePasswordVisibility()"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-white opacity-80 hover:opacity-100 transition"
                                >
                                    <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 3l18 18M9.88 9.88a3 3 0 104.24 4.24" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.65 5.05c1.06-.135 2.15-.05 3.2.25m3.06 1.05a9.964 9.964 0 014.29 4.59c-1.27 4.06-5.06 6.99-9.54 6.99-1.16 0-2.28-.17-3.34-.5M6.34 6.34A9.964 9.964 0 001.71 11c1.27 4.06 5.06 6.99 9.54 6.99 1.08 0 2.14-.16 3.16-.46" />
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="text-xs text-red-400 mt-1" />
                        </div>

                        <!-- Options -->
                        <div class="flex items-center justify-between text-sm">
                            <label for="remember_me" class="inline-flex items-center gap-2 dark:text-slate-50">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="h-4 w-4 rounded text-indigo-500 border-gray-600 focus:ring-indigo-400"
                                />
                                <span>Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-gray-500 dark:text-slate-50 hover:underline">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit -->
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl tracking-wide transition">
                                LOG IN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Toggle script -->
    <script>
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
    </script>
</x-guest-layout>
