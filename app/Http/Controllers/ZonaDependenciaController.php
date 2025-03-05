<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreZonaDependenciaRequest;
use App\Http\Requests\UpdateZonaDependenciaRequest;
use App\Models\Departament;
use App\Models\Dependencia;
use App\Models\Educational_Experience_Vacancies;
use App\Models\Periodo;
use App\Models\Region;
use App\Models\Regions_Departaments;
use App\Models\SchoolPeriod;
use App\Models\Vacante;
use Illuminate\Http\Request;
use App\Models\Zona_Dependencia;
use App\Models\Zona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Providers\LogUserActivity;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class ZonaDependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $radioButton = $request->get('tipo');

        //https://youtu.be/XeYd_kYkUJE
        $dependencias = DB::table('departaments')
            ->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
            ->join('regions', 'regions_departaments.region_code', '=', 'regions.code')
            ->select('departaments.code', 'departaments.name', 'regions.code as region_code', 'regions.name as region_name') // Seleccionar los campos necesarios
            ->where('departaments.code', 'LIKE', '%' . $search . '%')
            ->orWhere('departaments.name', 'LIKE', '%' . $search . '%')
            ->orderBy('departaments.code', 'asc')
            ->paginate(10)
            ->withQueryString();

        if(isset($radioButton)){

            switch ($radioButton){

                case "numeroZona":
                    $dependencias = DB::table('departaments')
                        ->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
                        ->join('regions', 'regions_departaments.region_code', '=', 'regions.code')
                        ->select('departaments.code', 'departaments.name', 'regions.code as region_code', 'regions.name as region_name') // Seleccionar los campos necesarios
                        ->where('departaments.code', 'LIKE', '%' . $search . '%')
                        ->orWhere('departaments.name', 'LIKE', '%' . $search . '%')
                        ->orderBy('region_code', 'asc')
                        ->paginate(10)
                        ->withQueryString();
                    break;

                case "nombreZona":
                    $dependencias = DB::table('departaments')
                        ->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
                        ->join('regions', 'regions_departaments.region_code', '=', 'regions.code')
                        ->select('departaments.code', 'departaments.name', 'regions.code as region_code', 'regions.name as region_name') // Seleccionar los campos necesarios
                        ->where('departaments.code', 'LIKE', '%' . $search . '%')
                        ->orWhere('departaments.name', 'LIKE', '%' . $search . '%')
                        ->orderBy('region_name', 'asc')
                        ->paginate(10)
                        ->withQueryString();
                    break;

                case "claveDependencia":
                    $dependencias = DB::table('departaments')
                        ->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
                        ->join('regions', 'regions_departaments.region_code', '=', 'regions.code')
                        ->select('departaments.code', 'departaments.name', 'regions.code as region_code', 'regions.name as region_name') // Seleccionar los campos necesarios
                        ->where('departaments.code', 'LIKE', '%' . $search . '%')
                        ->orWhere('departaments.name', 'LIKE', '%' . $search . '%')
                        ->orderBy('departaments.code', 'asc')
                        ->paginate(10)
                        ->withQueryString();
                    break;

                case "nombreDependencia":
                    $dependencias = DB::table('departaments')
                        ->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
                        ->join('regions', 'regions_departaments.region_code', '=', 'regions.code')
                        ->select('departaments.code', 'departaments.name', 'regions.code as region_code', 'regions.name as region_name') // Seleccionar los campos necesarios
                        ->where('departaments.code', 'LIKE', '%' . $search . '%')
                        ->orWhere('departaments.name', 'LIKE', '%' . $search . '%')
                        ->orderBy('departaments.name', 'asc')
                        ->paginate(10)
                        ->withQueryString();
                    break;

                default:
                $dependencias = DB::table('departaments')
                    ->join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
                    ->join('regions', 'regions_departaments.region_code', '=', 'regions.code')
                    ->select('departaments.code', 'departaments.name', 'regions.code as region_code', 'regions.name as region_name') // Seleccionar los campos necesarios
                    ->where('departaments.code', 'LIKE', '%' . $search . '%')
                    ->orWhere('departaments.name', 'LIKE', '%' . $search . '%')
                    ->orderBy('departaments.code', 'asc')
                    ->paginate(10)
                    ->withQueryString();
            }

        }

        return view('zonaDependencia.index', compact('dependencias','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaZonas = Region::all();

        $user = auth()->user();

        return view('zonaDependencia.create',
            [
            'user' => $user,
            'zonas' => $listaZonas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreZonaDependenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZonaDependenciaRequest $request)
    {
        $request->validate([
            'claveDependencia' => 'required|string|unique:departaments,code',
            'nombreDependencia' => 'required|string',
        ]);

        $dependencia = new Departament();
        $dependencia->code = $request->input('claveDependencia');
        $dependencia->name = $request->input('nombreDependencia');
        $dependencia->created_at = Carbon::now();
        $dependencia->updated_at = Carbon::now();

        $regionDepartament = new Regions_Departaments();
        $regionDepartament->region_code = $request->id_zona;
        $regionDepartament->departament_code = $request->claveDependencia;
        $regionDepartament->created_at = Carbon::now();
        $regionDepartament->updated_at = Carbon::now();

        //dd($dependencia);

        $dependencia->save();
        $regionDepartament->save();

        $user = Auth::user();
        $data = $request->idZona ." ". $request->nombreZona ." ". $request->claveDependencia ." ". $request->nombreDependencia;
        event(new LogUserActivity($user,"Creación de Dependencia",$data));

        return redirect()->route('zonaDependencia.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zona_Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function show(Regions_Departaments $dependencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zona_Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Obtener nombre de la zona
        $nombreZona = DB::table('regions')->join('regions_departaments', 'regions_departaments.region_code', '=', 'regions.code')->where('regions_departaments.departament_code',$id)->value('regions.name');
        $dependencia = Regions_Departaments::where('departament_code',$id)->firstOrFail();
        $nombreDependencia = Departament::where('code', $dependencia->departament_code)->firstOrFail();
        $listaZonas = Region::all();
        return view('zonaDependencia.edit', ['dependencia' => $dependencia,
                                                  'zonas' => $listaZonas,
                                                  'nombreZona' => $nombreZona,
                                                  'nombreDependencia' => $nombreDependencia,
                                                ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateZonaDependenciaRequest  $request
     * @param  \App\Models\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateZonaDependenciaRequest $request, $id)
    {
        $dependencia = Regions_Departaments::findOrFail($id);

        $zonaCompleta = $request->id_zona;
        $zonaPartes = explode("~",$zonaCompleta);

        $id_zona = $zonaPartes[0];
        $nombre_zona = $zonaPartes[1];

        $clave_dependencia=$request->claveDependencia;
        $nombre_dependencia=$request->nombreDependencia;

        $dependencia->update([
            'id_zona' => $id_zona ,
            'nombre_zona' => $nombre_zona ,
            'clave_dependencia' => $clave_dependencia ,
            'nombre_dependencia' => $nombre_dependencia ,
        ]);

        $user = Auth::user();
        $data = $request->id_zona ." ". $request->nombre_zona ." ". $request->clave_dependencia . " ". $request->nombre_dependencia;
        event(new LogUserActivity($user,"Actualización de la Dependencia Clave: $request->clave_dependencia",$data));

        return redirect()->route('zonaDependencia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $claveDependenciaSeleccionada = Regions_Departaments::where('id',$id)->value('clave_dependencia');
        $dependenciaEliminarPrograma = DB::table('zona__dependencia__programas')->where("clave_dependencia",$claveDependenciaSeleccionada)->delete();

        $dependencia = Regions_Departaments::findOrFail($id);
        $dependencia->delete();

        $user = Auth::user();
        $data = "Eliminación de Dependencia ID: $id";
        event(new LogUserActivity($user,"Eliminación de Dependencia ID: $id",$data));

        return redirect()->route('zonaDependencia.index');
    }
    //

    public function fetchDependencia(Request $request)
    {
        $data['dependencias'] = Regions_Departaments::where("id_zona", $request->id_zona)
                                ->get(["clave_dependencia","nombre_dependencia"]);

        return response()->json($data);
    }

    public function fetchIdNombreZona(Request $request)
    {
        $data['idNombreZona'] = Region::where("id", $request->idZona)
            ->get(["id","nombre"]);

        return response()->json($data);
    }

    public function reporte($id)
    {
        $path = base_path('public/images/uv.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $uv = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $periodoActual = SchoolPeriod::where('current','1')->value('code');

        $listaVacantes = Educational_Experience_Vacancies::where('departament_code', $id)
            ->where('school_period_code', $periodoActual) // Eliminar la condición whereNull('deleted_at')
            ->get();

        $dependencia = DB::table('departaments')->join('regions_departaments', 'regions_departaments.departament_code', '=', 'departaments.code')->where('departaments.code',$id)->value('departaments.name');

        $pdf = Pdf::loadView('pdf.templateVacantesPorDependencia', compact(
                'listaVacantes','dependencia', 'uv')
        )->setPaper('a4','landscape');

        $user = Auth::user();
        $data = "Generación de Reporte de Experiencias Vacantes de la dependencia: $id";
        event(new LogUserActivity($user,"Generación de Reporte de Experiencias Educativas",$data));
        return $pdf->stream();

    }

}
