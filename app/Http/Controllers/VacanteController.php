<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexVacanteRequest;
use App\Http\Requests\StoreDocenteRequest;
use App\Http\Requests\StoreExperienciaEducativaRequest;
use App\Http\Requests\StoreLecturerRequest;
use App\Models\Area;
use App\Models\Docente;
use App\Models\HistoricoDocente;
use App\Models\SchoolPeriod;
use App\Models\SearchVacante;
use App\Models\TipoAsignacion;
use App\Models\Vacante;
use App\Models\Motivo;
use App\Models\ExperienciaEducativa;
use App\Http\Requests\StoreVacanteRequest;
use App\Models\EducationalExperience;
use App\Models\Lecturer;
use App\Models\Reason;
use App\Models\Region;
use App\Models\Regions_Departament_Programs;
use App\Models\Regions_Departaments;
use App\Models\TypeAsignation;
use App\Models\Zona_Dependencia;
use App\Models\Zona_Dependencia_Programa;
use App\Providers\LogUserActivity;
use App\Providers\OperacionCierreVacante;
use App\Providers\OperacionHorasVacante;
use App\Providers\RenunciaDocente;
use App\Providers\SelectVacanteIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


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
        $vacantes = Vacante::with(['schoolPeriod', 'region', 'departament', 'educationalExperience'])->get();

        return view('vacante.index', compact('vacantes'));
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
        //$idUsuario = $user->id;
        $zona = $request->get('zona');
        $dependencia = $request->get('dependencia');
        $programa = $request->get('programa');
        $filtro = $request->get('filtro');
        $busqueda = $request->get('search');

        $nombreZona = DB::table('zonas')->where('id',$zona)->value('nombre');
        $nombreDependencia = DB::table('zona__dependencias')->where('clave_dependencia',$dependencia)->value('nombre_dependencia');
        $nombrePrograma = DB::table('zona__dependencia__programas')->where('clave_programa',$programa)->value('nombre_programa');

        $listaDependenciasSelect = Regions_Departaments::all()->where('id_zona',$zona);
        $listaProgramasSelect = Regions_Departament_Programs::all()->where('clave_dependencia',$dependencia);

        $zonas = Region::all();

        event(new SelectVacanteIndex($user,$zona,$dependencia,$programa,$filtro,$busqueda));
        $isDeleted = $filtro=="VacantesCerradas";
        $vacantes = $this->busquedaVacante($zona,$dependencia,$programa,$filtro,$busqueda);
        $countVacantes = $vacantes->count();

        $programasEducUsuario = DB::table('zona__dependencia__programas')
            ->where('id_zona','=',$zona)
            ->where('clave_dependencia','=',$dependencia)
            ->get();

        return view('vacante.index', compact(
                'vacantes','zona','zonas','dependencia','programa','filtro','isDeleted','countVacantes',
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

        // Obtener datos de la zona del usuario
        $zonaUsuario = $user->zona;
        $nombreZonaUsuario = DB::table('regions')->where('code', $zonaUsuario)->value('name');
        $numeroZonaUsuario = DB::table('regions')->where('code', $zonaUsuario)->value('code');

        // Obtener datos de la dependencia del usuario
        $dependenciaUsuario = $user->dependencia;
        $nombreDependenciaUsuario = DB::table('departaments')->where('code', $dependenciaUsuario)->value('name');
        $numeroDependenciaUsuario = DB::table('departaments')->where('code', $dependenciaUsuario)->value('code');

        // Obtener programas educativos directamente desde las dependencias asociadas a la zona del usuario
        $listaProgramas = DB::table('educational_programs')
            ->where('program_code', $dependenciaUsuario)
            ->get();

        // Listas para los select en la vista
        $zonas = DB::table('regions')->get();
        $listaMotivos = DB::table('reasons')->get();
        $listaExperienciasEducativas = DB::table('educational_experiences')->get();
        $listaPeriodos = DB::table('school_periods')->get();
        $listaTiposAsignacion = DB::table('type_asignations')->get();

        // Verificar si el usuario es administrador
        $team = $user->currentTeam;
        $userAdmin = $team->hasRole('admin');

        // Retornar vista dependiendo del rol del usuario
        $viewData = [
            'programas' => $listaProgramas,
            'user' => $user,
            'motivos' => $listaMotivos,
            'experienciasEducativas' => $listaExperienciasEducativas,
            'periodos' => $listaPeriodos,
            'tiposAsignacion' => $listaTiposAsignacion,
            'nombreZonaUsuario' => $nombreZonaUsuario,
            'numeroZonaUsuario' => $numeroZonaUsuario,
            'nombreDependenciaUsuario' => $nombreDependenciaUsuario,
            'numeroDependenciaUsuario' => $numeroDependenciaUsuario,
            'zonas' => $zonas,
        ];

        return $userAdmin
            ? view('vacante.create', $viewData)
            : view('vacante.createEditor', $viewData);
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
    public function store(StoreVacanteRequest $request)
{
    $vacante = new Vacante();

    // Extracción de datos para relaciones
    $periodoPartes = explode("-", $request->school_period_code);
    $vacante->school_period_code = $periodoPartes[0]; // Supongamos que el código del periodo está aquí

    $vacante->region_code = $request->region_code;
    $vacante->departament_code = $request->departament_code;
    $vacante->area_code = $request->area_code;

    $experienciaEducativaPartes = explode("~", $request->educational_experience_code);
    $vacante->educational_experience_code = $experienciaEducativaPartes[0]; // Supongamos que el código está aquí

    $vacante->class = $request->class;
    $vacante->subGroup = $request->subGroup;

    // Guardar la vacante
    $vacante->save();

    // Registrar actividad del usuario
    $user = Auth::user();
    $data = $vacante->school_period_code . " " . $vacante->region_code . " " . $vacante->departament_code . " " .
            $vacante->area_code . " " . $vacante->educational_experience_code . " " . $vacante->class . " " .
            $vacante->subGroup;

    event(new LogUserActivity($user, "Creación de Vacante", $data));

    return redirect()->route('vacante.index')->with('success', 'Vacante creada exitosamente.');
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
    public function storeDocente(StoreLecturerRequest $request)
    {
        $docente = new Lecturer();
        $docente->nPersonal = $request->nPersonal;
        $docente->nombre = $request->nombre;
        $docente->apellidoPaterno = $request->apellidoPaterno;
        $docente->apellidoMaterno = $request->apellidoMaterno;
        $docente->email = $request->email;
    
        $docente->save();
    
        $user = Auth::user();
        $data = $request->nPersonal . " " . $request->nombre . " " . $request->apellidoPaterno . " " . $request->apellidoMaterno . " " . $request->email;
        event(new LogUserActivity($user, "Creación de Docente", $data));
    
        return redirect()->back()->with('success', 'El docente ha sido registrado con éxito.');
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
        $ee->codMateria = $request->codMateria;
        //$ee->nrc = $request->nrc;
        $ee->nombre = $request->nombre;
        $ee->horas = $request->horas;

        $ee->save();

        $user = Auth::user();
        //$data = $request->numMateria ." " . $request->nrc ." ". $request->nombre ." ". $request->horas;
        $data = $request->codMateria ." ". $request->nombre ." ". $request->horas;
        event(new LogUserActivity($user,"Creación de Experiencia Educativa",$data));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
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

    // Obtener la vacante por su ID o lanzar un error 404 si no existe
    $vacante = Vacante::with(['region', 'departament', 'educationalProgram'])->findOrFail($id);

    // Listas para los select dinámicos
    $listaMotivos = Reason::all();
    $listaDocentes = Lecturer::all(); // Cambio de Docente a Lecturer para reflejar tu modelo
    $listaExperienciasEducativas = EducationalExperience::all();
    $listaPeriodos = SchoolPeriod::all();
    $listaTiposAsignacion = TypeAsignation::all();
    $zonas = Region::all();

    // Verificar si el usuario es administrador
    $team = auth()->user()->currentTeam;
    $userAdmin = $team->hasRole('admin');

    if ($userAdmin) {
        // Datos de zona, dependencia y programa educativo basados en relaciones
        $nombreZonaVacante = $vacante->region->name ?? null;
        $nombreDependenciaVacante = $vacante->departament->name ?? null;
        $nombreProgramaEducativo = $vacante->educationalProgram->name ?? null;

        // Listas de dependencias y programas ligadas a la zona
        $listaDependencias = $vacante->region->departaments ?? collect();
        $listaProgramas = $vacante->departament->educationalPrograms ?? collect();

        // Histórico de docentes relacionado con la vacante
        $listaDocentesHistorico = $vacante->historicalLecturers;

        // Obtener archivos de Azure Blob Storage
        $path = "vac-{$id}";
        $disk = Storage::disk('azure');
        $files = $disk->files($path);
        $filesList = array_map(fn($file) => ['name' => $file], $files);

        return view('vacante.edit', compact(
            'vacante',
            'listaMotivos',
            'listaDocentes',
            'listaExperienciasEducativas',
            'listaPeriodos',
            'listaTiposAsignacion',
            'zonas',
            'nombreZonaVacante',
            'nombreDependenciaVacante',
            'nombreProgramaEducativo',
            'listaDependencias',
            'listaProgramas',
            'listaDocentesHistorico',
            'filesList'
        ));
    } else {
        // Información de la zona del editor
        $zonaUsuario = $user->region;
        $nombreZonaUsuario = $zonaUsuario->name ?? null;
        $listaProgramasEditor = $zonaUsuario
            ? $zonaUsuario->departaments->flatMap(fn($dep) => $dep->educationalPrograms)
            : collect();

        return view('vacante.editEditor', compact(
            'vacante',
            'listaProgramasEditor',
            'user',
            'nombreZonaUsuario'
        ));
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
        $vacante = Vacante::findOrFail($id);

        $docenteCompleto = $request->numPersonalDocente;
        //$docentePartes = explode("-",$docenteCompleto);
        //$nombreDocente= $docentePartes[0];
        //$numDocente = $docentePartes[1] ;
        if (empty($docenteCompleto)){
            $numDocente= "";
            $nombreDocente= "";
        }else{
            $docentePartes = explode("-",$docenteCompleto);
            $nombreDocente= $docentePartes[0];
            $numDocente = $docentePartes[1];
        }

        //comparar docente y fechas actual en la vacante
        $numPersonalDocenteActual = $vacante->numPersonalDocente;
        $nombreDocenteActual = $vacante->nombreDocente;
        $tipoAsignacionActual = $vacante->tipoAsignacion;
        $fechaAvisoActual = $vacante->fechaAviso;
        $fechaAsignacionActual = $vacante->fechaAsignacion;
        $fechaRenunciaActual = $vacante->fechaRenuncia;

        if(empty($numDocente)){
            $numDocente= "";
        }

        $zonaCompleta = $request->numZona;
        $zonaPartes = explode("-",$zonaCompleta);

        $dependenciaCompleta = $request->numDependencia;
        $dependenciaPartes = explode("-",$dependenciaCompleta);

        $periodoCompleto = $request->periodo;
        $periodoPartes = explode("-",$periodoCompleto);

        $periodo=$periodoPartes[0];
        $clavePeriodo=$periodoPartes[1];

        $numZona=$zonaPartes[0];
        $numDependencia=$dependenciaPartes[0];

        $experienciaEducativaCompleta = $request->codMateria;
        $experienciaEducativaPartes = explode("~",$experienciaEducativaCompleta);

        $numArea=3;
        $numPrograma=$request->numPrograma;
        $numPlaza=$request->numPlaza;
        $numHoras=$request->numHoras;
        $codMateria=$experienciaEducativaPartes[0];
        $nombreMateria=$experienciaEducativaPartes[1];
        $grupo=$request->grupo;
        //$subGrupo=$request->subGrupo;
        $subGrupo=0;
        $numMotivo=$request->numMotivo;
        $tipoContratacion=$request->tipoContratacion;
        $tipoAsignacion=$request->tipoAsignacion;
        $numPersonalDocente = $numDocente;
        $nombreCDocente = $nombreDocente;
        $plan=$request->plan;
        $observaciones=$request->observaciones;
        $fechaAviso=$request->fechaAviso;
        $fechaAsignacion=$request->fechaAsignacion;
        $fechaApertura=$request->fechaApertura;
        $fechaCierre=$request->fechaCierre;
        $fechaRenuncia=$request->fechaRenuncia;
        $archivo = $vacante->archivo;

        $request->validate([
            'files' => 'nullable',
            'files.*' => 'mimes:pdf|max:20480'
        ]);

        if($request->hasFile('files')){
            $directory="vac-{$vacante->id}";
            $archivo = $directory;
            foreach ($request->file('files') as $file){
                $fileName = time() ."_" . $file->getClientOriginalName();
                $file->storeAs('/'.$directory.'/', $fileName, 'azure');
            }
        }

        $vacante->update([
            'periodo' => $periodo ,
            'clavePeriodo' => $clavePeriodo ,
            'numZona' => $numZona ,
            'numDependencia' => $numDependencia ,
            'numArea' => 3 ,
            'numPrograma' => $numPrograma ,
            'numPlaza' => $numPlaza ,
            'numHoras' => $numHoras ,
            'codMateria' => $codMateria ,
            'nombreMateria' => $nombreMateria ,
            'grupo' => $grupo ,
            'subGrupo' => $subGrupo ,
            'numMotivo' => $numMotivo ,
            'tipoContratacion' => $tipoContratacion ,
            'tipoAsignacion' => $tipoAsignacion ,
            'numPersonalDocente' => $numPersonalDocente ,
            'nombreDocente' => $nombreCDocente,
            'plan' => $plan ,
            'observaciones' => $observaciones ,
            'fechaAviso' => $fechaAviso ,
            'fechaAsignacion' => $fechaAsignacion ,
            'fechaApertura' => $fechaApertura ,
            'fechaCierre' => $fechaCierre ,
            'fechaRenuncia' => $fechaRenuncia ,
            'archivo' => $archivo ,
        ]);

        if (!empty($numHoras) && !empty($tipoAsignacion) && !empty($tipoContratacion)){
            event(new OperacionHorasVacante($numHoras,$numPrograma,$tipoContratacion,$tipoAsignacion));
        }

        //comparar número de personal del docente en vacante y en historico docente
        $numPersonalDocenteHistorico = DB::table('historico_docentes')->where('nPersonal',$numPersonalDocenteActual)->value('nPersonal');

        //condiciones para indicar que datos se guardaran en cada renuncia, en el caso de que alguno de los campos este vacío
        if($numPersonalDocenteActual != $numPersonalDocenteHistorico){
            if($nombreDocenteActual != $nombreCDocente && $nombreDocenteActual != ""){
                if($fechaAvisoActual != null && $fechaAsignacionActual != null && $fechaRenunciaActual != null){
                    event(new RenunciaDocente($id,$numPersonalDocenteActual,$nombreDocenteActual,$tipoAsignacionActual,$fechaAvisoActual,$fechaAsignacionActual,$fechaRenunciaActual));
                }
                elseif($fechaAvisoActual == null || $fechaAsignacionActual != null && $fechaRenunciaActual != null){
                    event(new RenunciaDocente($id,$numPersonalDocenteActual,$nombreDocenteActual,$tipoAsignacionActual,"",$fechaAsignacionActual,$fechaRenunciaActual));
                }
                elseif($fechaAsignacionActual == null || $fechaAvisoActual != null && $fechaRenunciaActual != null){
                    event(new RenunciaDocente($id,$numPersonalDocenteActual,$nombreDocenteActual,$tipoAsignacionActual,$fechaAvisoActual,"",$fechaRenunciaActual));
                }
                elseif($fechaRenunciaActual == null || $fechaAvisoActual != null && $fechaAsignacionActual != null){
                    event(new RenunciaDocente($id,$numPersonalDocenteActual,$nombreDocenteActual,$tipoAsignacionActual,$fechaAvisoActual,$fechaAsignacionActual,""));
                }
                elseif($fechaAvisoActual == null && $fechaAsignacionActual != null || $fechaRenunciaActual != null){
                    event(new RenunciaDocente($id,$numPersonalDocenteActual,$nombreDocenteActual,$tipoAsignacionActual,"","",$fechaRenunciaActual));
                }
                elseif($fechaAsignacionActual == null && $fechaRenunciaActual != null || $fechaAvisoActual != null){
                    event(new RenunciaDocente($id,$numPersonalDocenteActual,$nombreDocenteActual,$tipoAsignacionActual,$fechaAvisoActual,"",""));
                }
                elseif($fechaRenunciaActual == null && $fechaAvisoActual != null || $fechaAsignacionActual != null){
                    event(new RenunciaDocente($id,$numPersonalDocenteActual,$nombreDocenteActual,$tipoAsignacionActual,"",$fechaAsignacionActual,""));
                }
            }
        }

        //Obtener el usuario actual
        $user = Auth::user();
        //Concatenación de variables para mandarlo al event
        $data = $request->periodo .  " " . $request->clavePeriodo . " " . $request->numZona . " " .
                $request->numDependencia . " " . $request->numPlaza . " " . $request->numHoras . " " .
                str_replace(' ', '',$request->codMateria) . " " . str_replace(' ', '',$request->nombreMateria) . " " . $request->grupo . " " .
                $request->numMotivo . " " . $request->tipoAsignacion . " " . $request->numPersonalDocente . " " .
                $request->plan . " " . $request->observaciones . " " . $request->fechaAsignacion . " " .
                $request->fechaApertura . " " . $request->fechaCierre . " " . $request->fechaRenuncia;

        event(new LogUserActivity($user,"Actualización de Vacante ID $id ",$data));

        return redirect()->route('vacante.index');


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
        $vacante = Vacante::findOrFail($id);

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
        $vacante = Vacante::findOrFail($id);

        $numMotivo = $vacante->numMotivo;
        $numHoras = $vacante->numHoras;
        $numPrograma = $vacante->numPrograma;

        $vacante->delete();

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

        $vacante = Vacante::findOrFail($idVac);

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
        (new Vacante())->importToDB();
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
        $data['horasExperienciaEducativa'] = EducationalExperience::where("numMateria", $request->nrc)
            ->get(["nrc","horas"]);

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
        $data['dependenciaVacante'] = Regions_Departaments::where("id_zona", $request->idZona)
            ->get(["clave_dependencia","nombre_dependencia"]);

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
        $data['programaVacante'] = Regions_Departament_Programs::where("clave_dependencia", $request->idDependencia)
            ->get(["clave_programa","nombre_programa"]);

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

        $vacantes = DB::table('vacantes')
            ->select('vacantes.id','periodo','vacantes.clavePeriodo','numZona','numDependencia','numArea','numPrograma',
                'numPlaza','numHoras','codMateria','nombreMateria','grupo','subGrupo','numMotivo','tipoContratacion',
                'tipoAsignacion', 'numPersonalDocente','nombreDocente','plan','observaciones','fechaAviso','fechaAsignacion',
                'fechaApertura','fechaCierre','fechaRenuncia','archivo')
            ->join('periodos', function($join)
            use ($userSelectZona,$userSelectDependencia,$userSelectPrograma,$userSelectFiltro,$userSelectSearch){
                $join->on('vacantes.clavePeriodo','=','periodos.clavePeriodo')
                    ->where('periodos.actual',"=",1)
                    ->where('numZona','=',$userSelectZona)
                    ->where('numDependencia','=',$userSelectDependencia)
                    ->where('numPrograma','=',$userSelectPrograma)
                    ->when( $userSelectFiltro == "Todas" ,function($query){
                        $query->whereNull('deleted_at');
                    })
                    ->when( $userSelectFiltro == "Vacantes" ,function($query){
                        $query->whereNull('deleted_at')
                            ->whereNull('numPersonalDocente')
                        ;
                    })
                    ->when( $userSelectFiltro == "NoVacantes" ,function($query){
                        $query->whereNull('deleted_at')
                            ->whereNotNull('numPersonalDocente')
                        ;
                    })
                    ->when( $userSelectFiltro == "VacantesCerradas" ,function($query)  {
                        $query->whereNotNull('deleted_at')
                        ;
                    })
                    ->when( $userSelectFiltro == "VacantesArchivos" ,function($query){
                        $query->whereNull('deleted_at')
                            ->where('archivo','<>','Inexistente')
                        ;
                    })
                    ->when( $userSelectFiltro == "ComplementoCarga" ,function($query){
                        $query->whereNull('deleted_at')
                            ->where('tipoAsignacion','=','Complemento de carga')
                        ;
                    })
                    ->when( $userSelectFiltro == "CargaObligatoria" ,function($query){
                        $query->whereNull('deleted_at')
                            ->where('tipoAsignacion','=','Carga obligatoria')
                        ;
                    })
                    ->where(function ($query) use ($userSelectSearch){
                        $query->where('numPlaza','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('numHoras','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('codMateria','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('nombreMateria','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('grupo','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('subGrupo','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('numMotivo','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('tipoContratacion','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('tipoAsignacion','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('numPersonalDocente','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('nombreDocente','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('plan','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('observaciones','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('fechaAviso','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('fechaAsignacion','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('fechaApertura','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('fechaCierre','LIKE','%'.$userSelectSearch.'%')
                            ->orWhere('fechaRenuncia','LIKE','%'.$userSelectSearch.'%')
                        ;
                    })
                ;
            })
            ->get()
        ;

        return $vacantes;

    }

}
