<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexVacanteRequest;
use App\Http\Requests\StoreExperienciaEducativaRequest;
use App\Http\Requests\StoreLecturerRequest;
use App\Models\SchoolPeriod;
use App\Models\Regions_Educational_Program;
use App\Models\HistoricoDocente;
use App\Models\AssignedVacancy;
use App\Models\Educational_Experience_Vacancies;
use App\Models\EducationalExperience;
use App\Models\Lecturer;
use App\Models\Reason;
use App\Models\Region;
use App\Models\Regions_Departament_Programs;
use App\Models\TypeAsignation;
use App\Providers\LogUserActivity;
use App\Providers\OperacionCierreVacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Curriculum_Educational_Experiences;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Log;

use Carbon\Carbon;


class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     * Función para mostrar las vacantes y su respectiva información al presionar Ver Info
     * Usada en la vista vacante.index
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexVacanteRequest $request)
    {
        $user = auth()->user()->id;
        $vacantes = [];
        $countVacantes = 0;

        $nombreZona = "";
        $nombreDependencia = "";
        $nombrePrograma = "";

        $listaDependenciasSelect = [];
        $listaProgramasSelect = [];

        $userRol = Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin');

        $programasEducUsuario = [];
        // Si el rol es admin
        if ($userRol) {

            $vac = Educational_Experience_Vacancies::all();
            $programasEducUsuario = [];
            $zona = "";
            $dependencia = "";
            $programa = "";
            $filtro = "";
            $busqueda = "";
            $isDeleted = false;
            $vacantes = DB::table('educational_experience_vacancies as ev')
                ->join('school_periods as sp', function ($join) {
                    $join->on('ev.school_period_code', '=', 'sp.code')
                        ->where('sp.current', '=', 1);
                })
                ->join('educational_experiences as ee', 'ev.educational_experience_code', '=', 'ee.code')
                ->leftJoin('assigned_vacancies as av', 'ev.nrc', '=', 'av.ee_vacancy_code')
                ->select(
                    'ev.*',
                    'ee.*',
                    'ev.type_contract as ev_type_contract',  // Alias para evitar confusión
                    'ev.reason_code as ev_reason_code',     // Alias para evitar confusión
                    'sp.code as period_code',
                    'sp.current',
                    'av.reason_code as av_reason_code',     // Alias para identificar de dónde viene
                    'av.type_asignation_code',
                    'av.lecturer_code',
                    'av.*'
                )
                ->paginate(1000000);
        } else {
            $userSelectDependencia = auth()->user()->dependencia;
            $vac = Educational_Experience_Vacancies::all();
            $programasEducUsuario = [];
            $zona = "";
            $dependencia = "";
            $programa = "";
            $filtro = "";
            $busqueda = "";
            $isDeleted = false;
            $vacantes = DB::table('educational_experience_vacancies as ev')
                ->join('school_periods as sp', function ($join) use ($userSelectDependencia) {
                    $join->on('ev.school_period_code', '=', 'sp.code')
                        ->where('sp.current', '=', 1)
                        ->where('ev.departament_code', $userSelectDependencia);
                })
                ->join('educational_experiences as ee', 'ev.educational_experience_code', '=', 'ee.code')
                ->leftJoin('assigned_vacancies as av', 'ev.nrc', '=', 'av.ee_vacancy_code')
                ->select(
                    'ev.*',
                    'ee.*',
                    'ev.type_contract as ev_type_contract',
                    'ev.reason_code as ev_reason_code',
                    'sp.code as period_code',
                    'sp.current',
                    'av.reason_code as av_reason_code',
                    'av.type_asignation_code',
                    'av.lecturer_code',
                    'av.*'
                )
                ->paginate(1000000);
        }

        // Zonas disponibles para mostrar
        $zonas = Region::all();

        return view('vacante.index', compact(
            'vacantes',
            'isDeleted',
            'zonas',
            'countVacantes',
            'zona',
            'dependencia',
            'programa',
            'filtro',
            'programasEducUsuario', // Asegúrate de que siempre esté definido
            'nombreZona',
            'nombreDependencia',
            'nombrePrograma',
            'listaDependenciasSelect',
            'listaProgramasSelect'
        ));
    }



    /**
     * Función para retornar variables al index, para cargar los resultados de la búsqueda
     *
     * @link https://laravel.com/docs/9.x/requests#accessing-the-request
     * @link https://laravel.com/docs/9.x/events#main-content
     * @access public
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function search(Request $request){

        $user = auth()->user()->id;
        $zona = $request->get('zona');
        $dependencia = $request->get('dependencia');
        $programa = $request->get('programa');
        $filtro = $request->get('filtro');
        $busqueda = $request->get('search');

        $nombreZona = DB::table('regions')->where('code',$zona)->value('name');

        $nombreDependencia = DB::table('departaments')
            ->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
            ->where('regions_departaments.departament_code', $dependencia)
            ->value('departaments.name');

        //$nombrePrograma = DB::table('zona__dependencia__programas')->where('clave_programa',$programa)->value('nombre_programa');
        $nombrePrograma = DB::table('educational_programs')
            ->join('regions_educational_programs', 'educational_programs.program_code', '=', 'regions_educational_programs.educational_program_code')
            ->where('regions_educational_programs.educational_program_code', $programa)
            ->get();


        $listaDependenciasSelect = DB::table('departaments')
            ->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
            ->where('regions_departaments.region_code', $zona)
            ->get();

        //$listaProgramasSelect = Regions_Departament_Programs::all()->where('clave_dependencia',$dependencia);

        $listaProgramasSelect = DB::table('educational_programs')
            ->join('regions_educational_programs', 'educational_programs.program_code', '=', 'regions_educational_programs.educational_program_code')
            ->where('regions_educational_programs.departament_code', $dependencia)
            ->get();

        $zonas = Region::all();

        /*event(new SelectVacanteIndex($user,$zona,$dependencia,$programa,$filtro,$busqueda));
        $isDeleted = $filtro=="VacantesCerradas";*/

        $vacantes = DB::table('educational_experience_vacancies as ev')
    // Join para obtener la información del período escolar actual, condicionado por $filtro
            ->join('school_periods as sp', function($join) use ($filtro) {
                $join->on('ev.school_period_code', '=', 'sp.code');

                // Si el filtro es "Vacantes", aplicamos la condición sp.current = 1
                if ($filtro === 'Vacantes') {
                    $join->where('sp.current', '=', 1);
                }
            })
            // Join para obtener la información de la experiencia educativa asociada
            ->join('educational_experiences as ee', 'ev.educational_experience_code', '=', 'ee.code')
            ->leftJoin('assigned_vacancies as av', 'ev.nrc', '=', 'av.ee_vacancy_code')
            ->join('Regions as r', 'ev.region_code', '=', 'r.code')
            ->join('departaments as d', 'ev.departament_code', '=', 'd.code')
            ->join('Educational_Programs as ep', 'ev.educational_program_code', '=', 'ep.program_code')
            ->where('r.code', $zona)
            ->where('d.code', $dependencia)
            ->where('ep.program_code', $programa)
            // Seleccionar columnas de ambas tablas, puedes ajustar los campos según tus necesidades
            ->select('ev.*', 'ee.*', 'sp.code as period_code', 'sp.current', 'av.reason_code', 'av.type_asignation_code', 'av.lecturer_code', 'av.*')
            ->get();
        $countVacantes = $vacantes->count();

        $programasEducUsuario = DB::table('regions_educational_programs')
                ->where('region_code', '=', $zona)
                ->where('departament_code', '=', $dependencia)
                ->get();

        return view('vacante.index', compact(
                'vacantes','zona','zonas','dependencia','programa','filtro','countVacantes',
                'programasEducUsuario', 'nombreZona', 'nombreDependencia', 'nombrePrograma', 'listaDependenciasSelect',
                'listaProgramasSelect'
            )
        );

    }
    /**
     * Show the form for creating a new resource.
     * Retorna las variables que se cargarán como apoyo en el formulario
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        //Obtener número y nombre de zona
        $zonaUsuario = $user->zona;
        $nombreZonaUsuario = DB::table('regions')->where('code',$zonaUsuario)->value('name');
        $numeroZonaUsuario = DB::table('regions')->where('code',$zonaUsuario)->value('code');

        //Obtener número y nombre de dependencia
        $dependenciaUsuario = $user->dependencia;
        $nombreDependenciaUsuario = DB::table('departaments')->where('code',$dependenciaUsuario)->value('name');
        $numeroDependenciaUsuario = DB::table('departaments')->where('code',$dependenciaUsuario)->value('code');

        //$listaProgramas = Zona_Dependencia_Programa::all();
        $zonas = Region::all();
        $listaProgramas = Regions_Departament_Programs::where('departament_code',$numeroDependenciaUsuario)->get();
        $listaMotivos = Reason::all();
        $listaDocentes = Lecturer::all();
        $listaExperienciasEducativas = EducationalExperience::all();
        $listaPeriodos = SchoolPeriod::all();
        $listaTiposAsignacion = TypeAsignation::all();


        $userAdmin = Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin');

        if($userAdmin){

            return view('vacante.create',['programas' => $listaProgramas,
                'user' => $user,
                'motivos' => $listaMotivos,
                'docentes' => $listaDocentes,
                'experienciasEducativas' => $listaExperienciasEducativas,
                'periodos' => $listaPeriodos,
                'tiposAsignacion' => $listaTiposAsignacion,
                'nombreZonaUsuario' => $nombreZonaUsuario,
                'numeroZonaUsuario' => $numeroZonaUsuario,
                'nombreDependenciaUsuario' => $nombreDependenciaUsuario,
                'numeroDependenciaUsuario' => $numeroDependenciaUsuario,
                'zonas' => $zonas,
            ]);
        }else{
            return view('vacante.createEditor',['programas' => $listaProgramas,
                'user' => $user,
                'motivos' => $listaMotivos,
                'docentes' => $listaDocentes,
                'experienciasEducativas' => $listaExperienciasEducativas,
                'periodos' => $listaPeriodos,
                'tiposAsignacion' => $listaTiposAsignacion,
                'nombreZonaUsuario' => $nombreZonaUsuario,
                'numeroZonaUsuario' => $numeroZonaUsuario,
                'nombreDependenciaUsuario' => $nombreDependenciaUsuario,
                'numeroDependenciaUsuario' => $numeroDependenciaUsuario,
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * Si en algún momento se añade un nuevo atributo al Modelo
     * @see Vacante
     *
     * @link https://laravel.com/docs/9.x/eloquent#inserts
     * @link https://laravel.com/docs/9.x/requests#accessing-the-request
     * @link https://www.php.net/manual/en/function.explode.php
     * @link https://laravel.com/docs/9.x/filesystem#create-a-directory
     * @link https://www.jhanley.com/blog/laravel-adding-azure-blob-storage/
     * @link https://laravel.com/docs/9.x/filesystem#specifying-a-file-name
     * @link https://learn.microsoft.com/en-us/sql/t-sql/functions/ident-current-transact-sql?view=sql-server-ver16
     * @link https://laravel.com/docs/9.x/validation#form-request-validation
     *
     * @param  \App\Http\Requests\StoreVacanteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction(); // Inicia la transacción

        try {
            // 1. Crear la vacante en EE_Vacancy
            $vacante = new Educational_Experience_Vacancies();
            $vacante->school_period_code = $request->periodo;
            $vacante->region_code = $request->numZona;
            $vacante->departament_code = $request->numDependencia;
            $vacante->area_code = $request->grupo ?? 1;
            $vacante->educational_program_code = $request->numPrograma;
            $vacante->educational_experience_code = $request->numMateria;
            $vacante->nrc = $request->nrc;
            $vacante->class = $request->grupo ?? 1;
            $vacante->subGroup = $request->subgrupo ?? 1;
            $vacante->numPlaza = $request->numPlaza;
            $vacante->reason_code = $request->numMotivo;
            $vacante->academic = $request->academic ?? null;
            $vacante->type_contract = $request->tipoContratacion;

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();

                // Validar que el archivo sea un PDF o Word
                if (!in_array($extension, ['pdf', 'doc', 'docx'])) {
                    throw new \Exception("El archivo debe ser un PDF o un documento de Word (.doc, .docx).");
                }

                // Validar el tamaño del archivo (máximo 2MB)
                if ($file->getSize() > 2 * 1024 * 1024) { // 2MB
                    throw new \Exception("El archivo no debe superar los 2MB.");
                }

                // Definir la carpeta de almacenamiento según el tipo de archivo
                $folder = ($extension === 'pdf') ? 'pdfs' : 'words';

                // Definir el nombre del archivo con timestamp para evitar duplicados
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Guardar el archivo en la carpeta correspondiente
                $path = $file->storeAs("public/{$folder}", $fileName); // Guarda en storage/app/public/{pdfs|words}

                // Guardar la ruta en la base de datos (sin "public/")
                $vacante->content = "{$folder}/{$fileName}";
            }

            $vacante->save();


            // 3. Crear la vacante asignada en Assigned_Vacancy
            $assignedVacancy = new AssignedVacancy();
            $assignedVacancy->ee_vacancy_code = $vacante->nrc; // Se usa el NRC generado
            $assignedVacancy->lecturer_code = $request->numPersonalDocente ?? null;
            $assignedVacancy->type_asignation_code = $request->tipoAsignacion;
            $assignedVacancy->noticeDate = !empty($request->fechaAviso) 
                ? Carbon::createFromFormat('d/m/Y', $request->fechaAviso)->format('Y-m-d') 
                : null;

            $assignedVacancy->assignmentDate = !empty($request->fechaAsignacion) 
                ? Carbon::createFromFormat('d/m/Y', $request->fechaAsignacion)->format('Y-m-d') 
                : null;

            $assignedVacancy->openingDate = !empty($request->fechaApertura) 
                ? Carbon::createFromFormat('d/m/Y', $request->fechaApertura)->format('Y-m-d') 
                : null;

            $assignedVacancy->closingDate = !empty($request->fechaCierre) 
                ? Carbon::createFromFormat('d/m/Y', $request->fechaCierre)->format('Y-m-d') 
                : null;
            $assignedVacancy->notes = $request->observaciones ?? '';
            $assignedVacancy->save();

            DB::commit(); // Confirma la transacción si todo sale bien


            return redirect()->route('vacante.index')->with('success', 'Vacante creada correctamente');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('vacante.index')->with('error', 'Error al crear la vacante: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     * Modal de creación de nuevo docente desde el botón Añadir docente desde las vistas de crear vacante y editar vacante
     *
     * @see Docente
     * @link https://laravel.com/docs/9.x/eloquent#inserts
     *
     * @link https://laravel.com/docs/9.x/validation#form-request-validation
     * @param  \App\Http\Requests\StoreDocenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDocente(StoreLecturerRequest $request){

        $docente = new Lecturer();

        if (!$request->nPersonal) {
            do {
                $randomStaffNumber = rand(1000, 9999); // Genera un número aleatorio entre 1000 y 9999
            } while (DB::table('lecturers')->where('staff_number', $randomStaffNumber)->exists());

            $docente->staff_number = $randomStaffNumber;
        } else {
            $docente->staff_number = $request->nPersonal;
        }

        // Convertir nombres y apellidos a mayúsculas antes de guardar
        $docente->names = strtoupper($request->nombre);
        $docente->lastname = strtoupper($request->apellidoPaterno);
        $docente->maternal_surname = strtoupper($request->apellidoMaterno);
        $docente->email = $request->email;

        $docente->save();


        $user = Auth::user();
        $data = $request->nPersonal ." ". $request->nombre ." ". $request->apellidoPaterno ." ". $request->apellidoMaterno ." ".$request->email;
        event(new LogUserActivity($user,"Creación de Docente",$data));

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     * Modal de creación de nueva experiencia educativa desde el botón Añadir Experiencia educativa desde las vistas de crear
     * vacante y editar vacante
     *
     * @link https://flowbite.com/docs/components/modal/#form-element
     * @link https://laravel.com/docs/9.x/eloquent#inserts
     *
     * @see ExperienciaEducativa
     * @param  \App\Http\Requests\StoreExperienciaEducativaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEe(StoreExperienciaEducativaRequest $request){

        $ee = new EducationalExperience();
        $ee->numMateria = $request->numMateria;
        //$ee->nrc = $request->nrc;
        $ee->nombre = $request->nombre;
        $ee->horas = $request->horas;

        $ee->save();

        $user = Auth::user();
        //$data = $request->numMateria ." " . $request->nrc ." ". $request->nombre ." ". $request->horas;
        $data = $request->numMateria ." ". $request->nombre ." ". $request->horas;
        event(new LogUserActivity($user,"Creación de Experiencia Educativa",$data));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Educational_Experience_Vacancies $vacante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Retorna las variables que se cargarán como apoyo en el formulario
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();

        $vacante = Educational_Experience_Vacancies::findOrFail($id);
        $vacanteAsignada = DB::table('assigned_vacancies')->where('ee_vacancy_code', '=', $vacante->nrc)->first();

        $docenteSeleccionado = DB::table('lecturers')
            ->join('assigned_vacancies', 'assigned_vacancies.lecturer_code', '=', 'lecturers.staff_number')
            ->where('assigned_vacancies.ee_vacancy_code', $vacante->nrc)
            ->first();

        $listaDocentes = DB::table('lecturers');

        $listaDocentes = $listaDocentes->get();
        $motivoSeleccionado = DB::table('reasons as r')
            ->join('educational_experience_vacancies as eev', 'eev.reason_code', '=', 'r.code')
            ->where('eev.nrc', $vacante->nrc)
            ->first();
        $listaMotivos = DB::table('reasons');

        if (!is_null($motivoSeleccionado)) {
            $listaMotivos = $listaMotivos->where('reasons.code', '!=', $motivoSeleccionado->code);
        }

        $listaMotivos = $listaMotivos->get();
        $listaExperienciasEducativas = EducationalExperience::all();
        $nombreExperienciaEducativa = DB::table('educational_experiences')->where('code', '=', $vacante->educational_experience_code)->first();
        $listaPeriodos = SchoolPeriod::all()->where('current', '=', '1');
        $asignacion = null;

        if (!is_null($vacanteAsignada)) {
            $asignacion = DB::table('type_asignations')
                ->where('id', $vacanteAsignada->type_asignation_code)
                ->first();
        }
        $listaTiposAsignacion = DB::table('type_asignations');

        $listaTiposAsignacion = $listaTiposAsignacion->get();
        $periodoAsignado = DB::table('school_periods')->where('code', $vacante->school_period_code)->first();
        $zonas = Region::where('code', '!=', $vacante->region_code)->get();
        $historicoDocentes = DB::table('historico_docentes')->where('vacanteID', $vacante->nrc)->get();
        $historicoDocentesReciente = DB::table('historico_docentes')
            ->where('vacanteID', $vacante->nrc)
            ->orderBy('updated_at', 'desc') // Ordena por fecha de actualización más reciente
            ->first(); // Recupera solo el primer resultado
        $userAdmin = Auth::user()->hasTeamRole(auth()->user()->currentTeam, 'admin');

        if($userAdmin){

            //Obtener nombre de la zona de la vacante
            $idZonaVacante = DB::table('educational_experience_vacancies')->where('nrc',$id)->value('region_code');
            $nombreZonaVacante = DB::table('regions')->where('code',$idZonaVacante)->value('name');

            //Obtener nombre de la dependencia de la vacante
            $claveDependenciaVacante = DB::table('educational_experience_vacancies')->where('nrc',$id)->value('departament_code');
            $nombreDependenciaVacante = DB::table('departaments')->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')->where('code', $claveDependenciaVacante)->value('name');
            //Lista de dependencias ligadas a la zona al editar vacante para corregir el dropdown
            $listaDependencias = DB::table('departaments')->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')->where('regions_departaments.region_code', '=', $idZonaVacante)->where('departaments.code', '!=', $claveDependenciaVacante)->get();
            //Obtener nombre de programa educativo
            $programaEducativoSeleccionado = DB::table('educational_experience_vacancies')->where('nrc',$id)->value('educational_program_code');
            $nombreProgramaEducativo = DB::table('educational_programs')->join('regions_educational_programs', 'educational_programs.program_code', '=', 'regions_educational_programs.educational_program_code')->where('program_code',$programaEducativoSeleccionado)->value('name');
            //Lista de programas ligados a la dependencia al editar vacante para corregir el dropdown
            $listaProgramas = DB::table('educational_programs')->join('regions_educational_programs', 'educational_programs.program_code', '=', 'regions_educational_programs.educational_program_code')->where('regions_educational_programs.departament_code',$claveDependenciaVacante)->where('educational_programs.program_code', '!=', $programaEducativoSeleccionado)->get();
            //obtener histórico docentes
            $listaDocentesHistorico = Lecturer::all();

            /*
            *Obtener los archivos
            *@link https://www.jhanley.com/blog/laravel-adding-azure-blob-storage/
            */

            return view('vacante.edit', compact('vacante'),
                ['user' => $user,
                    'motivos' => $listaMotivos,
                    'motivoSeleccionado' => $motivoSeleccionado,
                    'asignacion' => $asignacion,
                    'docentes' => $listaDocentes,
                    'docenteSeleccionado' => $docenteSeleccionado,
                    'experienciasEducativas' => $listaExperienciasEducativas,
                    'nombreExperienciaEducativa' => $nombreExperienciaEducativa,
                    'periodos' => $listaPeriodos,
                    'tiposAsignacion' => $listaTiposAsignacion,
                    'nombreProgramaEducativo' => $nombreProgramaEducativo,
                    'nombreZonaVacante' => $nombreZonaVacante,
                    'nombreDependenciaVacante' => $nombreDependenciaVacante,
                    'zonas' => $zonas,
                    'listaDependencias' => $listaDependencias,
                    'listaProgramas' => $listaProgramas,
                    'listaDocentesHistorico' => $listaDocentesHistorico,
                    'vacanteAsignada' => $vacanteAsignada,
                    'periodoAsignado' => $periodoAsignado,
                    'historicoDocentes' => $historicoDocentes,
                    'historicoDocentesReciente' => $historicoDocentesReciente,
                ]);
        }else{
            //Obtener número y nombre de zona
            $zonaUsuario = $user->zona;
            $nombreZonaUsuario = DB::table('regions')->where('code',$zonaUsuario)->value('name');
            $numeroZonaUsuario = DB::table('regions')->where('code',$zonaUsuario)->value('code');
            $listaProgramasEditor = Regions_Departament_Programs::where('region_code',$zonaUsuario)->get();

            return view('vacante.editEditor', compact('vacante'),
                ['programas' => $listaProgramasEditor,
                    'user' => $user,
                ]);
        }

    }

    /**
     * Muestra el formulario para editar los docentes del historial de renuncias
     *
     * @param $id
     * @link https://laravel.com/docs/10.x/views
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editRenuncia($id)
    {
        $docente = HistoricoDocente::findOrFail($id);
        $listaTiposAsignacion = TypeAsignation::all();

        return view('vacante.editRenuncia', compact('docente','listaTiposAsignacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVacanteRequest  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $vacante = Educational_Experience_Vacancies::findOrFail($id);

            $docenteActual = DB::table('assigned_vacancies')
                ->where('ee_vacancy_code', $vacante->nrc)
                ->first();

            if ($docenteActual && $docenteActual->lecturer_code != $request->numPersonalDocente) {
                $docenteAnterior = DB::table('lecturers')
                    ->where('staff_number', $docenteActual->lecturer_code)
                    ->first();

                    $historicoDocente = new HistoricoDocente();
                    $historicoDocente->vacanteID = $vacante->nrc;
                    $historicoDocente->nPersonal = $docenteActual->lecturer_code;
                    $historicoDocente->nombreDocente = $docenteAnterior 
                        ? ($docenteAnterior->names . ' ' . $docenteAnterior->lastname . ' ' . $docenteAnterior->maternal_surname) 
                        : 'Desconocido';
                    $historicoDocente->tipoAsignacion = $docenteActual->type_asignation_code;
                    $historicoDocente->fechaAviso = !empty($docenteActual->noticeDate) 
                        ? $docenteActual->noticeDate 
                        : Carbon::now()->format('Y-m-d');
                    $historicoDocente->fechaAsignacion = !empty($docenteActual->assignmentDate) 
                        ? $docenteActual->assignmentDate 
                        : Carbon::now()->format('Y-m-d');
                    $historicoDocente->fechaRenuncia = Carbon::now()->format('Y-m-d');
                    $historicoDocente->created_at = now();
                    $historicoDocente->updated_at = now();
                    
                    // Guardar en la base de datos
                    $historicoDocente->save();
            }

            $vacante->school_period_code = $request->periodo;
            $vacante->region_code = $request->numZona;
            $vacante->departament_code = $request->numDependencia;
            $vacante->area_code = $request->grupo ?? 1;
            $vacante->educational_program_code = $request->numPrograma;
            $vacante->educational_experience_code = $request->numMateria;
            $vacante->nrc = $request->nrc;
            $vacante->class = $request->grupo ?? 1;
            $vacante->subGroup = $request->subGrupo ?? 1;
            $vacante->numPlaza = $request->numPlaza;
            $vacante->reason_code = $request->numMotivo;
            if (!empty($vacante->academic) && empty($request->academic)) {
                
            } else {
                // Permitir el cambio si el nuevo valor es válido
                $vacante->academic = $request->academic;
            }
            $vacante->type_contract = $request->tipoContratacion;

            if ($request->hasFile('file')) {
                $file = $request->file('file');

                // Validar que el archivo sea PDF o Word
                $allowedExtensions = ['pdf', 'doc', 'docx'];
                $extension = $file->getClientOriginalExtension();

                if (!in_array($extension, $allowedExtensions)) {
                    throw new \Exception("El archivo debe ser un PDF o un documento Word (DOC/DOCX).");
                }

                // Validar el tamaño del archivo (máximo 2MB)
                if ($file->getSize() > 2 * 1024 * 1024) { // 2MB
                    throw new \Exception("El archivo no debe superar los 2MB.");
                }

                // Eliminar el archivo anterior si existe
                if (!empty($vacante->content)) {
                    $oldFilePath = storage_path("app/public/{$vacante->content}");
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Definir carpeta según la extensión
                $folder = ($extension === 'pdf') ? 'pdfs' : 'words';

                // Definir el nombre del archivo con timestamp para evitar duplicados
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Guardar el archivo en la carpeta correcta
                $file->storeAs("public/{$folder}", $fileName);

                // Guardar la ruta en la base de datos (sin "public/")
                $vacante->content = "{$folder}/{$fileName}";
            }


            $vacante->save();

            $assignedVacancy = AssignedVacancy::where('ee_vacancy_code', $vacante->nrc)->first();

            if ($assignedVacancy) {
                $assignedVacancy->update([
                    'lecturer_code' => $request->numPersonalDocente ?? null,
                    'type_asignation_code' => $request->tipoAsignacion,
                    'noticeDate' => !empty($request->fechaAviso) ? Carbon::createFromFormat('d/m/Y', $request->fechaAviso)->format('Y-m-d') : null,
                    'assignmentDate' => !empty($request->fechaAsignacion) ? Carbon::createFromFormat('d/m/Y', $request->fechaAsignacion)->format('Y-m-d') : null,
                    'openingDate' => !empty($request->fechaApertura) ? Carbon::createFromFormat('d/m/Y', $request->fechaApertura)->format('Y-m-d') : null,
                    'closingDate' => !empty($request->fechaCierre) ? Carbon::createFromFormat('d/m/Y', $request->fechaCierre)->format('Y-m-d') : null,
                    'notes' => $request->observaciones ?? '',
                ]);
            } else {
                AssignedVacancy::create([
                    'ee_vacancy_code' => $vacante->nrc,
                    'lecturer_code' => $request->numPersonalDocente,
                    'type_asignation_code' => $request->tipoAsignacion,
                    'noticeDate' => !empty($request->fechaAviso) ? Carbon::createFromFormat('d/m/Y', $request->fechaAviso)->format('Y-m-d') : null,
                    'assignmentDate' => !empty($request->fechaAsignacion) ? Carbon::createFromFormat('d/m/Y', $request->fechaAsignacion)->format('Y-m-d') : null,
                    'openingDate' => !empty($request->fechaApertura) ? Carbon::createFromFormat('d/m/Y', $request->fechaApertura)->format('Y-m-d') : null,
                    'closingDate' => !empty($request->fechaCierre) ? Carbon::createFromFormat('d/m/Y', $request->fechaCierre)->format('Y-m-d') : null,
                    'notes' => $request->observaciones ?? '',
                ]);
            }

            DB::commit();

            $user = Auth::user();
            $data = $request->nPersonal ." ". $request->nombre ." ". $request->apellidoPaterno ." ". $request->apellidoMaterno ." ".$request->email;
            event(new LogUserActivity($user, "Actualización de Vacante ID $id", $data));

            return redirect()->route('vacante.index')->with('success', 'Vacante editada correctamente');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->route('vacante.index')->with('error', 'Error al actualizar la vacante: ' . $e->getMessage());
        }
    }


    /**
     * Función para actualizar las vacantes para el rol de facultad
     * Usada en la vista: vacante.editEditor
     *
     * @link https://laravel.com/docs/9.x/eloquent#inserting-and-updating-models
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function updateE(Request $request, $id)
    {
        $vacante = Educational_Experience_Vacancies::findOrFail($id);

        $observaciones=$request->observaciones;
        $fechaAsignacion=$request->fechaAsignacion;
        $fechaCierre=$request->fechaCierre;
        $fechaRenuncia=$request->fechaRenuncia;

        $vacante->update([
            'observaciones' => $observaciones ,
            'fechaAsignacion' => $fechaAsignacion ,
            'fechaCierre' => $fechaCierre ,
            'fechaRenuncia' => $fechaRenuncia ,
        ]);

        $user = Auth::user();
        $data = $request->observaciones . " " . $request->fechaAsignacion . " " . $request->fechaCierre . " " . $request->fechaRenuncia ;
        event(new LogUserActivity($user,"Actualización de Vacante ID $id ",$data));

        return redirect()->route('vacante.index');
    }

    /**
     * Función para actualizar la información de una renuncia
     * Usada en la vista: vacante.updateRenuncia
     *
     * @link https://laravel.com/docs/9.x/eloquent#inserting-and-updating-models
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function updateRenuncia(Request $request, $id){

        $docente = HistoricoDocente::findOrFail($id);

        $tipoAsignacion = $request->tipoAsignacion;
        $fechaAviso=$request->fechaAviso;
        $fechaAsignacion=$request->fechaAsignacion;
        $fechaRenuncia=$request->fechaRenuncia;

        $docente->update([
            'tipoAsignacion' => $tipoAsignacion,
            'fechaAviso' => $fechaAviso,
            'fechaAsignacion' => $fechaAsignacion,
            'fechaRenuncia' => $fechaRenuncia
        ]);

        $user = Auth::user();
        $data = $tipoAsignacion . " " . $request->fechaAviso . " " . $request->fechaAsignacion . " " . $request->fechaRenuncia;
        event(new LogUserActivity($user,"Actualización de Renuncia ID $id ",$data));

        return redirect()->to('vacante/edit/'.$docente->vacanteID);

    }

    /**
     * Remove the specified resource from storage.
     * Usada en la vista: vacante.index
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacante = DB::table('educational_experience_vacancies as ev')
                    // Join para obtener la información del período escolar actual
                    ->join('school_periods as sp', function($join) {
                        $join->on('ev.school_period_code', '=', 'sp.code')
                            ->where('sp.current', '=', 1);
                    })
                    // Join para obtener la información de la experiencia educativa asociada
                    ->join('educational_experiences as ee', 'ev.educational_experience_code', '=', 'ee.code')
                    ->leftJoin('assigned_vacancies as av', 'ev.nrc', '=', 'av.ee_vacancy_code')
                    ->where('ev.nrc', '=', $id)
                    // Seleccionar columnas de ambas tablas, puedes ajustar los campos según tus necesidades
                    ->select('ev.*', 'ee.*', 'sp.code as period_code', 'sp.current', 'av.reason_code', 'av.type_asignation_code', 'av.lecturer_code', 'av.*')
                    ->first();



        $numMotivo = $vacante->reason_code;
        $numHoras = $vacante->hours;
        $numPrograma = $vacante->educational_program_code;

        if (!$vacante) {
            return redirect()->route('vacante.index')->with('error', 'Vacante no encontrada');
        }

        // Eliminar la vacante usando el Query Builder
        DB::table('educational_experience_vacancies')->where('nrc', $id)->delete();

        $user = Auth::user();
        $data = "Eliminación de Vacante ID: $id";
        event(new LogUserActivity($user,"Eliminación de Vacante ID: $id",$data));

        event(new OperacionCierreVacante($numMotivo,$numHoras,$numPrograma));

        return redirect()->route('vacante.index');
    }

    /**
     * Función para eliminar los documentos cargados en las vacantes.
     * Usada en las vistas: vacante.edit
     *
     * @link https://laravel.com/docs/9.x/filesystem#deleting-files
     * @param $id
     * @param $file
     * @return \Illuminate\Http\RedirectResponse
     */

    public function deleteFile($id,$file)
    {
        $directory = $id.'/'.$file;
        Storage::disk('azure')->delete($directory);

        $archivoPartes = explode("-",$id);
        $vacanteArchivo= $archivoPartes[0];
        $idVac = $archivoPartes[1] ;

        $vacante = Educational_Experience_Vacancies::findOrFail($idVac);

        $path = "vac-" . $vacante->id;
        $disk = Storage::disk('azure');
        $files = $disk->files($path);
        $filesList = array();
        foreach ($files as $file){
            $filename = "$file";
            $item = array(
                'name' => $filename,
            );
            array_push($filesList,$item);
        }

        $nFile = count($filesList);
        if(empty($nFile) ){
            $vacante->update([
                'archivo' => "Inexistente" ,
            ]);
        }

        return redirect()->back();
    }

    /**
     * Mostrar la vista para importar el CSV
     * Es utilizada en la vista: navigation-menu
     */
    public function import(Request $request){

        return view('vacante.import');

    }

    /**
     * Función para cargar el archivo CSV de las vacantes a la base de datos
     * Es utilizada en la vista: vacante.import
     * También se utiliza el evento LogUserActivity -> UserActions ubicados en app/Providers, para guardar registro de la acción realizada en la bitácora.
     *
     * @link https://stackoverflow.com/questions/28757076/php-how-to-return-false-with-file-for-an-empty-csv-file
     * @link https://youtu.be/ap7A1uav-tc
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadCSV(Request $request){
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        $file = file($request->file->getRealPath());
        $data = array_slice($file,1);

        $parts = (array_chunk($data,11));

        foreach($parts as $index=>$part){
            $fileName = resource_path('pending-files/'.date('y-m-d-H-i-s').$index. '.csv');
            file_put_contents($fileName,$part);
        }
        (new Educational_Experience_Vacancies())->importToDB();
        session()->flash('status','esparando por importar');

        $user = Auth::user();
        $data = $request->file->getClientOriginalName();
        event(new LogUserActivity($user,"Importación de archivo CSV",$data));

        return redirect()->route("vacante.index");

    }

    /**
     * Función para buscar las horas de la experiencia educativa de acuerdo al option del select seleccionado.
     * Trabajo en conjunto con JS, en las vistas: vacante.selectNrcNombreCreate, vacante.selectNrcNombreEdit
     *
     * @link https://programmingpot.com/dependent-droop-down-in-laravel/
     * @link https://www.itsolutionstuff.com/post/how-to-make-simple-dependent-dropdown-using-jquery-ajax-in-laravel-5example.html
     * @link https://youtu.be/CBCo5wgiPs8
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchHorasExperienciaEducativa(Request $request)
    {
        $data['horasExperienciaEducativa'] = EducationalExperience::where("code", $request->nrc)
            ->get(["code", "name", "hours"]);

        return response()->json($data);
    }

    /**
     * Función para buscar las dependencias de las respectivas zonas de forma dinámica, utilizada en la gestión de vacantes y programas educativos.
     * Trabajo en conjunto con JS, en las vistas: vacante.filterZonaDependenciaPrograma, vacante.selectZonaDependenciaProgramaCreate, vacante.selectZonaDependenciaProgramaEdit
     *
     * @link https://programmingpot.com/dependent-droop-down-in-laravel/
     * @link https://www.itsolutionstuff.com/post/how-to-make-simple-dependent-dropdown-using-jquery-ajax-in-laravel-5example.html
     * @link https://youtu.be/CBCo5wgiPs8
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchDependenciaVacante(Request $request)
    {
        $data['dependenciaVacante'] = DB::table("departaments")
            ->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
            ->where('regions_departaments.region_code', '=', $request->idZona)
            ->select('departaments.code', 'departaments.name')
            ->get();

        return response()->json($data);
    }


    /**
     * Función para filtrar los programas educativos pertenecientes a una determinada dependencia de forma dinámica, utilizada en la gestión de vacantes y programas educativos.
     * Trabajo en conjunto con JS, en las vistas: vacante.filterZonaDependenciaPrograma, vacante.selectZonaDependenciaProgramaCreate, vacante.selectZonaDependenciaProgramaEdit
     *
     * @link https://programmingpot.com/dependent-droop-down-in-laravel/
     * @link https://www.itsolutionstuff.com/post/how-to-make-simple-dependent-dropdown-using-jquery-ajax-in-laravel-5example.html
     * @link https://youtu.be/CBCo5wgiPs8
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchProgramaVacante(Request $request)
    {
        $data['programaVacante'] = DB::table('educational_programs')
            ->join(
                'regions_educational_programs',
                'educational_programs.program_code',
                '=',
                'regions_educational_programs.educational_program_code'
            )
            ->where('regions_educational_programs.departament_code', '=', $request->idDependencia)
            ->select('educational_programs.*', 'regions_educational_programs.*')
            ->get();

        return response()->json($data);
    }

    /**
     * Función para filtrar la lista de docentes al momento de crear y editar una vacante de forma dinámica, por nombre y apellido paterno.
     * Trabajo en conjunto con JS, en las vistas: vacante.filterNombreDocenteCreate, vacante.filterNombreDocenteEdit
     *
     * @link https://programmingpot.com/dependent-droop-down-in-laravel/
     * @link https://www.itsolutionstuff.com/post/how-to-make-simple-dependent-dropdown-using-jquery-ajax-in-laravel-5example.html
     * @link https://youtu.be/CBCo5wgiPs8
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchFiltroNombre(Request $request)
    {
        $rangoLetrasApellido = $request->rangoLetrasApellido;

        $data['filtroNombre'] = Lecturer::where("nombre",'LIKE','['.$request->rangoLetrasNombre.']%')
            ->where(function ($query) use ($rangoLetrasApellido){
                $query->where("apellidoPaterno",'LIKE','['.$rangoLetrasApellido.']%');
            })
            ->get(["nPersonal","nombre","apellidoPaterno","apellidoMaterno"]);

        return response()->json($data);
    }

    /**
     * Función para realizar las búsquedas invocada en el método de index y search
     *
     * @link https://laravel.com/docs/9.x/queries#joins
     * @link https://laravel.com/docs/9.x/queries#conditional-clauses
     *
     * @param $userSelectZona
     * @param $userSelectDependencia
     * @param $userSelectPrograma
     * @param $userSelectFiltro
     * @param $userSelectSearch
     * @return \Illuminate\Support\Collection
     */
    public function busquedaVacante($userSelectZona,$userSelectDependencia,$userSelectPrograma,$userSelectFiltro,$userSelectSearch){

        $vacantes = DB::table('educational_experience_vacancies')
    ->select('educational_experience_vacancies.id', 'periodo', 'educational_experience_vacancies.clavePeriodo', 'numZona', 'numDependencia', 'numArea', 'numPrograma',
            'numPlaza', 'numHoras', 'numMateria', 'nombreMateria', 'grupo', 'subGrupo', 'numMotivo', 'tipoContratacion',
            'tipoAsignacion', 'numPersonalDocente', 'nombreDocente', 'plan', 'observaciones', 'fechaAviso', 'fechaAsignacion',
            'fechaApertura', 'fechaCierre', 'fechaRenuncia', 'archivo')
    ->join('school_periods', function($join) use ($userSelectZona, $userSelectDependencia, $userSelectPrograma, $userSelectFiltro, $userSelectSearch) {
        $join->on('educational_experience_vacancies.school_period_code', '=', 'school_periods.code')
            ->where('school_periods.current', "=", 1)
            ->where('numZona', '=', $userSelectZona)
            ->where('numDependencia', '=', $userSelectDependencia)
            ->where('numPrograma', '=', $userSelectPrograma)
            ->when($userSelectFiltro == "Todas", function($query) {
                // Se quita la condición whereNull('deleted_at')
            })
            ->when($userSelectFiltro == "Vacantes", function($query) {
                $query->whereNull('numPersonalDocente');
            })
            ->when($userSelectFiltro == "NoVacantes", function($query) {
                $query->whereNotNull('numPersonalDocente');
            })
            ->when($userSelectFiltro == "VacantesCerradas", function($query) {
                // Se quita la condición whereNotNull('deleted_at')
            })
            ->when($userSelectFiltro == "VacantesArchivos", function($query) {
                $query->where('archivo', '<>', 'Inexistente');
            })
            ->when($userSelectFiltro == "ComplementoCarga", function($query) {
                $query->where('tipoAsignacion', '=', 'Complemento de carga');
            })
            ->when($userSelectFiltro == "CargaObligatoria", function($query) {
                $query->where('tipoAsignacion', '=', 'Carga obligatoria');
            })
            ->where(function ($query) use ($userSelectSearch) {
                $query->where('numPlaza', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('numHoras', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('numMateria', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('nombreMateria', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('grupo', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('subGrupo', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('numMotivo', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('tipoContratacion', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('tipoAsignacion', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('numPersonalDocente', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('nombreDocente', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('plan', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('observaciones', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('fechaAviso', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('fechaAsignacion', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('fechaApertura', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('fechaCierre', 'LIKE', '%' . $userSelectSearch . '%')
                    ->orWhere('fechaRenuncia', 'LIKE', '%' . $userSelectSearch . '%');
            });
    })
    ->get();

        return $vacantes;

    }

    public function downloadFile($id)
    {
        $vacante = Educational_Experience_Vacancies::findOrFail($id);

        if (!$vacante->content) {
            return redirect()->back()->with('error', 'No hay archivo disponible para esta vacante.');
        }

        $filePath = storage_path("app/public/{$vacante->content}");

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'El archivo no existe.');
        }

        // Obtener la extensión del archivo
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Definir el tipo MIME adecuado según la extensión
        $mimeTypes = [
            'pdf'  => 'application/pdf',
            'doc'  => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';

        return response()->download($filePath, basename($filePath), ['Content-Type' => $mimeType]);
    }

    public function uploadCsvVacancies(Request $request)
    {
        $validated = $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:20480',
        ]);

        try {
            $file = $request->file('csv_file');
            $csvData = file_get_contents($file);

            // Eliminar el BOM si está presente
            $bom = pack('H*', 'EFBBBF');
            $csvData = preg_replace("/^$bom/", '', $csvData);

            $rows = array_map('str_getcsv', explode("\n", $csvData));

            $header         = null;
            $currentAcademic= null;
            $currentPlaza   = null;  // <--- Variable para guardar la plaza actual
            $filteredRows   = [];

            foreach ($rows as $row) {
                $row = array_map('trim', $row);

                // Detectar si la fila contiene "Académico: ..."
                if (isset($row[0]) && str_contains($row[0], 'Académico:')) {
                    $academicLine = str_replace('Académico:', '', $row[0]);
                    $academicLine = trim($academicLine);

                    // Cortamos lo que venga después de "Antigüedad:"
                    $pos = mb_strpos($academicLine, 'Antigüedad:');
                    if ($pos !== false) {
                        $academicLine = mb_substr($academicLine, 0, $pos);
                        $academicLine = trim($academicLine);
                    }

                    // Separamos número y nombre del académico
                    $parts = explode('-', $academicLine, 2);
                    $currentAcademic = count($parts) === 2
                        ? trim($parts[1]) . ' - ' . trim($parts[0])
                        : $academicLine;

                    continue;
                }

                // Detectar si la fila contiene "Plaza: ..."
                if (isset($row[0]) && str_contains($row[0], 'Plaza:')) {
                    // Extraemos el número de plaza con una expresión regular
                    preg_match('/Plaza:\s*(\d+)/', $row[0], $matches);
                    $currentPlaza = $matches[1] ?? null;

                    // Si quieres, también puedes parsear aquí "Categoría:", "Puesto:", etc.
                    continue;
                }

                // Detectar el encabezado
                if (count(array_filter($row)) > 3 && is_null($header)) {
                    $header = $row;
                    continue;
                }

                // Si ya tenemos encabezado y la fila coincide en columnas, la guardamos
                if ($header && count($row) == count($header)) {
                    $data = array_combine($header, $row);

                    // Añadimos a la fila el nombre del académico y la plaza actual
                    $data['academic'] = $currentAcademic;
                    $data['Plaza']    = $currentPlaza;

                    // Filtrar solo las vacantes válidas
                    if (
                        ($data['Imparte'] ?? '') === 'NO' &&
                        empty($data['Nombre del suplente / interino'] ?? '')
                    ) {
                        $filteredRows[] = $data;
                    }
                }
            }

            if (!$header) {
                Log::error('No se encontró un encabezado válido en el archivo CSV.');
                return redirect()->back()->with('status', 'error')
                    ->with('error_message', 'Encabezado no válido en el archivo CSV.');
            }

            Log::info('Archivo CSV procesado correctamente.');

            $activePeriod = SchoolPeriod::where('current', 1)->first();
            if (!$activePeriod) {
                Log::error('No se encontró un periodo escolar activo.');
                return redirect()->back()->with('status', 'error')
                    ->with('error_message', 'No hay periodo escolar activo.');
            }

            foreach ($filteredRows as $data) {
                $nrc           = $data['NRC'] ?? null;
                $programCode   = $data['Clave Programática'] ?? null;
                $experienceName= $data['Experiencia Educativa'] ?? null;

                if (isset($data['Plaza'])) {
                    Log::info("Valor original de Plaza: " . json_encode($data['Plaza']));

                    // Eliminamos caracteres no numéricos
                    $numPlaza = preg_replace('/\D/', '', $data['Plaza']);

                    if (empty($numPlaza)) {
                        Log::warning("No se pudo extraer un número válido de Plaza: " . json_encode($data['Plaza']));
                    } else {
                        Log::info("Número extraído de Plaza: $numPlaza");
                    }
                } else {
                    $numPlaza = null;
                    Log::warning("La columna 'Plaza' no existe en la fila: " . json_encode($data));
                }


                $reasonCode    = $data['Motivo RH'] ?? null;
                $academic      = $data['academic']   ?? null;

                if (empty($nrc) || empty($programCode) || empty($experienceName)) {
                    Log::warning("Fila ignorada por falta de datos: " . json_encode($data));
                    continue;
                }

                $educationalExperience = Curriculum_Educational_Experiences::whereHas(
                    'educationalExperience',
                    function ($query) use ($experienceName) {
                        $query->where('name', $experienceName);
                    }
                )->whereHas('curriculum', function ($query) use ($programCode) {
                    $query->where('educational_programs_code', $programCode);
                })->first();

                if (!$educationalExperience) {
                    Log::warning("No se encontró la EE con nombre: $experienceName y programa: $programCode");
                    continue;
                }
                $ee_code = $educationalExperience->ee_code;

                $relation = Regions_Educational_Program::where('educational_program_code', $programCode)->first();
                if (!$relation) {
                    Log::warning("No se encontró la relación entre programa educativo y región: $programCode");
                    continue;
                }

                $region_code      = $relation->region_code;
                $departament_code = $relation->departament_code;

                if (Educational_Experience_Vacancies::where('nrc', $nrc)->exists()) {
                    Log::info("Vacante con NRC $nrc ya registrada, se omite.");
                    continue;
                }

                Educational_Experience_Vacancies::create([
                    'nrc'                           => $nrc,
                    'school_period_code'            => $activePeriod->code,
                    'region_code'                   => $region_code,
                    'departament_code'              => $departament_code,
                    'area_code'                     => $educationalExperience->area_code,
                    'educational_experience_code'   => $ee_code,
                    'educational_program_code'      => $programCode,
                    'class'                         => $data['Clase'] ?? '',
                    'subGroup'                      => $data['Subgrupo'] ?? '',
                    'numPlaza'                      => $numPlaza,
                    'reason_code'                   => $reasonCode,
                    'academic'                      => $academic,
                ]);

                Log::info("Vacante registrada: NRC $nrc, EE $ee_code, Program Code $programCode, Num Plaza $numPlaza");
            }

            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            Log::error("Error al procesar el CSV: " . $e->getMessage());
            return redirect()->back()->with('status', 'error')
                ->with('error_message', $e->getMessage());
        }
    }
}
