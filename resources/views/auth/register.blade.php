<x-guest-layout>
    <div class="w-full flex flex-col sm:justify-center items-center">
                <a href="/">
                    <img src="{{ asset('img/pesat.png') }}" alt="logo" class="w-70 h-40">
                </a>
    </div>

     <div class="rounded-3xl overflow-hidden border border-yellow-500 shadow-xl  bg-yellow-500">
                <div class="px-10 py-12 ">
                    <!-- Header -->
                    <div class="text-center mb-6">
                        <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Buat Akun Anda</h2>
                        <p class="mt-1 text-sm text-white">
                            Silahkan buat akun anda.
                        </p>
                    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-indigo-500 hover:bg-indigo-700">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
                </div>
     </div>
</x-guest-layout>
