<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Educational_Experience_Vacancies;
use App\Models\EducationalExperience;
use Carbon\Carbon;

class VacantesFilesController extends Controller
{
    public function procesarArchivo(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:csv,txt',
        ]);

        $archivoCsv = $request->file('archivo')->getPathname();

        $datos = $this->leerPeriodoDesdeCsv($archivoCsv);

        if ($datos) {
            if ($this->guardarDatosEnBD($datos)) {
                return redirect()->route('vacante.index')->with('success', 'Vacantes cargadas correctamente');
            }
        } else {
            dd('No se pudieron extraer los datos.');
        }
    }

    private function leerPeriodoDesdeCsv($archivoCsv)
    {
        if (($archivo = fopen($archivoCsv, 'r')) !== false) {
            // Leer la quinta fila (A5)
            for ($i = 0; $i < 4; $i++) {
                fgetcsv($archivo);
            }
            $fila5 = fgetcsv($archivo);

            // Leer la séptima fila (A7)
            for ($i = 0; $i < 1; $i++) {
                fgetcsv($archivo);
            }
            $fila7 = fgetcsv($archivo);

            $departamento = null;
            $periodo = null;
            $programas = []; // Cambiado a un array de programas

            if ($fila5 && isset($fila5[0])) {
                $celdaValor5 = $fila5[0];
                $departamento = substr($celdaValor5, 14, 5); // Saltar 14 caracteres y leer 5
            }

            if ($fila7 && isset($fila7[0])) {
                $celdaValor7 = $fila7[0];
                $posicionPeriodo = strpos($celdaValor7, 'Periodo: ');
                if ($posicionPeriodo !== false) {
                    $periodo = trim(substr($celdaValor7, $posicionPeriodo + strlen('Periodo: ')));
                }
            }

            // Buscar programas y experiencias
            rewind($archivo);
            $programaActual = null;
            $experienciasActuales = [];

            while (($fila = fgetcsv($archivo)) !== false) {
                if (isset($fila[0])) {
                    $celdaValor = $fila[0];
                    $posicionPrograma = strpos($celdaValor, 'Programa: ');

                    if ($posicionPrograma !== false) {
                        // Guardar el programa anterior si existe
                        if ($programaActual !== null) {
                            $programas[] = [
                                'programa' => $programaActual,
                                'experiencias' => $experienciasActuales,
                            ];
                            $experienciasActuales = []; // Reiniciar las experiencias
                        }

                        $programaActual = trim(substr($celdaValor, $posicionPrograma + strlen('Programa: '), 5));
                        fgetcsv($archivo); // Saltar una fila
                    } elseif ($programaActual !== null && is_numeric(substr($fila[0], 0, 1))) {
                        // Leer experiencias para el programa actual
                        $experienciasActuales[] = [
                            'nrc' => $fila[0],
                            'nombreExperiencia' => $fila[1],
                            'horasPago' => $fila[2],
                            'numPlaza' => $fila[3],
                            'numPersonal' => $fila[10],
                            'nombreDocente' => $fila[11],
                        ];
                    } elseif ($programaActual !== null && (empty($fila[0]) || !is_numeric(substr($fila[0], 0, 1)))) {
                        // Fin de las experiencias para el programa actual
                        $programas[] = [
                            'programa' => $programaActual,
                            'experiencias' => $experienciasActuales,
                        ];
                        $programaActual = null; // Reiniciar el programa actual
                        $experienciasActuales = [];
                    }
                }
            }

            // Guardar el último programa si existe
            if ($programaActual !== null) {
                $programas[] = [
                    'programa' => $programaActual,
                    'experiencias' => $experienciasActuales,
                ];
            }

            
            fclose($archivo);

            if ($departamento !== null && $periodo !== null) {
                return ['departamento' => $departamento, 'periodo' => $periodo, 'programas' => $programas];
            }
        }
        return null;
    }

    private function guardarDatosEnBD($datos)
    {
        $this->buscarExperienciasEnBD($datos);
        DB::beginTransaction(); // Iniciar transacción

        try {
            foreach ($datos['programas'] as $programa) {
                foreach ($programa['experiencias'] as $experiencia) {
                    $resultados = EducationalExperience::where('name', $experiencia['nombreExperiencia'])
                        ->select('code', 'name')
                        ->get()
                        ->toArray();

                    $regionActual = DB::table('regions_educational_programs')
                        ->where('departament_code', $datos['departamento'])
                        ->where('educational_program_code', $programa['programa'])
                        ->first();

                    $periodoActual = DB::table('school_periods')
                        ->where('description', $datos['periodo'])
                        ->first();
                    
                    $vacante = new Educational_Experience_Vacancies();
                    $vacante->nrc = $experiencia['nrc'];
                    $vacante->school_period_code = $periodoActual->code;
                    $vacante->region_code = $regionActual->region_code;
                    $vacante->departament_code = $datos['departamento'];
                    $vacante->area_code = 1;
                    $vacante->educational_experience_code = $resultados[0]['code'];
                    $vacante->class = 1;
                    $vacante->subgroup = 1;
                    $vacante->created_at = Carbon::now();
                    $vacante->updated_at = Carbon::now();
                    $vacante->educational_program_code = $programa['programa'];
                    $vacante->numPlaza = $experiencia['numPlaza'];
                    $vacante->reason_code = 1;
                    $vacante->academic = $experiencia['nombreDocente'];
                    $vacante->save(); // Guardar la vacante

                }
            }

            DB::commit(); // Confirmar transacción
            return true; // Indicar éxito
        } catch (\Exception $e) {
            DB::rollback(); // Revertir transacción en caso de error
            dd('Error al guardar las vacantes: ' . $e->getMessage()); // Mostrar mensaje de error
            return false; // Indicar fallo
        }
    }

    private function buscarExperienciasEnBD($datos){

        DB::beginTransaction();

        try {
            foreach ($datos['programas'] as $programa) {
                foreach ($programa['experiencias'] as $experiencia) {
                    $educationalExperience = EducationalExperience::where('name', $experiencia['nombreExperiencia'])->first();
    
                    if (!$educationalExperience) {
                        // Si no existe, crear una nueva experiencia educativa
                        $educationalExperience = new EducationalExperience();
                        $educationalExperience->code = $experiencia['nrc'];
                        $educationalExperience->name = $experiencia['nombreExperiencia'];
                        $educationalExperience->hours = $experiencia['horasPago'];
                        $educationalExperience->created_at = Carbon::now(); // Llenar created_at manualmente
                        $educationalExperience->updated_at = Carbon::now(); // Llenar updated_at manualmente
                        $educationalExperience->save();
                    }
                }
            }
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}