<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitácora</title>
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

    <form action="{{route('bitacora.index')}}" method="GET" value="{{$search}}">
        <div class="flex shadow-md sm:rounded-lg md:mt-10 md:mx-10 md:my-10">

            <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Filtrar <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

            <!-- Dropdown menu -->
            <div id="dropdownBgHover" class="hidden z-10 w-48 bg-white rounded shadow dark:bg-gray-700">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBgHoverButton">

                    <li>
                        <div class="flex items-center">
                            <input id="fecha" type="radio" value="fecha" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="fecha" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fecha</label>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <input id="nombre" type="radio" value="nombre" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="nombre" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre</label>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <input id="correo" type="radio" value="correo" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="correo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Correo</label>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <input id="accion" type="radio" value="accion" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="accion" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Acción realizada</label>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <input id="cambios" type="radio" value="cambios" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="cambios" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cambios realizados</label>
                        </div>
                    </li>

                </ul>
            </div>


            <div class="relative w-full">
                <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Ingresa tu búsqueda, recuerda que puedes aplicar los filtros que desees" name="search">
                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Buscar</span>
                </button>
            </div>
        </div>
    </form>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg md:mt-10 md:mx-10 md:my-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Fecha (Año-Mes-Día)
                </th>
                <th scope="col" class="py-3 px-6">
                    Usuario
                </th>
                <th scope="col" class="py-3 px-6">
                    Correo
                </th>
                <th scope="col" class="py-3 px-6">
                    Acción
                </th>
                <th scope="col" class="py-3 px-6">
                    Cambios Realizados
                </th>
            </tr>
            </thead>
            <tbody>

            @if(count($bitacora)<=0)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-4 px-6">
                        No se han encontrado registros
                    </td>
                </tr>
            @else
                @foreach($bitacora as $accion)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$accion->created_at}}
                        </th>

                        <td class="py-4 px-6">
                            {{$accion->name}}
                        </td>

                        <td class="py-4 px-6">
                            {{$accion->email}}
                        </td>

                        <td class="py-4 px-6">
                            {{$accion->action}}
                        </td>

                        <td class="py-4 px-6">
                            {{$accion->data}}
                        </td>

                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        {{ $bitacora->links() }}
    </div>

</div>

</body>
</html>
