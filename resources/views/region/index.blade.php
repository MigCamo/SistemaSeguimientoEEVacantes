<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Zonas</title>
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

    <div class="flex sm:rounded-lg md:mt-5 md:mx-10 md:my-0">
        <div class="w-3/4">
            <p class="text-2xl font-bold">Lista de Zonas</p>
        </div>
        <div class="w-1/4 flex flex-col items-end">
            <a href="{{ route('region.create') }}" class="text-white bg-azul-royal hover:bg-azul-royal-hover focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Añadir Nueva</a>
        </div>
    </div>

    <form action="{{route('region.index')}}" method="GET" value="{{$search}}">
        <div class="flex shadow-md sm:rounded-lg md:mt-5 md:mx-10 md:my-10">


            <div class="relative w-full">
                <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Ingresa tu búsqueda" name="search">
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
                    Codigo de zona
                </th>
                <th scope="col" class="py-3 px-6">
                    Nombre de la zona
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Editar</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Eliminar</span>
                </th>
            </tr>
            </thead>
            <tbody>

            @if(count($regions)<=0)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-4 px-6">
                        No se han encontrado zonas
                    </td>
                </tr>
            @else
                @foreach($regions as $region)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$region->code}}
                        </th>

                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$region->name}}
                        </th>

                        <td class="py-4 px-6 text-right">
                            <a href="{{route('region.edit',$region->code)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</a>
                        </td>

                        <td class="py-4 px-6 text-right">
                            <button type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    data-modal-toggle="delete-modal{{$region->code}}">Eliminar</button>
                        </td>

                    </tr>
                    @include('region.modalConfirmacionEliminar')
                @endforeach
            @endif
            </tbody>
        </table>
        {{ $regions->links() }}
    </div>

</div>

</body>
</html>
