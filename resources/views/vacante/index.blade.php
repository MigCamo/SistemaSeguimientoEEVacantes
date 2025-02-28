<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de EE vacantes</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    <!-- <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
            <p class="text-2xl font-bold">Lista de Experiencias Educativas Vacantes</p>
        </div>

        <div class="w-1/4 flex flex-col items-end">
            <a href="{{ route('vacante.create') }}" class="text-white bg-azul-royal hover:bg-azul-royal-hover focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Añadir Nueva</a>
            <a href="#" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Cargar desde Excel</a>
        </div>



    </div>

    <div >
    @if ( Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin') )
        @include('vacante.filterZonaDependenciaPrograma')
    @else
        @include('vacante.filterZonaDependenciaProgramaEditor')
    @endif
    </div>


    <div id="uploadCsvModal" tabindex="-1" class="hidden fixed inset-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full bg-gray-900 bg-opacity-50">
        <div class="relative w-full max-w-md max-h-full mx-auto mt-20">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Suba su archivo .csv
                    </h3>
                    <button type="button" id="closeCsvModalButton" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                </div>

                <div class="p-6 space-y-6">

                    @if(session('error_message'))
                        <div class="alert alert-danger">
                            {{ session('error_message') }}
                        </div>
                    @endif


                    <form id="csvForm" action="{{ route('vacante.uploadCsvVacancies') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label>Máximo 20 MB por archivo</label>
                        <input type="file" name="csv_file" required>
                        <input type="hidden" name="curriculum_code">
                        <button type="submit" class="btn btn-primary">Cargar CSV</button>
                    </form>

                    <div id="loadingAlert" style="display: none;">
                        <div class="alert alert-info">
                            <strong>Cargando archivo...</strong>
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <div id="resultAlert" style="display: none;">
                        <div class="alert alert-success" id="successMessage" style="display: none;">
                            <strong>¡Archivo procesado correctamente!</strong>
                        </div>
                        <div class="alert alert-danger" id="errorMessage" style="display: none;">
                            <strong>¡Ups! Hubo un error al procesar el archivo.</strong>
                        </div>
                    </div>
                </div>

                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" form="csvForm" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Subir archivo
                    </button>
                    <button id="cancelCsvUploadButton" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg md:mt-10 md:mx-10 md:my-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Programa
                </th>
                <th scope="col" class="py-3 px-6">
                    Experiencia Educativa
                </th>
                <th scope="col" class="py-3 px-6">
                    Horas
                </th>
                <th scope="col" class="py-3 px-6">
                    Contratación
                </th>
                <th scope="col" class="py-3 px-6">
                    Docente
                </th>
                <th scope="col" class="py-3 px-6">
                    Archivo
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Ver Información</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Editar</span>
                </th>

                @if ( Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin') )

                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Eliminar</span>
                    </th>

                @endif
            </tr>
            </thead>
            <tbody>

            @if(count($vacantes)<=0)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-4 px-6">
                        No se han encontrado vacantes
                    </td>
                </tr>
            @else
                @foreach($vacantes as $vacante)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vacante->educational_program_code}} -
                            {{DB::table('educational_programs')->join('regions_educational_programs','educational_programs.program_code', '=', 'regions_educational_programs.educational_program_code')->where('educational_programs.program_code', $vacante->educational_program_code)->value('name') }}

                        </th>

                        <td class="py-4 px-6">
                            {{$vacante->name}}
                        </td>

                        <td class="py-4 px-6">
                            {{$vacante->hours}}
                        </td>

                        @if ( Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin') )

                                <td class="py-4 px-2 text-right">
                                    <button type="button"
                                            class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900"
                                            data-modal-toggle="view-modal{{$vacante->nrc}}">Ver Info</button>
                                </td>

                                <td class="py-4 px-2 text-right">
                                    <a href="{{route('vacante.edit',$vacante->nrc)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</a>
                                </td>
                                <td class="py-4 px-2 text-right">
                                    <button type="button"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                            data-modal-toggle="delete-modal{{$vacante->nrc}}">Cerrar EE</button>
                                </td>

                        @else

                            @if($isDeleted)

                                <td class="py-4 px-2 text-right">
                                    <button type="button"
                                            class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900"
                                            data-modal-toggle="view-modal{{$vacante->id}}">Ver Info</button>
                                </td>

                            @else

                                <td class="py-4 px-2 text-right">
                                    <button type="button"
                                            class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900"
                                            data-modal-toggle="view-modal{{$vacante->id}}">Ver Info</button>
                                </td>

                                <td class="py-4 px-2 text-right">
                                    <a href="{{route('vacante.edit',$vacante->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</a>
                                </td>

                            @endif

                        @endif

                    </tr>
                    @include('vacante.modalConfirmacionEliminar')
                    @include('vacante.modalVisualizarVacante')
                @endforeach
            @endif
            </tbody>
        </table>

        @if( $zona ==="" )
            {{ $vacantes->links() }}
        @else
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    Mostrando
                    <span class="font-medium">{{ $countVacantes }}</span>
                    Resultados
                </p>
            </div>
        @endif

    </div>

</div>

</body>
</html>
