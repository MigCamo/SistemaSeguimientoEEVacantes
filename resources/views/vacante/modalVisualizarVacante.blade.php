<div  id="view-modal{{$vacante->nrc}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-0 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="view-modal{{$vacante->nrc}}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="mt-2 text-center">
  {{--              <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
                <h3 class="mb-5 top:5 text-lg font-normal text-gray-500 dark:text-gray-400">Experiencia Educativa: {{$vacante->name}}</h3>
            </div>
            <div class="pt-0 px-6 text-justify">

                    <div class="col-span-6">
                        <label class="labelForms">Periodo: </label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Clave Periodo: {{$vacante->school_period_code}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">
                            Zona: {{$vacante->region_code}} -
                            {{DB::table('regions')->join('regions_educational_programs', 'regions.code', '=', 'regions_educational_programs.region_code')->where('regions_educational_programs.region_code', $vacante->region_code)->value('name') }}
                        </label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">
                            Número de dependencia: {{$vacante->departament_code}} -
                            {{DB::table('departaments')->join('regions_educational_programs', 'departaments.code', '=', 'regions_educational_programs.departament_code')->where('regions_educational_programs.departament_code', $vacante->departament_code)->value('name') }}
                        </label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Número de área: {{$vacante->area_code}} Económico Administrativa</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">
                            Número de programa: {{$vacante->educational_program_code}} -
                            {{DB::table('educational_programs')->join('regions_educational_programs', 'educational_programs.program_code', '=', 'regions_educational_programs.educational_program_code')->where('regions_educational_programs.educational_program_code', '=', $vacante->educational_program_code)->value('name')}}
                        </label>
                    </div>
                    
                    <div class="col-span-6">
                        <label class="labelForms">Número de horas: {{$vacante->hours}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Código de materia: {{$vacante->educational_experience_code}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">NRC: {{$vacante->nrc}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Sub Grupo: {{$vacante->subGroup}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">
                            Motivo: {{$vacante->reason_code}} -
                            {{DB::table('reasons')->where('code','=',$vacante->reason_code)->value('name') }}
                        </label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Tipo de asignación: {{$vacante->type_asignation_code}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Número y nombre del docente: {{$vacante->lecturer_code}} - NombreDocente</label>
                    </div>

                    <div class="col-span-6">
                        <label class="labelForms">Fecha de aviso: {{$vacante->noticeDate}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Fecha de asignación: {{$vacante->assignmentDate}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Fecha de apertura: {{$vacante->openingDate}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Fecha de cierre: {{$vacante->closingDate}}</label>
                    </div>
                    <div class="col-span-6">
                        <label class="labelForms">Observaciones: {{$vacante->notes}}</label>
                    </div>


            </div>
            <div class="p-2 text-center">
                <button data-modal-toggle="view-modal{{$vacante->id}}" type="button" class="text-white bg-gray-700 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Regresar</button>
            </div>

        </div>
    </div>
</div>
