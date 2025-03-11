<?php

namespace App\Http\Controllers;

use App\Models\Curriculum_Educational_Experiences;
use League\Csv\Reader;
use App\Models\EducationalExperience;
use App\Models\CurriculumEducationalExperience;
use App\Providers\LogUserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CurriculumDetailsController extends Controller
{

    public function search(Request $request)
    {
        $curriculumCode = $request->input('curriculum_code');
        $tipo = $request->input('tipo'); // Puede ser 'code' o 'name'
        $search = $request->input('search');

        // Obtener el currículum
        $curriculum = DB::table('curriculums')->where('code', $curriculumCode)->first();

        // Construir la consulta base
        $query = DB::table('educational_experiences')
            ->join('curriculum_educational_experiences', 'educational_experiences.code', '=', 'curriculum_educational_experiences.ee_code')
            ->where('curriculum_educational_experiences.curriculum_code', $curriculumCode);

        // Aplicar filtro de búsqueda si hay texto
        if ($search) {
            if ($tipo === 'code') {
                $query->where('educational_experiences.code', 'LIKE', "%{$search}%");
            } elseif ($tipo === 'name') {
                $query->where('educational_experiences.name', 'LIKE', "%{$search}%");
            }
        }

        // Obtener los datos paginados
        $educationExperiencesList = $query
            ->select('educational_experiences.code', 'educational_experiences.name', 'educational_experiences.hours')
            ->paginate(10)
            ->withQueryString();

        // Enviar a la vista
        return view('curriculumDetails.index', compact('educationExperiencesList', 'curriculum'));
    }



    public function index(Request $request)
    {
        $curriculumCode = $request->get('curriculumCode');
        $curriculum = DB::table('curriculums')->where('code', $curriculumCode)->first();
        $educationExperiencesList = DB::table('educational_experiences')
            ->join('curriculum_educational_experiences', 'educational_experiences.code', '=', 'curriculum_educational_experiences.ee_code')
            ->where('curriculum_educational_experiences.curriculum_code', $curriculumCode)
            ->select('educational_experiences.code', 'educational_experiences.name', 'educational_experiences.hours')
            ->paginate(10)
            ->withQueryString();

        return view('curriculumDetails.index', compact('educationExperiencesList', 'curriculum'));
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'curriculum_code' => 'required|string',
            'ee_code' => 'required|string',
        ]);

        // Crear la relación en la base de datos
        $curriculum_ee = new Curriculum_Educational_Experiences([
            'ee_code' => $request->ee_code,
            'curriculum_code' => $request->curriculum_code,
        ]);

        $curriculum_ee->save();

        return redirect()->route('curriculumDetails.index', ['curriculumCode' => $request->curriculum_code]);
    }

    public function destroy($ee_code, $curriculum_code)
    {
        $curriculum_ee = Curriculum_Educational_Experiences::where('curriculum_code', $curriculum_code)
            ->where('ee_code', $ee_code)
            ->first(); // Agregar first() para obtener un solo registro

        if (!$curriculum_ee) {
            return redirect()->route('curriculumDetails.index')->with('error', 'No se encontró el registro.');
        }

        $curriculum_ee->delete();

        $user = Auth::user();
        $data = "Eliminación de la ee: $curriculum_ee->code del plan de estudios con el id:  $curriculum_code";
        event(new LogUserActivity($user, "Eliminación de la ee", $data));

        return redirect()->route('curriculumDetails.index', ['curriculumCode' => $curriculum_code])->with('success', 'Registro eliminado.');
    }

    public function uploadCsv(Request $request)
    {
        $validated = $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:20480',
        ]);

        try {
            if ($file = $request->file('csv_file')) {
                // Abrir el archivo usando fopen
                if (($handle = fopen($file->getRealPath(), 'r')) !== false) {
                    // Obtener el encabezado
                    if (($header = fgetcsv($handle, 1000, ',')) !== false) {
                        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                            // Verificar que la fila no esté vacía y tenga el número correcto de columnas
                            if (empty(array_filter($data)) || count($data) != count($header)) {
                                continue;
                            }

                            $row = array_combine($header, $data);
                            $curriculum_code = $request->curriculum_code;
                            $ee_code = $row['MATCUR'] ?? null;

                            // Crear o buscar la experiencia educativa
                            $educationalExperience = EducationalExperience::firstOrCreate(
                                ['code' => $ee_code],
                                [
                                    'name'  => $row['TEXG'] ?? null,
                                    'hours' => $row['HRS'] ?? null,
                                ]
                            );

                            // Verificar si la relación ya existe
                            $relationExists = Curriculum_Educational_Experiences::where('curriculum_code', $curriculum_code)
                                ->where('ee_code', $ee_code)
                                ->exists();

                            if (!$relationExists) {
                                // Se recomienda pasar directamente los datos necesarios a la función store,
                                // en lugar de modificar el objeto Request original
                                $dataRelation = [
                                    'curriculum_code' => $curriculum_code,
                                    'ee_code'         => $ee_code,
                                ];

                                // Asegúrate de que el método store acepte este arreglo o ajusta la lógica.
                                $this->store(new Request($dataRelation));
                            }
                        }
                    }
                    fclose($handle);
                }
                return redirect()->back()->with('status', 'success');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('status', 'error')
                ->with('error_message', $e->getMessage());
        }
    }

}
