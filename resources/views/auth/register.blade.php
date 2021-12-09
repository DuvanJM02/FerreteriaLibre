<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nombre completo') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="userId" value="{{ __('Identificación (CC, CE, Pasaporte)') }}" />
                <x-jet-input id="userId" class="block mt-1 w-full" type="number" name="userId" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Teléfono') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" required />
            </div>

            <div class="mt-4" style="display: none">
                <x-jet-label for="phone" value="{{ __('Rol') }}" />
                <select name="role" id="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="Cliente">Cliente</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="location" value="{{ __('Ubicación') }}" />
                <x-jet-input id="location" class="block mt-1 w-full" type="text" name="location" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="birthday" value="{{ __('Fecha de nacimiento') }}" />
                <x-jet-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" max="2003-06-01" required />
            </div>

            {{-- <div class="mt-4">
                <x-jet-label for="status" value="{{ __('Estado') }}" />
                <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="1">Activo</option>
                    <option value="2">Activo</option>
                </select>
            </div> --}}

            {{-- <div class="mt-4">
                <x-jet-label for="storeId" value="{{ __('Identificación de la tienda (solo para vendedores)') }}" />
                <x-jet-input id="storeId" class="block mt-1 w-full" type="text" name="storeId" />
            </div> --}}

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('ACEPTO los :terms_of_service y :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terminos y condiciones').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('la Politica de Privacidad').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
            <div class="mt-4">
                <a href="{{ route('registrar-vendedor') }}">
                    <p>Si usted es un <strong><i>vendedor</i></strong> y quiere <strong>registrarse</strong>, haga click aquí.</p>
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
