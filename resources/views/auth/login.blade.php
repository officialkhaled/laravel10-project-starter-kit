<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                          required autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __("Don't have an account? Sign up") }}
            </a>

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-3 mb-1 flex justify-evenly gap-1 flex-col">
        <a href="{{ route('login.google') }}" data-toggle="tooltip" data-placement="top" title="Google Sign In!"
           class="py-2 card w-100 mx-auto shadow-md hover:shadow-lg rounded-3xl">
            <div class="flex justify-between mx-2 gap-2 items-center">
                <img src="{{ asset('assets/logos/google.png') }}" class="w-8 rounded-full bg-white p-1" alt="google">
                <p class="font-bold mr-2">Sign in with Google</p>
            </div>
        </a>
        <a href="{{ route('login.github') }}" data-toggle="tooltip" data-placement="top" title="GitHub Sign In!"
           class="py-2 card w-100 mx-auto shadow-md hover:shadow-lg rounded-3xl">
            <div class="flex justify-between mx-2 gap-2 items-center">
                <img src="{{ asset('assets/logos/github.png') }}" class="w-8 rounded-full bg-white p-1" alt="github">
                <p class="font-bold mr-2">Sign in with GitHub</p>
            </div>
        </a>
    </div>

</x-guest-layout>
