<?php

namespace App\Http\Controllers;

use App\Models\EducationalExperience; // Cambiado para usar el nuevo modelo
use App\Http\Requests\StoreExperienciaEducativaRequest;
use App\Http\Requests\UpdateExperienciaEducativaRequest;
use App\Models\ExperienciaEducativa;
use App\Providers\LogUserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExperienciaEducativaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Función usada para mostrar a las experiencias educativas y su respectiva información
     * Usada en la vista zonaDependenciaPrograma.index
     * @see resources/views/zonaDependenciaPrograma/index.blade.php
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $radioButton = $request->get('tipo');

        // Ajuste en el nombre de la tabla y los campos
        $experienciasEducativas = DB::table('educational_experiences')
            ->select('code', 'name', 'hours') // Cambiados los nombres de los campos
            ->where('code', 'LIKE', '%'.$search.'%')
            ->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('hours', 'LIKE', '%'.$search.'%')
            ->orderBy('name', 'asc')
            ->paginate(10)
            ->appends(request()->query());

        if (isset($radioButton)) {
            switch ($radioButton) {
                case "code":
                    $experienciasEducativas = DB::table('educational_experiences')
                        ->select('code', 'name', 'hours')
                        ->where('code', 'LIKE', '%'.$search.'%')
                        ->orderBy('code', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());
                    break;

                case "name":
                    $experienciasEducativas = DB::table('educational_experiences')
                        ->select('code', 'name', 'hours')
                        ->where('name', 'LIKE', '%'.$search.'%')
                        ->orderBy('name', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());
                    break;

                case "hours":
                    $experienciasEducativas = DB::table('educational_experiences')
                        ->select('code', 'name', 'hours')
                        ->where('hours', 'LIKE', '%'.$search.'%')
                        ->orderBy('hours', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());
                    break;

                default:
                    $experienciasEducativas = DB::table('educational_experiences')
                        ->select('code', 'name', 'hours')
                        ->where('code', 'LIKE', '%'.$search.'%')
                        ->orWhere('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('hours', 'LIKE', '%'.$search.'%')
                        ->orderBy('name', 'asc')
                        ->paginate(10)
                        ->appends(request()->query());
            }
        }

        return view('experienciaEducativa.index', compact('experienciasEducativas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     * Muestra el formulario para crear una nueva experiencia educativa
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experienciaEducativa.create');
    }

    /**
     * Store a newly created resource in storage.
     * Crea una nueva experiencia educativa
     * @param  \App\Http\Requests\StoreExperienciaEducativaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperienciaEducativaRequest $request)
    {
        // Creación de la nueva experiencia educativa usando los nuevos nombres de campos
        $ee = new ExperienciaEducativa();
        $ee->code = $request->code;
        $ee->name = $request->name;
        $ee->hours = $request->hours;
        $ee->save();

        $user = Auth::user();
        $data = $request->code . " " . $request->name . " " . $request->hours;
        event(new LogUserActivity($user, "Creación de Experiencia Educativa", $data));

        return redirect()->route('experienciaEducativa.index');
    }

    /**
     * Show the form for editing the specified resource.
     * Muestra el formulario para actualizar una experiencia educativa
     * @param  \App\Models\EducationalExperience  $experienciaEducativa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experienciaEducativa = ExperienciaEducativa::findOrFail($id);
        return view('experienciaEducativa.edit', compact('experienciaEducativa'));
    }

    /**
     * Update the specified resource in storage.
     * Actualiza la experiencia educativa
     * @param  \App\Http\Requests\UpdateExperienciaEducativaRequest  $request
     * @param  \App\Models\EducationalExperience  $experienciaEducativa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExperienciaEducativaRequest $request, $id)
    {
        $experienciaEducativa = ExperienciaEducativa::findOrFail($id);

        $experienciaEducativa->update([
            'code' => $request->code,
            'name' => $request->name,
            'hours' => $request->hours,
        ]);

        $user = Auth::user();
        $data = $request->code . " " . $request->name . " " . $request->hours;
        event(new LogUserActivity($user, "Actualización de Experiencia Educativa ID: $id", $data));

        return redirect()->route('experienciaEducativa.index');
    }

    /**
     * Remove the specified resource from storage.
     * Elimina una experiencia educativa
     * @param  \App\Models\EducationalExperience  $experienciaEducativa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ee = ExperienciaEducativa::findOrFail($id);
        $ee->delete();

        $user = Auth::user();
        $data = "Eliminación de la Experiencia Educativa ID: $id";
        event(new LogUserActivity($user, "Eliminación de la Experiencia Educativa ID $id", $data));

        return redirect()->route('experienciaEducativa.index');
    }
}
