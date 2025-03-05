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
            <form action="{{ route('vacantesFiles.extraer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="archivo" style="display: none;" id="archivoExcelInput">
                <button type="button" id="cargarExcelButton" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Cargar desde Excel</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div >
        @if ( Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin') )
            @include('vacante.filterZonaDependenciaPrograma')
        @else
            @include('vacante.filterZonaDependenciaProgramaEditor')
        @endif
    </div>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg md:mt-10 md:mx-10 md:my-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-4">Programa</th>
                <th scope="col" class="py-3 px-4">Dependencia</th>
                <th scope="col" class="py-3 px-4">Experiencia Educativa</th>
                <th scope="col" class="py-3 px-4">Horas</th>
                <th scope="col" class="py-3 px-4">Periodo</th>
                <th scope="col" class="py-3 px-4">Académico Titular</th>
                <th scope="col" class="py-3 px-4">Archivo</th>
                <th scope="col" class="py-3 px-2 text-right"><span class="sr-only">Ver Información</span></th>
                <th scope="col" class="py-3 px-2 text-right"><span class="sr-only">Editar</span></th>
                @if (Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin'))
                    <th scope="col" class="py-3 px-2 text-right"><span class="sr-only">Eliminar</span></th>
                @endif
            </tr>
            </thead>
            <tbody>
            @if(count($vacantes) <= 0)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-4 px-6 text-center" colspan="9">No se han encontrado vacantes</td>
                </tr>
            @else
                @foreach($vacantes as $vacante)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vacante->educational_program_code}} -
                            {{DB::table('educational_programs')->join('regions_educational_programs','educational_programs.program_code', '=', 'regions_educational_programs.educational_program_code')->where('educational_programs.program_code', $vacante->educational_program_code)->value('name') }}
                        </th>
                        <td class="py-4 px-4">{{$vacante->departament_code}} - {{DB::table('departaments')->where('code',$vacante->departament_code)->value('name')}}</td>
                        <td class="py-4 px-4">{{$vacante->name}}</td>
                        <td class="py-4 px-4">{{$vacante->hours}}</td>
                        <td class="py-4 px-4">{{$vacante->school_period_code}} - {{DB::table('school_Periods')->where('code',$vacante->school_period_code)->value('description')}}</td>
                        <td class="py-4 px-4">{{$vacante->academic}}</td>
                        <td class="py-4 px-4">{{ $vacante->content ? 'Disponible' : 'Sin Archivo' }}</td>

                        <td class="py-4 px-2 text-right whitespace-nowrap">
                            <button type="button" class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900" data-modal-toggle="view-modal{{$vacante->nrc}}">
                                Ver Info
                            </button>
                        </td>

                        <td class="py-4 px-2 text-right whitespace-nowrap">
                            <a href="{{route('vacante.edit',$vacante->nrc)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Editar
                            </a>
                        </td>

                        @if (Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin'))
                            <td class="py-4 px-2 text-right whitespace-nowrap">
                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" data-modal-toggle="delete-modal{{$vacante->nrc}}">
                                    Cerrar EE
                                </button>
                            </td>
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

        <div id="miniForm" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="relative bg-white p-6 rounded-lg shadow-lg text-center w-96">
                <h2 class="text-xl font-semibold mb-4">Selecciona el tipo de archivo</h2>
                <form action="{{ route('vacantesFiles.extraer') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <input type="file" name="archivo" id="archivoExcelInput" style="display: none;">
                    <button type="button" id="csvVacantesButton" class="w-full bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 rounded mb-2">CSV Vacantes</button>
                </form>
                <form id="csvForm" action="{{ route('vacante.uploadCsvVacancies') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="csv_file" id="csvFileInput" style="display: none;">
                    <button type="button" id="csvCargasButton" class="w-full bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 rounded mb-2">CSV Cargas</button>
                </form>
                <button type="button" id="cerrarMiniForm" class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 font-medium text-lg">&times;</button>
            </div>
        </div>

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

</div>

</body>
</html>

<script>
    document.getElementById('cargarExcelButton').addEventListener('click', function() {
        document.getElementById('miniForm').classList.remove('hidden');
    });

    document.getElementById('cerrarMiniForm').addEventListener('click', function() {
        document.getElementById('miniForm').classList.add('hidden');
    });

    document.getElementById('csvVacantesButton').addEventListener('click', function() {
        document.getElementById('archivoExcelInput').click();
    });

    document.getElementById('archivoExcelInput').addEventListener('change', function() {
        this.form.submit();
    });

    document.getElementById('csvCargasButton').addEventListener('click', function () {
        document.getElementById('csvFileInput').click();
    });

    document.getElementById('csvFileInput').addEventListener('change', function () {
        if (this.files.length > 0) {
            //document.getElementById('loadingAlert').style.display = 'block';
            let formData = new FormData();
            formData.append('csv_file', this.files[0]);
            formData.append('_token', '{{ csrf_token() }}');

            fetch("{{ route('vacante.uploadCsvVacancies') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
                .then(response => response.json())
                .then(data => {
                    //document.getElementById('loadingAlert').style.display = 'none';
                    //document.getElementById('successMessage').style.display = 'block';
                    //document.getElementById('resultAlert').style.display = 'block';
                    setTimeout(() => {
                        //document.getElementById('resultAlert').style.display = 'none';
                        window.location.reload();
                    }, 3000);
                })
                .catch(error => {
                    //document.getElementById('loadingAlert').style.display = 'none';
                    //document.getElementById('errorMessage').style.display = 'block';
                    //document.getElementById('resultAlert').style.display = 'block';
                    setTimeout(() => {
                        //document.getElementById('resultAlert').style.display = 'none';
                        window.location.reload();
                    }, 3000);
                });
        }
    });
</script>
