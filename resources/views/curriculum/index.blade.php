<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Experiencias Educativas</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('node_modules/flowbite/dist/flowbite.js')
    @livewireStyles
</head>
<body>

<div class="fondo">
    @livewire('navigation-menu')

    <div class="flex sm:rounded-lg md:mt-5 md:mx-10 md:my-0">
        <div class="w-3/4">
            <p class="text-2xl font-bold">Planes de estudio del programa educativo: {{ $program->program_code}} {{   $program->name }} </p>
        </div>
        <div class="w-1/4 flex flex-col items-end">
            <button id="openModalButton" class="text-white bg-azul-royal hover:bg-azul-royal-hover focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Añadir Nueva
            </button>
        </div>
    </div>

    <div id="addCurriculumModal" tabindex="-1" class="hidden fixed inset-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full bg-gray-900 bg-opacity-50">
        <div class="relative w-full max-w-md max-h-full mx-auto mt-20">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="modalTitle">
                        Registrar nuevo Plan de estudios
                    </h3>
                    <button type="button" id="closeModalButton" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"></button>
                </div>

                <div class="p-6 space-y-6">
                    <form id="createCurriculumForm" action="{{ route('curriculum.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Código</label>
                            <input type="text" id="code" name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Ingresa el código" required>
                        </div>
                        <div class="mb-4">
                            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Año</label>
                            <input type="number" id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Ingresa el año" required>
                        </div>
                        <div class="mb-2">
                            <input type="hidden" id="educational_programs_code" name="educational_programs_code" value="{{ $program->program_code }}">
                        </div>
                        <div class="mb-4">
                            <label for="numberPeriods" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Numero de periodos</label>
                            <input type="number" id="numberPeriods" name="numberPeriods" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Ingresa el numero de periodos" required>
                        </div>
                        <div class="mb-4">
                            <label for="minimumCredits" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Minimo de creditos</label>
                            <input type="number" id="minimumCredits" name="minimumCredits" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Ingresa el minimo de creditos" required>
                        </div>
                        <div class="mb-2">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tipo</label>
                            <input type="text" id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Ingresa el tipo" required>
                        </div>
                    </form>
                </div>

                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button id="cancelButton" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                    <button id="modalActionButton" type="submit" form="createCurriculumForm" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('curriculum.index')}}" method="GET" value="{{$search}}">
        <div class="flex shadow-md sm:rounded-lg md:mt-5 md:mx-10 md:my-10">

            <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Filtrar <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

            <div id="dropdownBgHover" class="hidden z-10 w-48 bg-white rounded shadow dark:bg-gray-700">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBgHoverButton">

                    <li>
                        <div class="flex items-center">
                            <input id="code" type="radio" value="code" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="code" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Codigo</label>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <input id="year" type="radio" value="year" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="year" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Año</label>
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
                    <th scope="col" class="py-3 px-6 text-center">Código</th>
                    <th scope="col" class="py-3 px-6 text-center">Año del plan</th>
                    <th scope="col" class="py-3 px-6 text-center">Estado</th>
                    <th scope="col" class="py-3 px-6 text-center">Numero de periodos</th>
                    <th scope="col" class="py-3 px-6 text-center">Minimo de creditos</th>
                    <th scope="col" class="py-3 px-6 text-center">Tipo</th>
                    <th scope="col" class="py-3 px-6"></th>
                    <th scope="col" class="py-3 px-6"></th>
                    <th scope="col" class="py-3 px-6"></th>
                </tr>
            </thead>
            <tbody>
                @if(count($curriculumList) <= 0)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-4 px-6 text-center" colspan="6">No se ha encontrado ningún plan educativo</td>
                    </tr>
                @else
                    @foreach($curriculumList as $curriculum)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{$curriculum->code}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{$curriculum->year}}
                            </th>
                            @if($curriculum->active)
                                <td class="py-4 px-6 text-center">
                                    <form id="formCurrentCurriculum" action="{{ route('curriculum.updateStatus',$curriculum->code) }}" method="POST">
                                        @csrf
                                        <input checked onchange="this.form.submit()" type="checkbox" id="cbActual" name="active" value="False" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </form>
                                </td>
                            @else
                                <td class="py-4 px-6 text-center">
                                    <form id="formCurrentCurriculum" action="{{ route('curriculum.updateStatus',$curriculum->code) }}" method="POST">
                                        @csrf
                                        <input onchange="this.form.submit()" type="checkbox" id="cbActual" name="active" value="True" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </form>
                                </td>
                            @endif
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{$curriculum->numberPeriods}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{$curriculum->minimumCredits}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{$curriculum->type}}
                            </th>
                            <td class="py-4 px--20 text-center">
                                <button onclick="window.location.href='{{ route('curriculum.goToCurriculumDetailsWindow', $curriculum->code) }}'" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900">
                                    Ver plan
                                </button>
                            </td>
                            <td class="py-4 px--20 text-center">
                                <button onclick="editCurriculum({{ json_encode($curriculum) }})" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-blue-900">
                                    Editar
                                </button>
                            </td>
                            <td class="py-4 px--20 text-center">
                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" data-modal-toggle="delete-modal{{$curriculum->code}}">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        @include('curriculum.modalConfirmacionEliminar')
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ $curriculumList->links() }}
    </div>

</div>
</body>
</html>

<script>
    document.getElementById('openModalButton').addEventListener('click', function() {
        document.getElementById('addCurriculumModal').classList.remove('hidden');
        document.getElementById('createCurriculumForm').reset();
        document.getElementById('modalTitle').innerText = "Registrar nuevo Plan de estudios";
        document.getElementById('modalActionButton').innerText = "Crear";
        document.getElementById('createCurriculumForm').action = "{{ route('curriculum.store') }}";
    });

    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('addCurriculumModal').classList.add('hidden');
    });

    document.getElementById('cancelButton').addEventListener('click', function() {
        document.getElementById('addCurriculumModal').classList.add('hidden');
    });

    function editCurriculum(curriculum) {
        document.getElementById('addCurriculumModal').classList.remove('hidden');
        document.getElementById('modalTitle').innerText = "Modificar Plan de estudios";
        document.getElementById('modalActionButton').innerText = "Modificar";
        document.getElementById('createCurriculumForm').action = "{{ route('curriculum.update', '') }}/" + curriculum.code;
        document.getElementById('code').value = curriculum.code;
        document.getElementById('year').value = curriculum.year;
        document.getElementById('numberPeriods').value = curriculum.numberPeriods;
        document.getElementById('minimumCredits').value = curriculum.minimumCredits;
        document.getElementById('type').value = curriculum.type;
    }
</script>
