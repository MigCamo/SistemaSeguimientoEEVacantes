<?php

namespace App\Http\Controllers;

use App\Models\EducationalExperience;
use App\Http\Requests\StoreExperienciaEducativaRequest;
use App\Http\Requests\UpdateEducationalExperienceRequest;
use App\Http\Requests\UpdateExperienciaEducativaRequest;
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
        // Comprobamos si ya existe el código de la materia.
        if (EducationalExperience::where('code', $request->code)->exists()) {
            // Si existe, redirigimos hacia atrás con el mensaje de error.
            return redirect()->back()->with('error', 'El código de la experiencia educativa ya existe.');
        }

        try {
            // Si no existe, procedemos a registrar la experiencia educativa.
            $ee = new EducationalExperience();
            $ee->code = $request->code;
            $ee->name = $request->name;
            $ee->hours = $request->hours;
            $ee->save();

            // Guardamos actividad del usuario (esto es opcional).
            $user = Auth::user();
            $data = $request->code . " " . $request->name . " " . $request->hours;
            event(new LogUserActivity($user, "Creación de Experiencia Educativa", $data));

            // Redirigimos con mensaje de éxito.
            return redirect()->route('experienciaEducativa.index')->with('success', 'Experiencia educativa registrada exitosamente.');
        } catch (\Exception $e) {
            // En caso de error, redirigimos con un mensaje genérico de error.
            return redirect()->back()->with('error', 'Hubo un error al registrar la experiencia educativa.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     * Muestra el formulario para actualizar una experiencia educativa
     * @param  \App\Models\EducationalExperience  $experienciaEducativa
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $experienciaEducativa = EducationalExperience::findOrFail($code);
        return view('experienciaEducativa.edit', compact('experienciaEducativa'));
    }

    /**
     * Update the specified resource in storage.
     * Actualiza la experiencia educativa
     * @param  \App\Http\Requests\UpdateExperienciaEducativaRequest  $request
     * @param  \App\Models\EducationalExperience  $experienciaEducativa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationalExperienceRequest $request, $code)
    {
        $educationalExperience= EducationalExperience::where('code', $code)->firstOrFail();

        $educationalExperience->update([
            'code' => $request->code,
            'name' => $request->name,
            'hours' => $request->hours,
        ]);

        $user = Auth::user();
        $data = $request->code . " " . $request->name . " " . $request->hours;
        event(new LogUserActivity($user, "Actualización de Experiencia Educativa ID: $code", $data));

        return redirect()->route('experienciaEducativa.index');
    }

    /**
     * Remove the specified resource from storage.
     * Elimina una experiencia educativa
     * @param  \App\Models\EducationalExperience  $experienciaEducativa
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $ee = EducationalExperience::where('code', $code)->firstOrFail();
        $ee->delete();

        $user = Auth::user();
        $data = "Eliminación de la Experiencia Educativa ID: $code";
        event(new LogUserActivity($user, "Eliminación de la Experiencia Educativa ID $code", $data));

        return redirect()->route('experienciaEducativa.index');
    }
}
