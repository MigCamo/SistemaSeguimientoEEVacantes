<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Vacantes</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('node_modules/flowbite/dist/flowbite.js')
    @livewireStyles
</head>
<body>

<div class="fondo">
    <!-- Menu -->
    @livewire('navigation-menu')

    <div class="flex sm:rounded-lg md:mt-5 md:mx-10 md:my-0">
        <div class="w-3/4">
            <p class="text-2xl font-bold">Lista de Vacantes</p>
        </div>
        <div class="w-1/4 flex flex-col items-end">
            <a href="{{ route('vacante.create') }}" class="text-white bg-azul-royal hover:bg-azul-royal-hover focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Añadir Nueva</a>
        </div>
    </div>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg md:mt-10 md:mx-10 md:my-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">NRC</th>
                    <th scope="col" class="py-3 px-6">Período Escolar</th>
                    <th scope="col" class="py-3 px-6">Región</th>
                    <th scope="col" class="py-3 px-6">Departamento</th>
                    <th scope="col" class="py-3 px-6">Área</th>
                    <th scope="col" class="py-3 px-6">Experiencia Educativa</th>
                    <th scope="col" class="py-3 px-6">Clase</th>
                    <th scope="col" class="py-3 px-6">Subgrupo</th>
                    <th scope="col" class="py-3 px-6"><span class="sr-only">Ver Información</span></th>
                    <th scope="col" class="py-3 px-6"><span class="sr-only">Editar</span></th>
                    @if (Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin'))
                        <th scope="col" class="py-3 px-6"><span class="sr-only">Eliminar</span></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if($vacantes->isEmpty())
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-4 px-6" colspan="9">No se han encontrado vacantes.</td>
                    </tr>
                @else
                    @foreach($vacantes as $vacante)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $vacante->nrc }}
                            </th>
                            <td class="py-4 px-6">{{ $vacante->schoolPeriod->name ?? 'N/A' }}</td>
                            <td class="py-4 px-6">{{ $vacante->region->name ?? 'N/A' }}</td>
                            <td class="py-4 px-6">{{ $vacante->departament->name ?? 'N/A' }}</td>
                            <td class="py-4 px-6">{{ $vacante->area_code }}</td> <!-- Ajusta según tu modelo -->
                            <td class="py-4 px-6">{{ $vacante->educationalExperience->name ?? 'N/A' }}</td>
                            <td class="py-4 px-6">{{ $vacante->class }}</td>
                            <td class="py-4 px-6">{{ $vacante->subGroup }}</td>
                            <td class="py-4 px-2 text-right">
                                <button type="button" class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-600 dark:hover:bg-gray-700" data-modal-toggle="view-modal{{ $vacante->nrc }}">Ver Info</button>
                            </td>
                            <td class="py-4 px-2 text-right">
                                <a href="{{ route('vacante.edit', $vacante->nrc) }}" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">Editar</a>
                            </td>
                            @if (Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin'))
                                <td class="py-4 px-2 text-right">
                                    <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700" data-modal-toggle="delete-modal{{ $vacante->nrc }}">Eliminar</button>
                                </td>
                            @endif
                        </tr>
                        @include('vacante.modalConfirmacionEliminar') <!-- Modal de confirmación de eliminación -->
                        @include('vacante.modalVisualizarVacante') <!-- Modal para visualizar información -->
                    @endforeach
                @endif
            </tbody>
        </table>

        <!-- Aquí puedes agregar paginación si es necesario -->
    </div>
</div>

</body>
</html>


