<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recuérdame') }}</span>
            </label>
        </div>

        <!-- GOOGLE LOGIN  -->
        <a href="/login-google" class="inline-flex items-center justify-center rounded-md px-3 py-2 text-gray-800 bg-white border border-gray-300 hover:border-gray-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:border-gray-700 dark:focus-visible:ring-blue-600 w-full">
            <!-- Logo de Google con margen a la derecha -->
            <img src="https://www.gstatic.com/images/branding/productlogos/googleg/v6/36px.svg" class="h-5 w-5 mr-2" alt="Logo de Google">&nbsp
            Iniciar sesión con Google
        </a>

        <div class="form-group mt-5" style="margin-left: 45px;">
            {!! NoCaptcha::renderJs('es', false, 'recaptchaCallback') !!}
            {!! NoCaptcha::display() !!}
        </div>
        @error('g-recaptcha-response')
        <div id="captcha-message" class="form-group mt-3 rounded bg-red-600 text-white text-center p-2">{{ $message }}</div>
            <script src="{{ asset('js/welcome.js')}}"></script>
        @enderror

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                    {{ __('Registrarse') }} 
                </a>&nbsp&nbsp
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Has olvidado tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Acceder') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>