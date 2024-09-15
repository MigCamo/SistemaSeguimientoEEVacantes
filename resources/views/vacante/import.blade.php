<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargar CSV inicial</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('node_modules/flowbite/dist/flowbite.js')

    @livewireStyles
</head>
<body>

    <div class="fondo">
        <!--Menu-->
        @livewire('navigation-menu')

        <form method="POST" action="{{ route('vacante.upload') }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="flex justify-center items-center w-75 md:mt-10 md:mx-10">
                <label for="file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click para seleccionar el archivo</span></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Formato aceptado: CSV Codificación UTF-8</p>
                        <p class="text-xs text-red-500 dark:text-gray-400">Este proceso puede demorar unos segundos, no te desesperes. No recargues ni cierres la  página.</p>
                    </div>
                    <p id="file-upload-filename"></p>
                    <p id="file-upload-msj"></p>
                    <input id="file" name="file" type="file" class="hidden" required accept="text/csv">
                </label>

            </div>

            @if($errors->has('file'))
                <span>
                    <strong> {{ $errors->first('file') }} </strong>
                </span>
            @endif

            <p> {{ session('status') }}</p>

            <div class="flex justify-center">
                <button type="submit" class="mt-5 btnGuardar">Cargar archivo</button>
            </div>
        </form>

    </div>

</body>
</html>
