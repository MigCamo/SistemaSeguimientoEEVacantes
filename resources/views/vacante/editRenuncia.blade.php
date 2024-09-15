<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Renuncia</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('node_modules/flowbite/dist/flowbite.js')
    @vite('node_modules/flowbite/dist/datepicker.js')
    @livewireStyles
</head>
<body>

<div class="fondo">
    <!--Menu-->
    @livewire('navigation-menu')

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
        </div>
    </div>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Actualizar Renuncia</h3>
                    <p class="mt-1 text-sm text-gray-600">Por favor ingresa los datos solicitados.</p><br>
                    <p><b>Los datos que puedes modificar son los siguientes:</b></p>
                    <li>Tipo de Asignación</li>
                    <li>Fecha de Aviso</li>
                    <li>Fecha de Asignación</li>
                    <li>Fecha de Cierre</li>
                    <br>

                </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0 md:mr-5">

                <form action="{{ route('vacante.updateRenuncia',$docente->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                @csrf

                                <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                                    <label for="docente" class="labelForms">Número de personal</label>
                                    <input type="text" id="docente" class="inputForms"
                                           readonly
                                           value="{{$docente->nPersonal}}">
                                </div>

                                <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                                    <label for="docente" class="labelForms">Docente</label>
                                    <input type="text" id="docente" class="inputForms"
                                           readonly
                                           value="{{$docente->nombreDocente}}">
                                </div>

                                <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                                    <label for="tipoAsignacion"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tipo
                                        de Asignación</label>
                                    <select id="tipoAsignacion" name="tipoAsignacion" class="estiloSelect">
                                        <option
                                            value="{{$docente->tipoAsignacion}}">{{$docente->tipoAsignacion}}</option>
                                        @foreach ($listaTiposAsignacion as $data)
                                            <option value="{{$data->tipo}}">
                                                {{$data->tipo}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                                    <label for="fechaAviso" class="labelForms">Fecha de aviso</label>
                                    <div class="relative">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                 fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-format="dd/mm/yyyy" type="text"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               value="{{$docente->fechaAviso}}" id="fechaAviso"
                                               name="fechaAviso">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                                    <label for="fechaAsignacion" class="labelForms">Fecha de asignación</label>
                                    <div class="relative">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                 fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-format="dd/mm/yyyy" type="text"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               value="{{$docente->fechaAsignacion}}" id="fechaAsignacion"
                                               name="fechaAsignacion">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                                    <label for="fechaRenuncia" class="labelForms">Fecha de renuncia</label>
                                    <div class="relative">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                 fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-format="dd/mm/yyyy" type="text"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               value="{{$docente->fechaRenuncia}}" id="fechaRenuncia"
                                               name="fechaRenuncia">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="btnGuardar">Actualizar Renuncia</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
    </div>
</div>

</div>

</body>
</html>
