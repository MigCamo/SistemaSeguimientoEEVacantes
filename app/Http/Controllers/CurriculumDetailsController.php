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
use Illuminate\Support\Facades\Log;

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
            Log::info("Iniciando la carga del archivo CSV.");

            if ($file = $request->file('csv_file')) {
                if (($handle = fopen($file->getRealPath(), 'r')) !== false) {
                    if (($header = fgetcsv($handle, 1000, ',')) !== false) {
                        Log::info("Encabezado del CSV leído correctamente: " . json_encode($header));

                        $totalRows = 0;
                        $insertedRows = 0;
                        $skippedRows = 0;

                        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                            $totalRows++;

                            // Verificar que la fila tenga contenido válido
                            if (empty(array_filter($data)) || count($data) != count($header)) {
                                Log::warning("Fila omitida (vacía o con datos incompletos): " . json_encode($data));
                                $skippedRows++;
                                continue;
                            }

                            $row = array_combine($header, $data);
                            $curriculum_code = $request->curriculum_code;
                            $ee_code = $row['MATCUR'] ?? null;

                            Log::info("Procesando fila {$totalRows}: " . json_encode($row));

                            // Si no hay código de experiencia educativa, se omite la fila
                            if (!$ee_code) {
                                Log::warning("Fila omitida (sin código de experiencia educativa): " . json_encode($row));
                                $skippedRows++;
                                continue;
                            }

                            // Crear o buscar la experiencia educativa
                            $educationalExperience = EducationalExperience::firstOrCreate(
                                ['code' => $ee_code],
                                [
                                    'name'  => $row['TEXG'] ?? null,
                                    'hours' => $row['HRS'] ?? null,
                                ]
                            );

                            Log::info("Experiencia educativa registrada o existente: " . json_encode($educationalExperience->toArray()));

                            // Verificar si la relación ya existe
                            $relationExists = Curriculum_Educational_Experiences::where('curriculum_code', $curriculum_code)
                                ->where('ee_code', $ee_code)
                                ->exists();

                            if ($relationExists) {
                                Log::warning("Relación ya existente para curriculum_code: {$curriculum_code}, ee_code: {$ee_code}");
                            } else {
                                // Guardar la nueva relación
                                $dataRelation = [
                                    'curriculum_code' => $curriculum_code,
                                    'ee_code'         => $ee_code,
                                ];

                                $this->store(new Request($dataRelation));
                                Log::info("Relación curriculum-experience creada: " . json_encode($dataRelation));

                                $insertedRows++;
                            }
                        }
                    }

                    fclose($handle);
                    Log::info("Proceso finalizado. Total filas procesadas: {$totalRows}, insertadas: {$insertedRows}, omitidas: {$skippedRows}");

                    return redirect()->back()->with('status', 'success');
                }
            }
        } catch (\Exception $e) {
            Log::error("Error durante la carga del CSV: " . $e->getMessage());
            return redirect()->back()
                ->with('status', 'error')
                ->with('error_message', $e->getMessage());
        }
    }

}
