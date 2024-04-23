<section>
    <header>
        <h2 class="text-lg font-medium text-dark-900 dark:text-dark-100">
            {{ __('Información del perfil') }}
        </h2>

        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
            {{ __("Actualiza tus datos.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
                @if($user->avatar)
                    <img src="{{ asset('uploads/imatges/' . $user->avatar) }}" class="avatar" alt="Avatar del usuario"  style="width: 100px; border-radius: 50px;>
                @else
                    <img src="{{ asset('uploads/imatges/carasilueta.png') }}" class="avatar" alt="Avatar predeterminado" style="width:50px;">
                @endif
        </div>
        <br>
        <div class="mb-3">
            <x-input-label class="text-dark" for="name" :value="__('Foto de Perfil')" />
            <input class="form-control" type="file" id="avatar" name="avatar">
        </div>

        <div>
            <x-input-label class="text-dark" for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-light" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label class="text-dark" for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-light" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-dark-800 dark:text-dark-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-dark-600 dark:text-dark-400 hover:text-dark-900 dark:hover:text-dark-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-dark-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-dark">{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <div 
                    style="background-color: green; width: 500px; height: 30px; color: white; text-align: center; border-radius: 5px;"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                >
                    {{ __('Guardado correctamente') }}
                </div>
            @endif
        </div>
    </form>
</section>
