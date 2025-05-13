<x-guest-layout>
    <div style="background-image: url({{ asset('images/login-background.jpg') }}); background-size: cover;">
        <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
                <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('images/login2.jpg') }}" alt="Office"/>
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                    <h1 class="mb-4 text-xl font-semibold text-gray-700">
                        Iniciar sesiòn
                    </h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                         <!-- Input[ype="email"] -->
                    <div class="mt-4">
                        <x-input-label :value="__('Email')"/>
                        <x-text-input type="email"
                                 id="email"
                                 name="email"
                                 value="{{ old('email') }}"
                                 class="block w-full"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Input[ype="password"] -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Contraseña')"/>
                        <x-text-input type="password"
                                 id="password"
                                 name="password"
                                 class="block w-full"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center dark:text-gray-400">
                            <input type="checkbox"
                                   name="remember"
                                   class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                            <span class="ml-2">{{ __('Recuerdame') }}</span>
                        </label>
                    </div>

                    <div class="mt-4">
                        <x-primary-button class="block w-full">
                            {{ __('Iniciar sesiòn') }}
                        </x-primary-button>
                    </div>


                    </form>

                    <hr class="my-8"/>

                    @if (Route::has('password.request'))
                        <p class="mt-4">
                            <a class="text-sm font-medium text-primary-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        </p>
                    @endif

                    <p class="mt-4">
                        <a class="text-sm font-medium text-primary-600 hover:underline" href="{{ route('register') }}">
                            {{ __('Aún no estás registrado? Click aquí') }}
                        </a>
                    </p>
                    <p class="mt-5">Copyright by: Leonel Octavio Ponce Rodríguez & Jesús 
                        Alberto Godoy Salinas
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
