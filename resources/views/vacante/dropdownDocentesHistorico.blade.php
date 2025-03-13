<div id="dropdownDocentes{{$vacante->id}}" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-400 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
    <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
        Historial de renuncias
    </div>

        <div class="divide-y divide-gray-400 dark:divide-gray-700">
            @foreach ($historicoDocentes as $docente)
            <div class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                <a href="{{ route('vacante.editRenuncia', $docente->nPersonal ?? 0) }}">
                    <div class="flex-shrink-0">
                        <button class="items-center mt-10 text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400" type="button">
                            <img class="w-11 h-11" src="{{asset('images/edit.png')}}" alt="Editar Renuncia">
                        </button>
                    </div>
                </a>

                <div class="w-full pl-3">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">Número de personal: <span class="font-semibold text-gray-900 dark:text-white">{{$docente->nPersonal}}</span></div>
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">Nombre del docente: <span class="font-semibold text-gray-900 dark:text-white">{{$docente->nombreDocente}}</span></div>
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">Tipo de asignación: <span class="font-semibold text-gray-900 dark:text-white">{{$docente->tipoAsignacion}}</span></div>
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">Fecha de aviso: <span class="font-semibold text-gray-900 dark:text-white">{{$docente->fechaAviso}}</span></div>
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">Fecha de asignación: <span class="font-semibold text-gray-900 dark:text-white">{{$docente->fechaAsignacion}}</span></div>
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">Fecha de renuncia: <span class="font-semibold text-gray-900 dark:text-white">{{$docente->fechaRenuncia}}</span></div>
                </div>

            </div>
            @endforeach

        </div>

</div>
