<x-guest-layout>
    <div class="flex min-h-screen">
        <div class="w-1/2 bg-cover bg-center relative login-left" style="background-image: url('/images/background_login.jpeg');">
            <!-- Contenedor vacío para el fondo -->
        </div>

        <div class="w-1/2 flex items-center justify-center bg-white p-24">
            <div class="max-w-lg w-full">
                <!-- Contenedor para el logo y texto ajustado para estar uno al lado del otro -->
                <div class="flex items-center justify-center mb-8">
                    <!-- Transform translate-y para subir el logo 5px -->
                    <img src="https://www.uv.mx/artes/files/2022/08/1200px-Logo_de_la_Universidad_Veracruzana.svg_-768x991.png" alt="Universidad Veracruzana" width="100px" height="130px" style="transform: translateY(-25px);">
                    <div class="ml-4 text-left">
                        <!-- Texto en negritas para "Universidad" y "Veracruzana" -->
                        <h1 class="text-4xl text-gray-900 font-bold">Universidad</h1>
                        <h1 class="text-4xl text-gray-900 font-bold">Veracruzana</h1>
                    </div>
                </div>

                <!-- Formulario de inicio de sesión -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-jet-label for="email" value="{{ __('Email Address') }}" />
                        <x-jet-input id="email" class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-lg" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-lg" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">{{ __('Remember Me') }}</label>
                        </div>

                        <a class="font-medium text-lg text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>

                    <div>
                        <x-jet-button class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Sign in') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
