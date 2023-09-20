<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- nombre -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- apellidos -->
        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- dni -->
        <div>
            <x-input-label for="dni" :value="__('DNI')" />
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus autocomplete="dni" />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
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
                            name="password_confirmation"
                            onpaste="return false"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- telefono -->
        <div>
            <x-input-label for="telefono" :value="__('Telefono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" autofocus autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

         <!-- pais -->
         <div>
            <x-input-label for="pais" :value="__('Pais')" />
            <!-- <select name="pais" id="pais" class="block mt-1 w-full" name="pais" :value="old('pais')">
                @foreach ($paises as $pais)
                    <option value="{{ $pais }}" >{{ $pais }}</option>
                @endforeach
            </select> -->
            <x-input-error :messages="$errors->get('pais')" class="mt-2" />
        </div>

         <!-- iban -->
         <div>
            <x-input-label for="iban" :value="__('IBAN')" />
            <x-text-input id="iban" class="block mt-1 w-full" type="text" name="iban" :value="old('iban')" required autofocus autocomplete="iban" />
            <x-input-error :messages="$errors->get('iban')" class="mt-2" />
        </div>

         <!-- sobreTi -->
         <div>
            <x-input-label for="sobreTi" :value="__('Sobre ti')" />
            <x-text-input id="sobreTi" class="block mt-1 w-full" type="text" name="sobreTi" :value="old('sobreTi')" autofocus autocomplete="sobreTi" />
            <x-input-error :messages="$errors->get('sobreTi')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
