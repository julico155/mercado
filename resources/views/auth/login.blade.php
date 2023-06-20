<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="border border-gray-300 rounded-md p-4">
            @csrf

            <div class="mb-4">
                <x-label for="email" value="{{ __('Correo Electronico') }}" />
                <x-input id="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mb-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center mb-4">
                <input id="remember_me" name="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                <label for="remember_me" class="ml-2 text-gray-700">{{ __('Recuerdame') }}</label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-button class="bg-indigo-500 hover:bg-indigo-600">
                    {{ __('Iniciar Sesion') }}
                </x-button>
            </div>
        </form>
        <div class="text-center mt-4">
            <span class="text-gray-700">{{ __('¿Aún no estás registrado?') }}</span>
            <a href="{{ route('register') }}" class="underline text-indigo-600 hover:text-indigo-800">{{ __('Registrar') }}</a>
        </div>

    </x-authentication-card>
</x-guest-layout>
