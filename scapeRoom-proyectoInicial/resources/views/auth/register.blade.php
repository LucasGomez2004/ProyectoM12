<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
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
        
        <br>
        
        <!-- GOOGLE LOGIN  -->
        <a href="/login-google" class="inline-flex items-center justify-center rounded-md px-3 py-2 text-gray-800 bg-white border border-gray-300 hover:border-gray-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:border-gray-700 dark:focus-visible:ring-blue-600 w-full">
            <!-- Logo de Google con margen a la derecha -->
            <img src="https://www.gstatic.com/images/branding/productlogos/googleg/v6/36px.svg" class="h-5 w-5 mr-2" alt="Logo de Google">&nbsp
            Iniciar sesión con Google
        </a>

        <div class="form-group mt-5">
            {!! NoCaptcha::renderJs('es', false, 'recaptchaCallback') !!}
            {!! NoCaptcha::display() !!}
        </div>
        
        @error('g-recaptcha-response')
            <div class="form-group mt-3" style="background-color:rgb(220 53 69); color:white; text-align:center;">{{ $message }}</div>
        @enderror


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
