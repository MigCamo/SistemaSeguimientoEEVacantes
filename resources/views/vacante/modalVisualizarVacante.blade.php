<div id="view-modal{{$vacante->nrc}}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="relative w-full max-w-2xl p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <!-- Botón de cierre -->
        <button type="button" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-modal-toggle="view-modal{{$vacante->nrc}}">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>

        <!-- Título -->
        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200 border-b pb-2 mb-4">Experiencia Educativa: <span class="text-gray-900 dark:text-white">{{$vacante->name}}</span></h3>

        <!-- Contenido -->
        <div class="grid grid-cols-2 gap-4 text-gray-600 dark:text-gray-300">
            <div><strong>Periodo:</strong> {{$vacante->school_period_code}}</div>
            <div><strong>Zona:</strong> {{$vacante->region_code}} - {{DB::table('regions')->where('code', $vacante->region_code)->value('name')}}</div>
            <div><strong>Dependencia:</strong> {{$vacante->departament_code}} - {{DB::table('departaments')->where('code', $vacante->departament_code)->value('name')}}</div>
            <div><strong>Área:</strong> {{$vacante->area_code}} Económico Administrativa</div>
            <div><strong>Programa:</strong> {{$vacante->educational_program_code}} - {{DB::table('educational_programs')->where('program_code', $vacante->educational_program_code)->value('name')}}</div>
            <div><strong>Horas:</strong> {{$vacante->hours}}</div>
            <div><strong>Código de materia:</strong> {{$vacante->educational_experience_code}}</div>
            <div><strong>NRC:</strong> {{$vacante->nrc}}</div>
            <div><strong>Sub Grupo:</strong> {{$vacante->subGroup}}</div>
            <div><strong>Motivo:</strong> {{$vacante->ev_reason_code}} - {{DB::table('reasons')->where('code','=',$vacante->ev_reason_code)->value('name')}}</div>
            <div><strong>Asignación:</strong> {{$vacante->type_asignation_code}}</div>
            <div><strong>Academico Dueño:</strong> {{$vacante->academic}}</div>
            <div>
                <strong>Docente Suplente:</strong>
                {{ DB::table('lecturers')->where('staff_number', $vacante->lecturer_code)->value(DB::raw("CONCAT(names, ' ', lastName, ' ', maternal_surname)")) }} - {{ $vacante->lecturer_code }}
            </div>
            <div><strong>Tipo de contración:</strong> {{$vacante->ev_type_contract}}</div>
            <div><strong>Fecha de aviso:</strong> {{$vacante->noticeDate}}</div>
            <div><strong>Fecha de asignación:</strong> {{$vacante->assignmentDate}}</div>
            <div><strong>Fecha de apertura:</strong> {{$vacante->openingDate}}</div>
            <div><strong>Fecha de cierre:</strong> {{$vacante->closingDate}}</div>
            <div class="col-span-2"><strong>Observaciones:</strong> {{$vacante->notes}}</div>
        </div>

        <!-- Botón de cierre -->
        <div class="mt-4 text-center">
            <button data-modal-toggle="view-modal{{$vacante->nrc}}" class="px-5 py-2 text-white bg-gray-700 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300">Cerrar</button>
        </div>
    </div>
</div>
