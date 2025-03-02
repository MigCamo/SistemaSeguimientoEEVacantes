<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoAsignacionRequest;
use App\Http\Requests\UpdateTipoAsignacionRequest;
use App\Models\TipoAsignacion;
use App\Models\TypeAsignation;
use App\Providers\LogUserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TipoAsignacionController extends Controller
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

        $tiposAsignacion = DB::table('type_asignations')
            ->select('id','type_asignation','description')
            ->where('type_asignation','LIKE','%'.$search.'%')
            ->orWhere('description','LIKE','%'.$search.'%')
            ->orderBy('type_asignation','asc')
            ->paginate(10)
            ->withQueryString()
        ;

        if(isset($radioButton)){

            switch ($radioButton){

                case "type_asignation":
                    $tiposAsignacion = DB::table('type_asignations')
                        ->select('id','type_asignation','description')
                        ->where('type_asignation','LIKE','%'.$search.'%')
                        ->orderBy('type_asignation', 'asc')
                        ->paginate(10)
                        ->withQueryString()
                    ;
                    break;

                case "description":
                    $tiposAsignacion = DB::table('type_asignations')
                        ->select('id','type_asignation','description')
                        ->where('description','LIKE','%'.$search.'%')
                        ->orderBy('description', 'asc')
                        ->paginate(10)
                        ->withQueryString()
                    ;
                    break;

                default:
                    $tiposAsignacion = DB::table('type_asignations')
                        ->select('id','type_asignation','description')
                        ->where('type_asignation','LIKE','%'.$search.'%')
                        ->orWhere('description','LIKE','%'.$search.'%')
                        ->orderBy('type_asignation','asc')
                        ->paginate(10)
                        ->withQueryString()
                    ;
            }

        }

        return view('tipoAsignacion.index', compact('tiposAsignacion','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoAsignacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoAsignacionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoAsignacionRequest $request)
    {

        $tiposAsignacion = new TypeAsignation();
        $tiposAsignacion->type_asignation = $request->type_asignation;
        $tiposAsignacion->description = $request->description;

        $tiposAsignacion->save();

        $user = Auth::user();
        $data = $request->id ." ". $request->type_asignation ." ". $request->description;
        event(new LogUserActivity($user,"Creación de Tipo de Asignación",$data));

        return redirect()->route('tipoAsignacion.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoAsignacion  $tipoAsignacion
     * @return \Illuminate\Http\Response
     */
    public function show(TipoAsignacion $tipoAsignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeAsignation  $tipoAsignacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tiposAsignacion = TypeAsignation::where('id',$id)->firstOrFail();
        return view('tipoAsignacion.edit', compact('tiposAsignacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoAsignacionRequest  $request
     * @param  \App\Models\TipoAsignacion  $tipoAsignacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoAsignacionRequest $request, $id)
    {
        $tiposAsignacion = TypeAsignation::where('id',$id)->firstOrFail();
        $tipo = $request->type_asignation;
        $descripcion = $request->description;

        $tiposAsignacion->update([
            'type_asignation' => $tipo,
            'description' => $descripcion,
        ]);

        $user = Auth::user();
        $data = $request->id ." ". $request->type_asignation ." ". $request->description;
        event(new LogUserActivity($user,"Actualización de Tipo de Asignación ID: $request->id",$data));

        return redirect()->route('tipoAsignacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeAsignation  $tipoAsignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiposAsignacion = TypeAsignation::where('id',$id)->firstOrFail();
        $tiposAsignacion->delete($id);

        $user = Auth::user();
        //$data = $request->nPersonal ." ". $request->nombre ." ". $request->apellidoPaterno ." ". $request->apellidoMaterno ." ".$request->email;
        $data = "Eliminación de Docente ID: $id";
        event(new LogUserActivity($user,"Eliminación de Tipo de Asignación ID $id",$data));

        return redirect()->route('tipoAsignacion.index');
    }

}
